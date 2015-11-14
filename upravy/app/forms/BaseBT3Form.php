<?php

namespace Forms;

use Nette;
use Nette\Application\UI\Form;

/**
 * Základní třída pro formulář ve stylu Bootstrap 3
 */
class BaseBT3Form extends Nette\Object {

    //Vrati formular s nastavenym rendererem pro Bootstrapu 3
    protected function getBootstrapForm() {

        $form = new Form;
        $renderer = new BT3Renderer();
        $form->setRenderer($renderer);

        return $form;
    }
}