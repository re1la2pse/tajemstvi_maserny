
<?php

class GalerieModel {

    public static function getGalerie() {

        $pdo = Db_Data::getPDO();

        $sql = "SELECT * FROM fotky WHERE zobrazit = 1";

        $q = $pdo->prepare($sql);
        $q->execute();

        return $q->fetchAll();;
    }
}