<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 12.11.2015
 * Time: 16:35
 */

namespace App\Model;

use Nette;


class MassagesModel extends Nette\Object {
    private $db;

    public function __construct(Nette\Database\Context $database)
    {
        $this->db = $database;
    }
    /**
     * @param $pictures
     */

//nacte masaze z DB
    public function getMassages() {
        return $this->db->table('masaze');
    }

    public function getKategorie() {
        return $this->db->table('kategorie_masazi');
    }

    public function getMassagesK($kategorie) {
        return $this->db->table('masaze')
            ->where('id_kategorie', $kategorie);
    }
}