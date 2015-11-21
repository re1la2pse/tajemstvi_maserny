<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 21.11.2015
 * Time: 15:30
 */

class MassagesModel {


    public static function getKategorie() {
        $pdo = Db_Data::getPDO();

        $sql = "SELECT * FROM kategorie_masazi";

        $q = $pdo->prepare($sql);
        $q->execute();

        return $q->fetchAll();
    }

    public static function getKategoriePN() {

        $kategorie = MassagesModel::getKategorie();

        $kat = array();
        $i = 1;

        foreach ($kategorie as $ka) {
            $kat[$i] = MassagesModel::title2pagename($ka['nazev']);
            $i++;
        }

        return $kat;
    }

    public static function title2pagename($text) {
        $znaky = array(
            'á' => 'a',
            'é' => 'e',
            'ě' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'ů' => 'u',
            'ý' => 'y',
            'ž' => 'z',
            'š' => 's',
            'č' => 'c',
            'ř' => 'r',
            'Á' => 'A',
            'É' => 'E',
            'Ě' => 'E',
            'Í' => 'I',
            'Ó' => 'O',
            'Ú' => 'U',
            'Ů' => 'U',
            'Ý' => 'Y',
            'Ž' => 'Z',
            'Š' => 'S',
            'Č' => 'C',
            'Ř' => 'R',
        );

        $return = strtr($text, $znaky);

        $return = Str_Replace(" ", "-", $return); //nahradí mezery a podtržítka pomlčkami
        $return = StrToLower($return); //velká písmena nahradí malými.
        return $return;
    }

}