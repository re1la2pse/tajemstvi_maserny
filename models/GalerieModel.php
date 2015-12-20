
<?php

class GalerieModel {

    public static function getGalerie() {

        $pdo = Db_Data::getPDO();

        $sql = "SELECT * FROM fotky WHERE zobrazit = 1 ORDER BY razeni";

        $q = $pdo->prepare($sql);
        $q->execute();

        return $q->fetchAll();;
    }
}