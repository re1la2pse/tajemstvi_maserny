<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 07.11.2015
 * Time: 20:15
 */

namespace Forms;

use Nette\Application\UI\Form;

class ChangePictureForm extends BaseBT3Form {

    public function __construct() {

    }

    public function create($pictures = array()) {
        $form = $this->getBootstrapForm();

        //$form->addSubmit('send1', 'Uložit změny');

        foreach ($pictures as $picture) {
            //$form->addHidden($picture['id_fotky']);
            $form->addImage('nic' . $picture['id_fotky'], '../../../' . $picture['miniatura'])
                ->setDisabled(TRUE);

            $form->addCheckbox('smazat'.$picture['id_fotky'], 'Smazat');
            $form->addCheckbox('zobrazit'.$picture['id_fotky'], 'Zobrazit');

            if ($picture['zobrazit'] == 0)
              $form['zobrazit'.$picture['id_fotky']]->setDefaultValue('0');
            else
              $form['zobrazit'.$picture['id_fotky']]->setDefaultValue('1');
        }

        $form->addSubmit('send', 'Uložit změny');

        return $form;
    }
}