<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 19.11.2015
 * Time: 16:58
 */

namespace App\Model;

use Nette;

class MyPurifier extends Nette\Object {

    private  $htmlPurifier;

    public function __construct() {
        $config = \HTMLPurifier_Config::createDefault();
        $this->htmlPurifier = new \HTMLPurifier($config);
    }

    /**
     * Vytvori miniaturu pro nahled a velkou fotku.
     * Obe dve ulozi a prida zaznam do databaze
     * @param $dirtyHtml
     */
    public function purify($dirtyHtml) {
        return $this->htmlPurifier->purify($dirtyHtml);
    }
}