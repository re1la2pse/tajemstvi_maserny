<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 12.11.2015
 * Time: 16:35
 */

namespace App\Presenters;

use Nette;
use Forms;
use App\Model\MassagesModel;
use Nette\Utils\Arrays;
use Tracy\Debugger;

class MassagesPresenter extends BasePresenter {

    /**
     * @inject
     * @var MassagesModel
     */
    public $massagesModel;

    //Massaz
    public function createComponentMassagesForm() {

        $masaz = NULL;

        if ($id = $this->getParameter('masaz')) {
            $masaz = $this->massagesModel->getMassage($id);
        }

        $form = (new Forms\MassagesForm())->create($this->massagesModel->getKategoriePole(), $masaz);

        $form->onSuccess[] = array($this, 'massageFormSucceeded');

        return $form;
    }

    public function massageFormSucceeded($form) {

        $values = $form->getValues();

        $this->massagesModel->insertMassage($values);

        $this->flashMessage("Masáž uložena");
        $this->redirect('Massages:sprava');
    }

    //Kategorie
    public function createComponentKategorieForm() {

        $kategorie = NULL;

        if ($id = $this->getParameter('kategorie')) {
            $kategorie = $this->massagesModel->getKategorii($id);
        }
        $form = (new Forms\KategorieForm())->create($kategorie);

        $form->onSuccess[] = array($this, 'kategorieFormSucceeded');

        return $form;
    }

    public function kategorieFormSucceeded($form) {

        $values = $form->getValues();

        $this->massagesModel->insertKategorie($values);

        $this->flashMessage("Kategorie uložena");
        $this->redirect('Massages:sprava');
    }



    public function  renderUpravaK() {

    }

    public function  renderUpravaM() {

    }

    public function renderSprava() {
        $this->template->kategorie = $this->massagesModel->getKategoriePole();
        $this->template->masaze = $this->massagesModel->getMassagesArray2();
    }

}