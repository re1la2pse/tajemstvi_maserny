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

class MassagesPresenter extends BasePresenter {

    /**
     * @inject
     * @var MassagesModel
     */
    public $massagesModel;

    //Sprava
    public function createComponentLoadMassagesForm() {

        $form = (new Forms\LoadMassagesForm())->create();

        $form->onSuccess[] = array($this, 'loadFormSucceeded');

        return $form;
    }

    public function loadFormSucceeded($form) {
        //$values = $form->getValues();

        $this->flashMessage("Masáže uloženy");
        $this->redirect('Massages:sprava');
    }

    //Uprava
    public function createComponentUpravaMassagesForm() {

        $form = (new Forms\UpravaMassagesForm())->create();

        $form->onSuccess[] = array($this, 'upravaFormSucceeded');

        return $form;
    }

    public function upravaFormSucceeded($form) {
        //$values = $form->getValues();

        $this->flashMessage("Masáž uložena");
        $this->redirect('Massages:sprava');
    }



    public function  renderUprava() {

    }

    public function renderSprava() {
        /*
        $kategorie = $this->massagesModel->getKategorie();

        $masaze = array(); //= new Nette\Utils\ArrayHash();

        foreach ($kategorie as $kat) {
            $m = array();
            $mas = $this->massagesModel->getMassagesK($kat['id_kategorie']);
            foreach ($mas as $ma) {
                $m[] = $ma['nazev'];
            }
            $masaze[] = array($kat['nazev'] => $m);
        }

        $this->template->kategorie = $masaze;
        */
    }

}