<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 12.11.2015
 * Time: 17:58
 */

namespace Forms;

use Nette\Application\UI\Form;

class LoadMassagesForm extends BaseBT3Form {

    public function __construct() {

    }

    public function create() {
        $form = $this->getBootstrapForm();

        return $form;
    }

}