<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 01.12.2015
 * Time: 16:47
 */

namespace Forms;


class KategorieOForm extends BaseBT3Form {

    public function __construct()         {
    }

    public function create($kategorie) {

        $form = $this->getBootstrapForm();

        $form->addText('nazev', 'Název')
            ->setRequired('Název musí být vyplněn');

        $form->addHidden('id_kategorie', NULL);

        if ($kategorie) {
            $form->setDefaults(array(
                'nazev' => $kategorie['nazev'],
                'id_kategorie' => $kategorie['id_kategorie'],
            ));
        }

        $form->addSubmit('uloz', 'Uložit');

        if ($kategorie) {
            $form->addSubmit('smaz', 'Smazat');
        }

        return $form;
    }
}