<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 20:03
 */

class AkceModel {
    /**
     * Vraci akce
     * @return array
     */
    public static function getAkce() {
        $pdo = Db_Data::getPDO();

        $sql = "SELECT k.id_akce, k.* FROM akce k ";

        $q = $pdo->prepare($sql);
        $q->execute();

        $kategorie = $q->fetchAll();

        foreach( $kategorie as $key => $kat) {
            $kategorie[$key]['nazev'] = $kat['nazev'];
            $kategorie[$key]['popis'] = $kat['popis'];
            $kategorie[$key]['plati'] = $kat['plati'];
        }

        return $kategorie;
    }
}