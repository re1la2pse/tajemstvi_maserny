<?php
/**
 * Created by PhpStorm.
 * User: Petr Mokrusa
 * Date: 15.9.15
 * Time: 21:06
 */



class Utils {

    private static $smarty;

    public static function parseURL($url) {

        $parseURL = parse_url($url);
        $parseURL["path"] = ltrim($parseURL['path'], "/");
        $parseURL["path"] = trim($parseURL["path"]);

        $path = explode("/", $parseURL["path"]);

        /** zakomentovat na produkcnim asi
         * ted je v $patch 0 => kostra_PHP_smarty 1 => controller, 2 => dalsiParametry
         * nejak poresim az to budu nahravat na produkcni
         */
        array_shift($path);

        return $path;
    }

    /**
     * Nastavi a vrati smarty promennou.
     * @return Smarty
     */
    public static function smartyInit() {

        if (self::$smarty ===  NULL) {
            self::$smarty = new Smarty();
            //echo "nova smarty";
            self::$smarty->setTemplateDir('templates/');
            self::$smarty->setCompileDir('models/smarty/c_templates/');
            self::$smarty->setConfigDir('models/smarty/smarty_config/');
            self::$smarty->setCacheDir('models/smarty/smarty_cache/');
            self::$smarty->caching = 0;
           // self::$smarty->debugging = true;

            if($_SERVER['SERVER_NAME'] == 'localhost') {
                self::$smarty->assign('ROOT', '/procha_projekt_git');
            } else {
                self::$smarty->assign('ROOT', '');
            }
        }

        return self::$smarty;
    }
}