<?php

namespace App\Presenters;

use Nette,
	App\Model;

use Forms;
        
/**
 * Sign in/out presenter.
 * Nemuze dedit od BasePresenter, kvuli kontrole prihlaseni
 */
class SignPresenter extends Nette\Application\UI\Presenter
{
    
    protected function createComponentSignInForm()
    {
        $form = (new Forms\SignForm())->create();

        $form->onSuccess[] = array($this, 'signInFormSucceeded');

        return $form;
    }
    
    public function signInFormSucceeded($form, $values)
    {
	if ($values->remember) {
            $this->getUser()->setExpiration('14 days', FALSE);
	} else {
            $this->getUser()->setExpiration('20 minutes', TRUE);
	}

	try {
            $this->getUser()->login($values->username, $values->password);
            $this->flashMessage('Přihlašen: ' . $values->username);
            $this->redirect('Homepage:');

	} catch (Nette\Security\AuthenticationException $e) {
            $form->addError($e->getMessage());
	}
    }

    
    public function renderIn()
    {
        
    }
    
    public function actionOut()
    {
	$this->getUser()->logout();
	$this->flashMessage('Byli jste odhlášeni.');
	$this->redirect('Homepage:default');
    }
}