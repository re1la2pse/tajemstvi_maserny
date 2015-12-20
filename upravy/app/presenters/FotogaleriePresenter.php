<?php

namespace App\Presenters;

use Nette;
use Forms;
use App\Model\GalerieModel;
use Nette\Utils\Image;
use Tracy\Debugger;
use Tracy;

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

        $this->flashMessage("Změny byly provedeny");
        $this->redirect('Fotogalerie:galerieSortable');
    }

    /**
     * render metoda pro sablonu testTemplate
     */
    public function renderAddPhoto() {
    }

    public function renderSprava() {
        
        $this->template->style = "sprava_fotogalerie_style";
    }
    
    /**
     * Testovani razeni galerie
     * handler odchytava ajaxove volani
     */
    public function handleChangeOrder($list) {
        
        $this->galerieModel->changeOrder($list);
        
        //$this->flashMessage("Řazení uloženo");
        //$this->redirect('Fotogalerie:sortable');
    }
    
    /**
     *testovani razeni fotek v galerii
     */
    public function renderGalerieSortable() {
        
        $this->template->script = "galerieSortable";
        $this->template->style = "galerieSortable_style";
        
    }
}
