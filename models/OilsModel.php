<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 12.12.2015
 * Time: 17:20
 */

class OilsModel {

    /**
     * vrati kategorie s olejama, ktere do nich patri
     */
    public static function getCategoriesWithOils() {

        $kategorie = self::getCategories();

        foreach($kategorie as $key => $kat) {
            $kategorie[$key]['oleje'] = self::getOilsByCategory($kat['id_kategorie']);
        }

        return $kategorie;
    }

    /**
     * Vraci jen ty kategorie, ktere maji alespon jeden olej
     * @return array
     */
    public static function getCategories() {
        $pdo = Db_Data::getPDO();

        $sql = "SELECT k.id_kategorie, k.* FROM kategorie_oleju k WHERE EXISTS (select * from oleje where id_kategorie = k.id_kategorie )";

        $q = $pdo->prepare($sql);
        $q->execute();

        $kategorie = $q->fetchAll();

        foreach( $kategorie as $key => $kat) {
            $kategorie[$key]['idNazev'] = $kat['nazev'];
        }

        return $kategorie;
    }

    /**
     * Vrati vsechny oleje dane kategorie
     * @param $categoryId - id kategorie
     * @return mixed
     */
    public static function getOilsByCategory($categoryId) {
        $pdo = Db_Data::getPDO();

        $sql = "SELECT * FROM oleje WHERE id_kategorie = :id";

        $q = $pdo->prepare($sql);
        $q->execute(array(":id" => $categoryId));

        return $q->fetchall();
    }

}