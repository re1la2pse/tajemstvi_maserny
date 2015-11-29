<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 12.11.2015
 * Time: 16:35
 */

namespace App\Model;

use Nette;
use App\Model\MyPurifier;


class MassagesModel extends Nette\Object {
    private $db;
    private $purify;

    public function __construct(Nette\Database\Context $database)
    {
        $this->db = $database;
        $this->purify = new MyPurifier();
    }

//nacte masaze z DB
    public function getMassages() {
        return $this->db->table('masaze');
    }
//nacte kategorie z DB
    public function getKategorie() {
        return $this->db->table('kategorie_masazi');
    }
//nacte masaz z DB dle ID
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
            $pom['obrazek'] = $masaz['obrazek'];
            $pom['id_kategorie'] = $masaz['id_kategorie'];
        }

        return $pom;
    }
//nacte kategorii z DB dle ID
    public function getKategorii($id) {
        $kategorie = $this->db->table('kategorie_masazi')
            ->where('id_kategorie', $id);
        $pom = array();

        foreach ($kategorie as $kat) {
            $pom['nazev'] = $kat['nazev'];
            $pom['popis'] = $kat['popis'];
            //$pom['obrazek'] = $kat['obrazek'];
            $pom['id_kategorie'] = $kat['id_kategorie'];
        }

        return $pom;
    }

    public function getMassagesK($kategorie) {
            return $this->db->table('masaze')
                ->where('id_kategorie', $kategorie);
    }

//nacte kategorie ve tvaru [id => nazev, ]
    public  function getKategoriePole() {

        $kategorie = $this->getKategorie();

        $kat = array();

        foreach ($kategorie as $k) {
            $kat[$k['id_kategorie']] = $k['nazev'];
        }

        return $kat;
    }

//nacte masaze ve tvaru [[kategorie => [masaz,..]],[],..]
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

//nacte masaze ve tvaru [idK =>[idM => M, idM => M],.. ]
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

//vlozi nebo updatuje masaz
    public  function insertMassage($values) {

        $values['nazev'] = $this->purify->purify($values['nazev']);
        $values['popis'] = $this->purify->purify($values['popis']);
        $values['cas'] = $this->purify->purify($values['cas']);
        $values['cena'] = $this->purify->purify($values['cena']);

        if ($values['id_masaze']) {

            if ($values['picture'] != '') {

                $fileName = $values['picture']->getSanitizedName();
                $pripona = pathinfo($fileName, PATHINFO_EXTENSION);
                $Picture = $values['picture']->toImage();
                $Picture->save('../../media/img/kategorie/' . $values['id_kategorie'] . '.' . $pripona);
                $this->db->table('kategorie_masazi')
                    ->where('id_kategorie', $values['id_kategorie'])
                    ->update(array(
                        'obrazek' => "media/img/kategorie/" . $values['id_kategorie'] . '.' . $pripona,
                    ));
            }

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

            $pripona = "";
            if ($values['picture'] != '') {
                $fileName = $values['picture']->getSanitizedName();
                $pripona = pathinfo($fileName, PATHINFO_EXTENSION);
                $Picture = $values['picture']->toImage();
                $Picture->save('../../media/img/masaze/' . $number . '.' . $pripona);
            }

            $this->db->table('masaze')->insert(array(
                'id_masaze' => $number,
                'nazev' => $values['nazev'],
                'popis' => $values['popis'],
                'cas' => $values['cas'],
                'cena' => $values['cena'],
                'obrazek' => "media/img/masaze/" . $number . '.' . $pripona,
                'id_kategorie' => $values['kategorie'],
            ));
        }

    }

//vlozi nebo updatuje kategorii
    /**
     * @param $values
     */
    public  function insertKategorie($values) {

        $values['nazev'] = $this->purify->purify($values['nazev']);
        $values['popis'] = $this->purify->purify($values['popis']);

        if ($values['id_kategorie']) {
            if ($values['picture'] != '') {

                $fileName = $values['picture']->getSanitizedName();
                $pripona = pathinfo($fileName, PATHINFO_EXTENSION);
                $Picture = $values['picture']->toImage();
                $Picture->save('../../media/img/kategorie/' . $values['id_kategorie'] . '.' . $pripona);
                $this->db->table('kategorie_masazi')
                    ->where('id_kategorie', $values['id_kategorie'])
                    ->update(array(
                        'obrazek' => "media/img/kategorie/" . $values['id_kategorie'] . '.' . $pripona,
                    ));
            }

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

            $pripona = "";
            if ($values['picture'] != '') {
                $fileName = $values['picture']->getSanitizedName();
                $pripona = pathinfo($fileName, PATHINFO_EXTENSION);
                $Picture = $values['picture']->toImage();
                $Picture->save('../../media/img/kategorie/' . $number . '.' . $pripona);
            }

            $this->db->table('kategorie_masazi')->insert(array(
                'id_kategorie' => $number,
                'nazev' => $values['nazev'],
                'popis' => $values['popis'],
                'obrazek' => "media/img/kategorie/" . $number . '.' . $pripona,
            ));
        }

    }

//smaze kategorii

    public function deleteKategorie ($values) {

        $kategorie = $this->db->table('kategorie_masazi')->where('id_kategorie', $values['id_kategorie']);

        foreach ($kategorie as $kat) {
            $cestaImg = $kat['obrazek'];
        }

        unlink('../../' . $cestaImg);
        $this->db->table('kategorie_masazi')
            ->where('id_kategorie', $values['id_kategorie'])
            ->delete();
    }
    
//smaze 

//smaze masaz
    public function deleteMasaz ($values) {

        $kategorie = $this->db->table('masaze')->where('id_masaze', $values['id_masaze']);

        foreach ($kategorie as $kat) {
            $cestaImg = $kat['obrazek'];
        }

        unlink('../../' . $cestaImg);
        $this->db->table('masaze')
            ->where('id_masaze', $values['id_masaze'])
            ->delete();
    }
}