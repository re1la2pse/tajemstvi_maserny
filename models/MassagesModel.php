<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 21.11.2015
 * Time: 15:30
 */

class MassagesModel {


    /**
     * Vraci jen ty kategorie, ktere maji alespon jednu masaz
     * pridava idNazev ke kazde kategorii (nazev bez diakritiky a mezer)
     * @return array
     */
    public static function getCategories() {
        $pdo = Db_Data::getPDO();

        $sql = "SELECT k.id_kategorie, k.* FROM kategorie_masazi k WHERE EXISTS (select * from masaze where id_kategorie = k.id_kategorie order by razeni)";

        $q = $pdo->prepare($sql);
        $q->execute();

        $kategorie = $q->fetchAll();

        foreach( $kategorie as $key => $kat) {
            $kategorie[$key]['idNazev'] = self::title2pagename($kat['nazev']);
            //echo $kat['nazev'] . "<br />"
        }

        return $kategorie;
    }

    public static function getKategoriePN() {

        $kategorie = MassagesModel::getCategories();

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

        $return = Str_Replace(" ", "", $return); //smaze mezery
        $return = StrToLower($return); //velká písmena nahradí malými.
        return $return;
    }

    /**
     * vrati kategorie s masazema ktere do nich patri
     */
    public static function getCategoriesWithMassages() {
        $pdo = Db_Data::getPDO();

        $kategorie = self::getCategories();

        foreach($kategorie as $key =>$kat) {

            //$kategorie[$key]['idNazev'] = self::title2pagename($kat['nazev']);

            $kategorie[$key]['masaze'] = self::getMassagesByCategory($kat['id_kategorie']);

            //echo $kat['nazev'] . "-" . $key . "-" . $kategorie[$key]['idNazev'] . "<br />";
        }

        //pro testovani
        /*foreach($kategorie as $item) {
            foreach($item['masaze'] as $mas) {
                echo $item['nazev'] . "-" . $mas['nazev'] . "<br />";
            }
        }*/

        return $kategorie;
    }

    /**
     * Vrati vsechny masaze dane kategorie
     * @param $categoryId - id kategorie
     * @return mixed
     */
    public static function getMassagesByCategory($categoryId) {
        $pdo = Db_Data::getPDO();

        $sql = "SELECT * FROM masaze WHERE id_kategorie = :id order by razeni";

        $q = $pdo->prepare($sql);
        $q->execute(array(":id" => $categoryId));

        return $q->fetchall();
    }

}