<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 12.11.2015
 * Time: 16:35
 */

namespace App\Model;

use Nette;


class MassagesModel extends Nette\Object {
    private $db;

    public function __construct(Nette\Database\Context $database)
    {
        $this->db = $database;
    }
    /**
     * @param $pictures
     */

//nacte masaze z DB
    public function getMassages() {
        return $this->db->table('masaze');
    }

    public function getKategorie() {
        return $this->db->table('kategorie_masazi');
    }

    public function getMassage($id) {

        $masaze = $this->db->table('masaze')
            ->where('id_masaze', $id);
        $pom = array();

        foreach ($masaze as $masaz) {
            $pom['id_masaze'] = $masaz['id_masaze'];
            $pom['nazev'] = $masaz['nazev'];
            $pom['popis'] = $masaz['popis'];
            $pom['cas'] = $masaz['cas'];
            $pom['cena'] = $masaz['cena'];
            $pom['id_kategorie'] = $masaz['id_kategorie'];
        }

        return $pom;
    }
//jedna kategorie z DB dle $id
    public function getKategorii($id) {
        $kategorie = $this->db->table('kategorie_masazi')
            ->where('id_kategorie', $id);
        $pom = array();

        foreach ($kategorie as $kat) {
            $pom['nazev'] = $kat['nazev'];
            $pom['popis'] = $kat['popis'];
            $pom['id_kategorie'] = $kat['id_kategorie'];
        }

        return $pom;
    }

    public function getMassagesK($kategorie) {
            return $this->db->table('masaze')
                ->where('id_kategorie', $kategorie);
    }

    //pole[id => nazev, ]
    public  function getKategoriePole() {

        $kategorie = $this->getKategorie();

        $kat = array();

        foreach ($kategorie as $k) {
            $kat[$k['id_kategorie']] = $k['nazev'];
        }

        return $kat;
    }

    //pole[pole[kategorie => pole[masaz,..]],pole[],..]
    public function getMassagesArray() {

        $kategorie = $this->getKategorie();

        $masaze = array();

        foreach ($kategorie as $kat) {
            $m = array();
            $mas = $this->getMassagesK($kat['id_kategorie']);

            foreach ($mas as $ma) {
                $m[] = $ma['nazev'];
            }

            $masaze[] = array($kat['nazev'] => $m);
        }

         return $masaze;
    }

    //[idK =>[idM => M, idM => M],.. ]
    public function getMassagesArray2() {

        $kategorie = $this->getKategorie();

        $masaze = array();

        foreach ($kategorie as $kat) {
            $pomocne = array();
            $masazeDB = $this->getMassagesK($kat['id_kategorie']);

            foreach ($masazeDB as $masaz) {
                $pomocne[$masaz['id_masaze']] = $masaz['nazev'];
            }

            $masaze[$kat['id_kategorie']] = $pomocne;
        }

        return $masaze;
    }

    public  function insertMassage($values) {

        if ($values['id_masaze']) {
            $this->db->table('masaze')
                ->where('id_masaze', $values['id_masaze'])
                ->update(array(
                    'nazev' => $values['nazev'],
                    'popis' => $values['popis'],
                    'cas' => $values['cas'],
                    'cena' => $values['cena'],
                    'id_kategorie' => $values['kategorie']
                ));
        }
        else {
            if ($number = $this->db->table('masaze')->max('id_masaze'))
                $number += 1;
            else
                $number = 1;

            $this->db->table('masaze')->insert(array(
                'id_masaze' => $number,
                'nazev' => $values['nazev'],
                'popis' => $values['popis'],
                'cas' => $values['cas'],
                'cena' => $values['cena'],
                'id_kategorie' => $values['kategorie'],
            ));
        }

    }

    public  function insertKategorie($values) {

        if ($values['id_kategorie']) {
            $this->db->table('kategorie_masazi')
                ->where('id_kategorie', $values['id_kategorie'])
                ->update(array(
                    'nazev' => $values['nazev'],
                    'popis' => $values['popis'],
                ));
        }
        else {
            if ($number = $this->db->table('kategorie_masazi')->max('id_kategorie'))
                $number += 1;
            else
                $number = 1;

            $this->db->table('kategorie_masazi')->insert(array(
                'id_kategorie' => $number,
                'nazev' => $values['nazev'],
                'popis' => $values['popis'],
            ));
        }

    }
}