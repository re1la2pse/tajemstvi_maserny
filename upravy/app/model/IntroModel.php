<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 18:57
 */
namespace App\Model;

use Nette;

class IntroModel extends Nette\Object {

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
            if ($number = $this->db->table('intro')->max('id_intro'))
                $number += 1;
            else
                $number = 1;

            $fileName = $pc->getSanitizedName();

            $pripona = pathinfo($fileName, PATHINFO_EXTENSION);

            $smallPicture = $pc->toImage();
            $largePicture = $pc->toImage();

            $smallPicture->resize(240, 160);
            $largePicture->resize(1920, 1040);

            $smallPicture->save('../../media/img/intro/nahledy/' . $number . '.' . $pripona);
            $largePicture->save('../../media/img/intro/fotky/' . $number . '.' . $pripona);

            $this->db->table('intro')->insert(array(
                'id_intro' => $number,
                'miniatura' => "media/img/intro/nahledy/" . $number . '.' . $pripona,
                'plna' => "media/img/intro/fotky/" . $number . '.' . $pripona,
                'zobrazit' => '1'
            ));

        }
    }

    //nacte fotky z DB
    public function getGalerie() {
        return $this->db->table('intro')
            ->order('id_intro');
    }

    /**
     * Skryje/zobrazi nebo smaze fotky
     * @param $value
     */
    public function changePictures($values) {
        $pictures = $this->db->table('intro')
            ->order('id_intro');

        foreach ($pictures as $picture) {
            if ($values['smazat'.$picture['id_intro']] == '1') {
                unlink('../../'.$picture['miniatura']);
                unlink('../../'.$picture['plna']);
                $this->db->table('intro')
                    ->where('id_intro', $picture['id_intro'])
                    ->delete();
            }
            else {
                if ($values['zobrazit'.$picture['id_intro']] != $picture['zobrazit']) {
                    $this->db->table('intro')
                        ->where('id_intro', $picture['id_intro'])
                        ->update(array('zobrazit' => $values['zobrazit'.$picture['id_intro']]));
                }
            }
        }
    }
}