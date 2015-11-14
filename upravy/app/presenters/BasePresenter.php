<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    /** @var Nette\Http\Session */
    protected $session;
    
    protected function startup()
    {
        parent::startup();
        
        //kontrola přihlášení
	if (!$this->user->isLoggedIn())
        {
            $this->redirect('Sign:in');
        } 
        
    }
    
    public function __construct(Nette\Http\Session $session)
    {
        parent::__construct();
        $this->session = $session;
    }
    

}