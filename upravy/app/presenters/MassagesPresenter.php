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

//formulář pro masáže
    public function createComponentMassagesForm() {

        $masaz = NULL;

        if ($id = $this->getParameter('masaz')) {
            $masaz = $this->massagesModel->getMassage($id);
        }

        $form = (new Forms\MassagesForm())->create($this->massagesModel->getKategoriePole(), $masaz);

        $form->onSuccess[] = array($this, 'massageZpracujForm');

        return $form;
    }
//
    public function massageZpracujForm(Nette\Forms\Form $form) {
        if ($form['uloz']->isSubmittedBy()) {
            MassagesPresenter::massageFormSucceeded($form);
        }
        else {
            MassagesPresenter::massageFormDelete($form);
        }
    }
//vloží nebo updatuje masáž
    public function massageFormSucceeded($form) {
        $values = $form->getValues();

        $this->massagesModel->insertMassage($values);

        $this->flashMessage("Masáž uložena");
        $this->redirect('Massages:sprava');
    }
//smaze masáž
    public function massageFormDelete($form) {
        $values = $form->getValues();

        $this->massagesModel->deleteMasaz($values);

        $this->flashMessage("Masáž smazána");
        $this->redirect('Massages:sprava');
    }

//formulář pro kategorie
    public function createComponentKategorieForm() {
        $kategorie = NULL;

        if ($id = $this->getParameter('kategorie')) {
            $kategorie = $this->massagesModel->getKategorii($id);
        }
        $form = (new Forms\KategorieForm())->create($kategorie);

        $form->onSuccess[] = array($this, 'kategorieZpracujForm');

        return $form;
    }

    public function kategorieZpracujForm(Nette\Forms\Form $form) {
        if ($form['uloz']->isSubmittedBy()) {
            MassagesPresenter::kategorieFormSucceeded($form);
        }
        else {
            MassagesPresenter::kategorieFormDelete($form);
        }
    }

//vlozi kategorii
    public function kategorieFormSucceeded($form) {
        $values = $form->getValues();

        $this->massagesModel->insertKategorie($values);
        Debugger::fireLog($form);
        $this->flashMessage("Kategorie uložena");
        $this->redirect('Massages:sprava');
    }
//smaze kategorii
    public function kategorieFormDelete($form) {
        $values = $form->getValues();

        $this->massagesModel->deleteKategorie($values);
        //Debugger::fireLog($form);
        $this->flashMessage("Kategorie smazana");
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