<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 01.12.2015
 * Time: 16:35
 */

namespace App\Presenters;

use Nette;
use Forms;
use App\Model\OilsModel;

class OilsPresenter extends BasePresenter {

    /**
     * @inject
     * @var OilsModel
     */
    public $oilsModel;
/*
    //formulář pro masáže
    public function createComponentOilsForm() {

        $oil = NULL;

        if ($id = $this->getParameter('oil')) {
            $oil = $this->oilsModel->getOil($id);
        }

        $form = (new Forms\OilsForm())->create($this->oilsModel->getKategoriePole(), $oil);

        $form->onSuccess[] = array($this, 'oilZpracujForm');

        return $form;
    }
//zpracuje tlacitko formulare
    public function oilZpracujForm(Nette\Forms\Form $form) {
        if ($form['uloz']->isSubmittedBy()) {
            OilsPresenter::oilFormSucceeded($form);
        }
        else {
            OilsPresenter::oilFormDelete($form);
        }
    }
//vloží nebo updatuje masáž
    public function oilFormSucceeded($form) {
        $values = $form->getValues();

        $this->oilsModel->insertOil($values);

        $this->flashMessage("Olej uložena");
        $this->redirect('Oils:sprava');
    }
//smaze masáž
    public function oilFormDelete($form) {
        $values = $form->getValues();

        $this->oilsModel->deleteMasaz($values);

        $this->flashMessage("Olej smazána");
        $this->redirect('Oils:sprava');
    }
*/
//formulář pro kategorie
    public function createComponentKategorieOForm() {
        $kategorie = NULL;

        if ($id = $this->getParameter('kategorie')) {
            $kategorie = $this->oilsModel->getKategorii($id);
        }
        $form = (new Forms\KategorieOForm())->create($kategorie);

        $form->onSuccess[] = array($this, 'kategorieZpracujForm');

        return $form;
    }
//zpracuje tlacitko formulare
    public function kategorieZpracujForm(Nette\Forms\Form $form) {
        if ($form['uloz']->isSubmittedBy()) {
            OilsPresenter::kategorieFormSucceeded($form);
        }
        else {
            OilsPresenter::kategorieFormDelete($form);
        }
    }
//vlozi kategorii
    public function kategorieFormSucceeded($form) {
        $values = $form->getValues();
        $this->oilsModel->insertKategorie($values);
        $this->flashMessage("Kategorie uložena");
        $this->redirect('Oils:sprava');
    }
//smaze kategorii
    public function kategorieFormDelete($form) {
        $values = $form->getValues();
        $this->oilsModel->deleteKategorie($values);
        $this->flashMessage("Kategorie smazana");
        $this->redirect('Oils:sprava');
    }


    public function  renderSprava() {
        $this->template->kategorie = $this->oilsModel->getKategoriePole();
        $this->template->oils = $this->oilsModel->getOilsPole();
    }

    public function  renderUpravaK() {

    }

    public function renderUpravaM() {

    }
}