<?php
/**
 * Created by PhpStorm.
 * User: Petr Mokrusa
 * Date: 15.9.15
 * Time: 20:39
 */

class MainController {

    public static function dispatch($path) {

        $kategorie = MassagesModel::getKategoriePN();

        $p = array_shift($path);

        switch ($p) {
            case "":
                self::frontPage();
            break;

            case "kontakt":
                self::contact();
            break;

            case "darkovyPoukaz":
                self::voucher();
                break;
/*
            case "rekondicni":
            case "relaxacni":
            case "detoxikacni":
            case "pristrojove":
            case "specialni":
            self::massages();
            break;
*/
            case "galerie":
                self::galerie();
                break;

            case "oleje":
                self::oils();
                break;

            default:
                if (in_array($p, $kategorie)) {
                    self::massages();
                }
                else {
                    echo "Tato stránka neexistuje";
                }
        }
    }

    public static function frontPage() {

        $smarty = Utils::smartyInit();

        $smarty->assign('kategoriePN', MassagesModel::getKategoriePN());
        $smarty->assign('kategorie', MassagesModel::getKategorie());

        $smarty->assign('style', 'frontPage_style');
        $smarty->display('frontPage.html');
        exit;
        
    }

    public static function contact() {

        $smarty = Utils::smartyInit();
        
        $smarty->assign('style', 'contact_style');
        $smarty->display('contact.html');
        exit;
    }

    public static function voucher() {

        $smarty = Utils::smartyInit();

        $smarty->assign('js_script', 'voucher');
        $smarty->assign('style', 'voucher_style');
        $smarty->display('voucher.html');
        exit;
    }

    public static function massages() {

        $smarty = Utils::smartyInit();

        $smarty->assign('js_script', 'massage');
        $smarty->assign('style', 'massages_style');
        $smarty->display('massages.html');
        exit;
    }

    public static function galerie() {

        $smarty = Utils::smartyInit();

        //$smarty->assign('js_script', 'galerie');
        $smarty->assign('style', 'galerie_style');
        
        $smarty->assign('galerie', true);
        $smarty->assign('photos', GalerieModel::getGalerie());

        $smarty->display('galerie.html');
        exit;
    }

    public static function oils() {

        $smarty = Utils::smartyInit();

        //$smarty->assign('js_script', 'galerie');
        $smarty->assign('style', 'oils_style');

        $smarty->display('oils.html');
        exit;
    }


} 