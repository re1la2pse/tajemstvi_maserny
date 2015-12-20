<?php

namespace App\Model;

use Nette;
use Tracy\Debugger;
class GalerieModel extends Nette\Object
{
    private $db;

    public function __construct(Nette\Database\Context $database)
    {
        $this->db = $database;
    }

    /**
     * Vytvori miniaturu pro nahled a velkou fotku.
     * Obe dve ulozi a prida zaznam do databaze
     * @param $pictures
     */
    public function insertPictures($pictures)
    {
        foreach($pictures as $pc)
        {
            if ($number = $this->db->table('fotky')->max('id_fotky'))
                $number += 1;
            else
                $number = 1;

            $fileName = $pc->getSanitizedName();

            $pripona = pathinfo($fileName, PATHINFO_EXTENSION);

            $smallPicture = $pc->toImage();
            $largePicture = $pc->toImage();

            $smallPicture->resize(240, 160);
            $largePicture->resize(800, 800);

            $smallPicture->save('../../media/img/fotogalerie/nahledy/' . $number . '.' . $pripona);
            $largePicture->save('../../media/img/fotogalerie/fotky/' . $number . '.' . $pripona);

            $this->db->table('fotky')->insert(array(
                'id_fotky' => $number,
                'miniatura' => "media/img/fotogalerie/nahledy/" . $number . '.' . $pripona,
                'plna' => "media/img/fotogalerie/fotky/" . $number . '.' . $pripona,
                'zobrazit' => '1'
            ));

        }
    }

    //nacte fotky z DB
    public function getGalerie() {
        return $this->db->table('fotky')
            ->order('razeni');
    }

    /**
     * Skryje/zobrazi nebo smaze fotky
     * @param $value
     */
    public function changePictures($values) {
        $pictures = $this->db->table('fotky')
            ->order('id_fotky');

        foreach ($pictures as $picture) {
            if ($values['smazat'.$picture['id_fotky']] == '1') {
                unlink('../../'.$picture['miniatura']);
                unlink('../../'.$picture['plna']);
                $this->db->table('fotky')
                    ->where('id_fotky', $picture['id_fotky'])
                    ->delete();
            }
            else {
                if ($values['zobrazit'.$picture['id_fotky']] != $picture['zobrazit']) {
                    $this->db->table('fotky')
                        ->where('id_fotky', $picture['id_fotky'])
                        ->update(array('zobrazit' => $values['zobrazit'.$picture['id_fotky']]));
                }
            }
        }
    }
    
    /**
     * changeOrder
     * funkce pozmeni serazeni fotek
     * vyuziva jQuery sortable
     */
    public function changeOrder($newOrdering) {
        
        $newOrdering = explode(",", $newOrdering);
        Debugger::fireLog($newOrdering);
        
        $fotky = $this->db->query('SELECT id_fotky FROM fotky ORDER BY razeni')->fetchAll();
        
        $fotkyId = array();
        foreach($fotky as $fotka) {
            $fotkyId[] = $fotka->id_fotky;       
        }
        Debugger::fireLog($fotkyId);
        
        for($i=0; $i < count($newOrdering); $i++) {
            $this->db->query("UPDATE fotky SET razeni=? WHERE id_fotky=?", $i, $fotkyId[(int)$newOrdering[$i]]);
        }
        
        $fotky = $this->db->query('SELECT id_fotky FROM fotky ORDER BY razeni')->fetchAll();
        
        $fotkyId = array();
        foreach($fotky as $fotka) {
            $fotkyId[] = $fotka->id_fotky;       
        }
        
        Debugger::fireLog($fotkyId);
        
        
    }


}