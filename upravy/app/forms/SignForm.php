<?php

namespace Forms;

use Nette\Application\UI\Form;


class SignForm extends BaseBT3Form
{
    public function __construct()
    {
        //konstruktor
    }

    public function create()
    {
        $form = $this->getBootstrapForm();

	$form->addText('username', 'Jméno:')
            ->setRequired('Prosím vložte vaše přihlašovací jméno.');

	$form->addPassword('password', 'Heslo:')
		->setRequired('Prosím vložte vaše heslo.');

	$form->addCheckbox('remember', 'Zůstat přihlášený');

	$form->addSubmit('send', 'Přihlásit se');

	return $form;

    }
}