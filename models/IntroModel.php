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
}