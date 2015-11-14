<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 14.11.2015
 * Time: 15:18
 */

namespace Forms;

use Nette\Application\UI\Form;

class KategorieForm extends BaseBT3Form {

    public function __construct()         {

    }

    public function create($kategorie) {

        $form = $this->getBootstrapForm();

        $form->addText('nazev', 'Název')
            ->setRequired('Název musí být vyplněn');
        $form->addTextArea('popis', 'Popis')
            ->setRequired('Popis musí být vyplněn');
        $form->addHidden('id_kategorie', NULL);
        $form->addSubmit('uloz', 'Uložit');

        if ($kategorie) {
            $form->setDefaults(array(
               'nazev' => $kategorie['nazev'],
               'popis' => $kategorie['popis'],
               'id_kategorie' => $kategorie['id_kategorie'],
            ));
        }

        return $form;
    }

}