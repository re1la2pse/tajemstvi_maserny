<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 18:37
 */
namespace App\Presenters;

use Nette;
use Forms;
use App\Model\IntroModel;

class IntroPresenter extends BasePresenter {

    /**
     * @inject
     * @var IntroModel
     */
    public $introModel;

    protected function createComponentIntroForm()
    {
        $form = (new Forms\IntroForm())->create();

        $form->onSuccess[] = array($this, 'fotkaFormSucceeded');

        return $form;
    }

    public function fotkaFormSucceeded($form)
    {

        $values = $form->getValues();

        $this->introModel->insertPictures($values['pictures']);

        $this->flashMessage("Fotky byly úspěšně nahrány.");
        $this->redirect('Intro:sprava');
    }

    public function createComponentChangeForm() {

        $form = (new Forms\IntroChangeForm())->create($this->introModel->getGalerie());

        $form->onSuccess[] = array($this, 'changeFormSucceeded');

        return $form;
    }

    public function changeFormSucceeded($form) {
        $values = $form->getValues();

        $this->introModel->changePictures($values);

        $this->flashMessage("Změny byly provedeny");
        $this->redirect('Intro:sprava');
    }

    public function createComponentNovinkaForm() {
        $novinka = NULL;

        if ($id = $this->getParameter('novinka')) {
            $novinka = $this->introModel->getNovinku($id);
        }

        $form = (new Forms\NovinkaForm())->create($this->introModel->getMassagesPole(), $novinka);

        $form->onSuccess[] = array($this, 'novinkaFormZpracuj');

        return $form;
    }

    public function novinkaFormZpracuj($form){
        if ($form['uloz']->isSubmittedBy()) {
            IntroPresenter::novinkaFormSucceeded($form);
        } else {
            IntroPresenter::novinkaFormDelete($form);
        }
    }
//vloží nebo updatuje novinku
    public function novinkaFormSucceeded($form) {
        $values = $form->getValues();

        $this->introModel->insertNovinka($values);

        $this->flashMessage("Novinka byla vložena");
        $this->redirect('Intro:spravaN');
    }
//smaze novinku
    public function novinkaFormDelete($form) {
        $values = $form->getValues();

        $this->introModel->deleteNovinka($values);

        $this->flashMessage("Novinka smazána");
        $this->redirect('Intro:spravaN');
    }

    /**
     * render metoda pro sablonu testTemplate
     */
    public function renderAddPhoto() {
    }

    public function renderSprava() {

        $this->template->style = "sprava_fotogalerie_style";
    }

    public function renderspravaN() {
        $this->template->novinky = $this->introModel->getNovinky();
    }

    public function renderUpravaN() {
    }

}