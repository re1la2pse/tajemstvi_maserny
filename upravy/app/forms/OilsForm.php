<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 01.12.2015
 * Time: 16:47
 */

namespace Forms;

use Nette\Application\UI\Form;

class OilsForm extends BaseBT3Form {

    public function __construct() {

    }

    public function create($kategorie = array(), $oil) {

        $form = $this->getBootstrapForm();

        $form->addText('nazev', 'Název')
            ->setRequired('Název musí být vyplněn');
        $form->addSelect('kategorie', 'Kategorie', $kategorie)
            ->setPrompt('Zvolte kategorii')
            ->setRequired('Vyberte kategorii');
        $form->addTextArea('popis', 'Popis')
            ->setRequired('Popis musí být vyplněn');
        $form->addText('cena', 'Cena')
            ->setRequired('Cena musí být vyplněna')
            ->addRule(Form::INTEGER, 'Cena musí být číslo');
        $form->addHidden('id_oleje', NULL);

        $form['popis']->getControlPrototype()->class('ckeditor');
        $form->getElementPrototype()->onsubmit('CKEDITOR.instances["' . $form['popis']->getHtmlId() . '"].updateElement()');

        if ($oil) {
            $form->setDefaults(array(
                'nazev' => $oil['nazev'],
                'kategorie' => $oil['id_kategorie'],
                'popis' => $oil['popis'],
                'cena' => $oil['cena'],
                'id_oleje' => $oil['id_oleje'],
            ));

        }

        $form->addSubmit('uloz', 'Uložit');

        if ($oil) {
            $form->addSubmit('smaz', 'Smazat');
        }

        return $form;
    }

}