<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 18:18
 */
namespace Forms;

class AkceForm extends BaseBT3Form {

    public function __construct()         {
    }

    public function create($akce) {

        $form = $this->getBootstrapForm();

        $form->addText('nazev', 'Název')
            ->setRequired('Název musí být vyplněn');

        $form->addTextArea('popis', 'Popis')
            ->setRequired('Popis musí být vyplněn');

        $form->addText('plati', 'Platí do')
            ->setRequired('Platí do: musí být vyplněno');

        $form['popis']->getControlPrototype()->class('ckeditor');
        $form->getElementPrototype()->onsubmit('CKEDITOR.instances["' . $form['popis']->getHtmlId() . '"].updateElement()');

        $form->addHidden('id_akce', NULL);

        if ($akce) {
            $form->setDefaults(array(
                'nazev' => $akce['nazev'],
                'popis' => $akce['popis'],
                'plati' => $akce['plati'],
                'id_akce' => $akce['id_akce'],
            ));
        }

        $form->addSubmit('uloz', 'Uložit');

        if ($akce) {
            $form->addSubmit('smaz', 'Smazat');
        }

        return $form;
    }
}