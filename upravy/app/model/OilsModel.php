<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 01.12.2015
 * Time: 16:50
 */

namespace App\Model;

use Nette;

class OilsModel {

    private $db;
    private $purify;

    public function __construct(Nette\Database\Context $database)
    {
        $this->db = $database;
        $this->purify = new MyPurifier();
    }

    //nacte kategorie z DB
    public function getKategorie() {
        return $this->db->table('kategorie_oleju');
    }
    //nacte oleje dane kategorie
    public function getOilsK($kategorie) {
        return $this->db->table('oleje')
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
    //nacte oleje ve tvaru [idK =>[idO => O, idO => O],.. ]
    public function getOilsPole() {

        $kategorie = $this->getKategorie();

        $oils = array();

        foreach ($kategorie as $kat) {
            $pomocne = array();
            $oilsDB = $this->getOilsK($kat['id_kategorie']);

            foreach ($oilsDB as $oil) {
                $pomocne[$oil['id_oleje']] = $oil['nazev'];
            }

            $oils[$kat['id_kategorie']] = $pomocne;
        }

        return $oils;
    }
    //nacte kategorii z DB dle ID
    public function getKategorii($id) {
        $kategorie = $this->db->table('kategorie_oleju')
            ->get($id);

        return $kategorie->toArray();
    }
    //vlozi nebo updatuje kategorii
    /**
     * @param $values
     */
    public  function insertKategorie($values) {

        //osetri vstup
        $values['nazev'] = $this->purify->purify($values['nazev']);
        //aktualizace kategorie
        if ($values['id_kategorie']) {
              $this->db->table('kategorie_oleju')
                  ->where('id_kategorie', $values['id_kategorie'])
                  ->update(array(
                      'nazev' => $values['nazev'],
                  ));

        }
        else {
            //ID v db
            if ($number = $this->db->table('kategorie_oleju')->max('id_kategorie'))
                $number += 1;
            else
                $number = 1;

            $this->db->table('kategorie_oleju')->insert(array(
                 'id_kategorie' => $number,
                 'nazev' => $values['nazev'],
            ));

        }

    }
    //smaze kategorii
    public function deleteKategorie ($values) {
        $oleje = $this->db->table('oleje')->where('id_kategorie', $values['id_kategorie'])->select('id_oleje');

        foreach ($oleje as $idOleje => $hodnotyOleje) {
            $this->deleteOilID($idOleje);
        }

        $this->db->table('kategorie_oleju')
            ->where('id_kategorie', $values['id_kategorie'])
            ->delete();
    }
    //smaze olej dle ID
    public function deleteOilID($id) {
        $this->db->table('oleje')
            ->where('id_oleje', $id)
            ->delete();
    }

    //vlozi nebo updatuje olej
    public  function insertOil($values) {
        //osetri vstup
        $values['nazev'] = $this->purify->purify($values['nazev']);
        $values['popis'] = $this->purify->purify($values['popis']);
        $values['cena'] = $this->purify->purify($values['cena']);
        //update masaze
        if ($values['id_oleje']) {

            //vlozeni do DB
            $this->db->table('oleje')
                    ->where('id_oleje', $values['id_oleje'])
                    ->update(array(
                        'nazev' => $values['nazev'],
                        'popis' => $values['popis'],
                        'cena' => $values['cena'],
                        'id_kategorie' => $values['kategorie'],
                    ));

        }
        //nova masaz
        else {
            //ID do DB
            if ($number = $this->db->table('oleje')->max('id_oleje'))
                $number += 1;
            else
                $number = 1;

            //vlozeni do DB
            $this->db->table('oleje')->insert(array(
                    'id_oleje' => $number,
                    'nazev' => $values['nazev'],
                    'popis' => $values['popis'],
                    'cena' => $values['cena'],
                    'id_kategorie' => $values['kategorie'],
                ));
            }

    }
//smaze masaz
    public function deleteOil ($values) {
        $this->db->table('oleje')
            ->where('id_oleje', $values['id_oleje'])
            ->delete();
    }
//nacte olej z DB dle ID
    public function getOil($id) {
        $oil = $this->db->table('oleje')
            ->get($id);
        return $oil->toArray();
    }

}