<?php

/**
 * Class Db_Data
 * PDO pro praci s databazi
 * vraci instanci PDO
 */
class Db_Data {

    private static $nastaveniDB = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    private static $db;


    public static function getPDO() {

        try {
            if(!isset(self::$db)) {
                self::$db = new PDO(
                    "mysql:host=127.0.0.1;dbname=fotogalerie",
                    "root",
                    "",
                    self::$nastaveniDB);
            }

        } catch (PDOException $e) {
            die('Připojení k databázi selhalo: ' . $e->getMessage());
        }

        return self::$db;
    }
}