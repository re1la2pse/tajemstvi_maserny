<?php

namespace App\Presenters;

use Nette;
use Forms;
use App\Model\GalerieModel;
use Nette\Utils\Image;

class FotogaleriePresenter extends BasePresenter
{

    /**
     * @inject
     * @var GalerieModel
     */
    public $galerieModel;

    protected function createComponentUploadPictureForm()
    {
        $form = (new Forms\UploadPictureForm())->create();

        $form->onSuccess[] = array($this, 'testFormSucceeded');

        return $form;
    }

    public function testFormSucceeded($form)
    {

        $values = $form->getValues();

        $this->galerieModel->insertPictures($values['pictures']);

        // nejake presmerovani, asi na seznam fotek, nebo tak neco
        $this->flashMessage("Fotky byly úspěšně nahrány.");
        $this->redirect('Fotogalerie:sprava');
    }

    public function createComponentChangeForm() {

        $form = (new Forms\ChangePictureForm())->create($this->galerieModel->getGalerie());

        $form->onSuccess[] = array($this, 'changeFormSucceeded');

        return $form;
    }

    public function changeFormSucceeded($form) {
        $values = $form->getValues();

        $this->galerieModel->changePictures($values);

        //foreach ($values as $value) {
        //    $this->flashMessage($value);
        //}

        $this->flashMessage("Změny byly provedeny");
        $this->redirect('Fotogalerie:sprava');
    }

    /**
     * render metoda pro sablonu testTemplate
     */
    public function renderAddPhoto() {
    }

    public function renderSprava() {
    }
}
