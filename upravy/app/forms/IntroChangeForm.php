<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 19:44
 */

namespace Forms;

class IntroChangeForm extends BaseBT3Form {

    public function __construct() {

    }

    public function create($pictures = array()) {
        $form = $this->getBootstrapForm();

        $cesta = '../../';

        foreach ($pictures as $picture) {
            $form->addImage('nic' . $picture['id_intro'], $cesta . $picture['miniatura'])
                ->setDisabled(TRUE);

            $form->addCheckbox('smazat'.$picture['id_intro'], 'Smazat');
            $form->addCheckbox('zobrazit'.$picture['id_intro'], 'Zobrazit');

            if ($picture['zobrazit'] == 0)
                $form['zobrazit'.$picture['id_intro']]->setDefaultValue('0');
            else
                $form['zobrazit'.$picture['id_intro']]->setDefaultValue('1');
        }

        $form->addSubmit('send', 'Uložit změny');

        return $form;
    }
}