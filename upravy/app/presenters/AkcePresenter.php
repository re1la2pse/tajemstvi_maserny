<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 18:34
 */
namespace App\Presenters;

use Nette;
use Forms;
use App\Model\AkceModel;

class AkcePresenter extends BasePresenter {

    /**
     * @inject
     * @var AkceModel
     */
    public $akceModel;

//formulář pro akci
    public function createComponentAkceForm() {

        $akce = NULL;

        if ($id = $this->getParameter('akce')) {
            $akce = $this->akceModel->getAkceId($id);
        }

        $form = (new Forms\AkceForm())->create($akce);

        $form->onSuccess[] = array($this, 'akceZpracujForm');

        return $form;
    }
//
    public function akceZpracujForm(Nette\Forms\Form $form) {
        if ($form['uloz']->isSubmittedBy()) {
            AKcePresenter::akceFormSucceeded($form);
        }
        else {
            AkcePresenter::akceFormDelete($form);
        }
    }
//vloží nebo updatuje akci
    public function akceFormSucceeded($form) {
        $values = $form->getValues();

        $this->akceModel->insertAkce($values);

        $this->flashMessage("Akce uložena");
        $this->redirect('Akce:sprava');
    }
//smaže akci
    public function akceFormDelete($form) {
        $values = $form->getValues();

        $this->akceModel->deleteAkce($values);

        $this->flashMessage("Akce smazána");
        $this->redirect('Akce:sprava');
    }

    public function  renderUprava() {

    }

    public function renderSprava() {
        $this->template->akce = $this->akceModel->getAkcePole();
    }

}