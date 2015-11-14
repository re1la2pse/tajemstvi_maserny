<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 12.11.2015
 * Time: 19:48
 */

namespace Forms;

use Nette\Application\UI\Form;


class UpravaMassagesForm extends BaseBT3Form {

    public function __construct() {

    }

    public function create() {
        $form = $this->getBootstrapForm();

        $form->addText('nazev', 'Název');
        //$form->addSelect();  //kategorie masaze
        $form->addTextArea('popis', 'Popis');

        $form->addSubmit('uloz', 'Uložit');

        return $form;
    }
}