<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 12.11.2015
 * Time: 19:48
 */

namespace Forms;

use Nette\Application\UI\Form;

class MassagesForm extends BaseBT3Form {

    public function __construct() {

    }

    public function create($kategorie = array(), $masaz) {

        $form = $this->getBootstrapForm();

        $cesta = '../../';

        $form->addText('nazev', 'Název')
            ->setRequired('Název musí být vyplněn');
        $form->addSelect('kategorie', 'Kategorie', $kategorie)
            ->setPrompt('Zvolte kategorii')
            ->setRequired('Vyberte kategorii');
        $form->addTextArea('popis', 'Popis')
            ->setRequired('Popis musí být vyplněn');
        $form->addText('cas', ' Čas v minutách')
            ->setRequired('Čas musí být vyplněn')
            ->addRule(Form::INTEGER, 'Čas musí být číslo');
        $form->addText('cena', 'Cena')
            ->setRequired('Cena musí být vyplněna')
            ->addRule(Form::INTEGER, 'Cena musí být číslo');
        $form->addHidden('id_masaze', NULL);
        $form->addUpload('picture', 'Vyber fotku: ');

        $form['popis']->getControlPrototype()->class('ckeditor');
        $form->getElementPrototype()->onsubmit('CKEDITOR.instances["' . $form['popis']->getHtmlId() . '"].updateElement()');

        if ($masaz) {
            $form->setDefaults(array(
                'nazev' => $masaz['nazev'],
                'kategorie' => $masaz['id_kategorie'],
                'popis' => $masaz['popis'],
                'cas' => $masaz['cas'],
                'cena' => $masaz['cena'],
                'id_masaze' => $masaz['id_masaze'],
            ));

           /* if ($masaz['obrazek'] != '') {
                $form->addImage('pictureB', $cesta . $masaz['obrazek'])
                    ->setDisabled(TRUE);
            }*/
        }

        $form->addSubmit('uloz', 'Uložit');

        if ($masaz) {
            $form->addSubmit('smaz', 'Smazat');
        }




        return $form;
    }
}