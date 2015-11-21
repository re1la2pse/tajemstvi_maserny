<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 14.11.2015
 * Time: 15:18
 */

namespace Forms;

use Nette\Application\UI\Form;
use App\Presenters\MassagesPresenter;

class KategorieForm extends BaseBT3Form {

    public function __construct()         {

    }

    public function create($kategorie) {

        $form = $this->getBootstrapForm();

        //cesta k obrazku
        $cesta = '../../';

        $form->addText('nazev', 'Název')
            ->setRequired('Název musí být vyplněn');
        $form->addTextArea('popis', 'Popis')
            ->setRequired('Popis musí být vyplněn');
        $form->addUpload('picture', 'Vyber fotku: ');
/*
        if ($kategorie['id_kategorie']) {
            $form['picture']->addRule($form::IMAGE, 'Fotky musí být ve formátu JPEG, PNG nebo GIF.');
        }
        else {
            $form['picture']
                ->addRule($form::IMAGE, 'Fotky musí být ve formátu JPEG, PNG nebo GIF.')
                ->setRequired('Vyberte prosím fotku.');
        }
*/
        $form->addHidden('id_kategorie', NULL);


        $form['popis']->getControlPrototype()->class('ckeditor');
        $form->getElementPrototype()->onsubmit('CKEDITOR.instances["' . $form['popis']->getHtmlId() . '"].updateElement()');

        if ($kategorie) {
            $form->setDefaults(array(
                'nazev' => $kategorie['nazev'],
                'popis' => $kategorie['popis'],
                'id_kategorie' => $kategorie['id_kategorie'],
            ));
            if ($kategorie['obrazek'] != '') {
                $form->addImage('pictureB', $cesta . $kategorie['obrazek'])
                    ->setDisabled(TRUE);
            }
        }
        $form->addSubmit('uloz', 'Uložit');

        if ($kategorie) {
            $form->addSubmit('smaz', 'Smazat');
        }


        return $form;
    }

}