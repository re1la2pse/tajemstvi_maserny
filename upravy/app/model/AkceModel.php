<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 18:51
 */

namespace App\Model;

use Nette;
use App\Model\MyPurifier;
use Nette\Database\Table\Selection;


class AkceModel extends Nette\Object {

    private $db;
    private $purify;

    public function __construct(Nette\Database\Context $database)
    {
        $this->db = $database;
        $this->purify = new MyPurifier();
    }

    /**
     * vrátí akci podle ID
     * @param $id
     * @return mixed
     */
    public function getAkceId($id) {
        $akce = $this->db->table('akce')
            ->get($id);

        return $akce->toArray();
    }

    /**
     * Vrátí pole všech akcí
     * @return array
     */
    public function getAkcePole() {
        $akce = $this->db->table('akce');

        $akcePom = array();

        foreach ($akce as $pom) {
            $akcePom[$pom['id_akce']] = $pom['nazev'];
        }

        return $akcePom;
    }

    /**
     * Vloží akci do DB nebo aktualizuje stávající.
     * @param $values
     */
    public function insertAkce($values) {
        //osetri vstup
        $values['nazev'] = $this->purify->purify($values['nazev']);
        $values['popis'] = $this->purify->purify($values['popis']);
        $values['plati'] = $this->purify->purify($values['plati']);
        //aktualizace kategorie
        if ($values['id_akce']) {
            $this->db->table('akce')
                ->where('id_akce', $values['id_akce'])
                ->update(array(
                    'nazev' => $values['nazev'],
                    'popis' => $values['popis'],
                    'plati' => $values['plati'],
                ));

        }
        else {
            //ID v db
            if ($number = $this->db->table('akce')->max('id_akce'))
                $number += 1;
            else
                $number = 1;

            $this->db->table('akce')->insert(array(
                'id_akce' => $number,
                'nazev' => $values['nazev'],
                'popis' => $values['popis'],
                'plati' => $values['plati'],
            ));

        }
    }

    /**
     * Smaže akci.
     * @param $values
     */
    public function deleteAkce($values) {
        $this->db->table('akce')
            ->where('id_akce', $values['id_akce'])
            ->delete();
    }
}