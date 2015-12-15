<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 18:15
 */

namespace Forms;

class IntroForm extends BaseBT3Form
{
    public function __construct()
    {
        //konstruktor
    }

    public function create()
    {
        $form = $this->getBootstrapForm();

        $form->addMultiUpload('pictures', 'Vyber fotky: ')
            ->addRule($form::IMAGE, 'Fotky musí být ve formátu JPEG, PNG nebo GIF.')
            ->setRequired('Vyberte prosím fotky.');

        $form->addSubmit('send', 'Nahrát');

        return $form;

    }
}