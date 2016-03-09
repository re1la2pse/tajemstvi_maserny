<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 20:22
 */

class IntroModel {
    public static function getIntro() {

        $pdo = Db_Data::getPDO();

        $sql = "SELECT * FROM intro WHERE zobrazit = 1";

        $q = $pdo->prepare($sql);
        $q->execute();

        return $q->fetchAll();
    }

    public static function getNews() {

        $pdo = Db_Data::getPDO();

        $sql = "SELECT * FROM novinky LIMIT 3";

        $q = $pdo->prepare($sql);
        $q->execute();

        $news = $q->fetchAll();

        foreach($news as $key => $new) {
            if ($new['id_masaze'] > 0) {
                $news[$key]['url'] = IntroModel::returnURL($new['id_masaze']);
            }
        }

        return $news;
    }
    /**
     * vrati url k masazi
     */
    public static function returnURL($id) {

        $pdo = Db_Data::getPDO();

        $sqlMasaz = "SELECT * FROM masaze WHERE id_masaze = ".$id;

        $q = $pdo->prepare($sqlMasaz);
        $q->execute();

        $masaz = $q->fetchAll();

        $sqlKategorie = "SELECT * FROM kategorie_masazi WHERE id_kategorie = ".$masaz[0]['id_kategorie'];

        $r = $pdo->prepare($sqlKategorie);
        $r->execute();

        $kategorie = $r->fetchAll();

        return MassagesModel::title2pagename($kategorie[0]['nazev']).'#idMasaze'.$masaz[0]['id_kategorie'];
    }
}