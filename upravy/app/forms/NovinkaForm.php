<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 01.12.2015
 * Time: 16:47
 */

namespace Forms;

use Nette\Application\UI\Form;

class NovinkaForm extends BaseBT3Form {

    public function __construct() {

    }

    public function create($masaze = array(), $novinka) {

        $form = $this->getBootstrapForm();

        $form->addTextArea('popis', 'Popis')
            ->setRequired('Popis musí být vyplněn');
        $form->addSelect('id_masaze', 'Masáž', $masaze)
            ->setPrompt('Zvolte kategorii');
        $form->addHidden('id_novinky', NULL);
        $form->addUpload('picture', 'Vyber fotku: ');

        $form['popis']->getControlPrototype()->class('ckeditor');
        $form->getElementPrototype()->onsubmit('CKEDITOR.instances["' . $form['popis']->getHtmlId() . '"].updateElement()');

        if ($novinka) {
            $form->setDefaults(array(
                'popis' => $novinka['popis'],
                'id_masaze' => $novinka['id_masaze'],
                'id_novinky' => $novinka['id_novinky'],
            ));

        } else {
            $form->setDefaults(array('id_masaze' => -1));
        }

        $form->addSubmit('uloz', 'Uložit');

        if ($novinka) {
            $form->addSubmit('smaz', 'Smazat');
        }

        return $form;
    }

}