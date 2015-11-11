<?php
/**
 * Created by PhpStorm.
 * User: Petr Mokrusa
 * Date: 15.9.15
 * Time: 20:12
 */


require_once ('models/smarty/smarty/Smarty.class.php');
mb_internal_encoding("UTF-8");

function autoloaderFnc($class) {

    if (preg_match('/Controller$/', $class))
        require("controllers/" . $class . ".php");
    elseif (preg_match('/Data$/', $class))
        require("models/data/" . $class . ".php");
    else
        require("models/" . $class . ".php");
}

//registrace callbacku autoloaderu
spl_autoload_register("autoloaderFnc");

//volam hlavni controler
MainController::dispatch(Utils::parseURL($_SERVER['REQUEST_URI']));



