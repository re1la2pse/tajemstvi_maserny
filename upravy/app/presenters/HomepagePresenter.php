<?php

namespace App\Presenters;

use Nette;


class HomepagePresenter extends BasePresenter
{
    private $db;
    
    public function __construct(Nette\Database\Context $database)
    {
        $this->db = $database;
    }
    
    
    public function renderDefault()
    {
    }
}
