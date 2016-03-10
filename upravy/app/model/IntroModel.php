<?php
/**
 * Created by PhpStorm.
 * User: Jencicek
 * Date: 15.12.2015
 * Time: 18:57
 */
namespace App\Model;

use Nette;
use Tracy\Debugger;
use Tracy;

class IntroModel extends Nette\Object {

    private $db;
    private $purify;

    public function __construct(Nette\Database\Context $database)
    {
        $this->db = $database;
        $this->purify = new MyPurifier();
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
    /**
     * Vlozi nebo edituje novinku
     */
    public function insertNovinka($values) {
        //osetri vstup
        $values['popis'] = $this->purify->purify($values['popis']);
        //update masaze
        if ($values['id_novinky']) {
            //obrazek je
            if ($values['picture'] != '') {
                //smaze puvodni obrazek, protoze se neprepise obrazek s jinou priponou


                $news = $this->db->table('novinky')->where('id_novinky', $values['id_novinky'])->fetch();

                //Debugger::fireLog( $news);

                $novinka = array();
                    $novinka['id_novinky'] = $news->id_novinky;
                    $novinka['popis'] = $news->popis;
                    $novinka['id_masaze'] = $news->id_masaze;
                    $novinka['obrazek'] = $news->obrazek;

                if ($novinka['obrazek'] != 'NULL')
                    unlink('../../' . $novinka['obrazek']);
                //
                $fileName = $values['picture']->getSanitizedName();
                $pripona = pathinfo($fileName, PATHINFO_EXTENSION);
                $Picture = $values['picture']->toImage();
                $Picture->save('../../media/img/aktuality/' . $values['id_novinky'] . '.' . $pripona);
                //vlozeni do DB
                $this->db->table('novinky')
                    ->where('id_novinky', $values['id_novinky'])
                    ->update(array(
                        'popis' => $values['popis'],
                        'id_masaze' => $values['id_masaze'],
                        'obrazek' => "media/img/aktuality/" . $values['id_novinky'] . '.' . $pripona,
                    ));
            }
            else {
                //vlozeni do DB
                $this->db->table('novinky')
                    ->where('id_novinky', $values['id_novinky'])
                    ->update(array(
                        'popis' => $values['popis'],
                        'id_masaze' => $values['id_masaze'],
                    ));
            }
        }
        //nova masaz
        else {
            //ID do DB
            if ($number = $this->db->table('novinky')->max('id_novinky'))
                $number += 1;
            else
                $number = 1;

            if ($values['picture'] != '') {
                //je obrazek
                $fileName = $values['picture']->getSanitizedName();
                $pripona = pathinfo($fileName, PATHINFO_EXTENSION);
                $Picture = $values['picture']->toImage();
                $Picture->save('../../media/img/aktuality/' . $number . '.' . $pripona);
                //vlozeni do DB
                $this->db->table('novinky')->insert(array(
                    'id_novinky' => $number,
                    'popis' => $values['popis'],
                    'obrazek' => "media/img/aktuality/" . $number . '.' . $pripona,
                    'id_masaze' => $values['id_masaze'],
                ));
            }
            else {
                //neni obrazek
                //vlozeni do DB
                $this->db->table('novinky')->insert(array(
                    'id_novinky' => $number,
                    'popis' => $values['popis'],
                    'obrazek' => 'NULL',
                    'id_masaze' => $values['id_masaze'],
                ));
            }
        }
    }
    /**
     * Smaze novinku
     */
    public function deleteNovinka($values) {
        $novinka = $this->db->table('novinky')->get($values['id_novinky']);
        $novinka = $novinka->toArray();

        if ($novinka['obrazek'] != 'NULL') {
            unlink('../../' . $novinka['obrazek']);
        }
        $this->db->table('novinky')
            ->where('id_novinky', $values['id_novinky'])
            ->delete();
    }
    /**
     * Nacte masaze
     */
    public function getMassages() {
        return $this->db->table('masaze');
    }
    public  function getMassagesPole() {

        $massages = $this->getMassages();

        $mas = array();
        $mas[-1] = "Žádná";

        foreach ($massages as $m) {
            $mas[$m['id_masaze']] = $m['nazev'];
        }

        return $mas;
    }
    /**
     * Nacte novinky
     */
    public function getNovinky() {
        $novinkyDB = $this->db->table('novinky');

        $novinky = array();
        $nechcu = array('<p>', '</p>');
        $chcu = array('','');

        foreach($novinkyDB as $novinka) {
            $novinky[$novinka['id_novinky']] = str_replace($nechcu, $chcu, $novinka['popis']);
        }

        return $novinky;
    }
//nacte novinku z DB dle ID
    public function getNovinku($id) {

        $novinky = $this->db->table('novinky')
            ->where('id_novinky', $id);
        $pom = array();

        foreach ($novinky as $novinka) {
            $pom['id_novinky'] = $novinka['id_novinky'];
            $pom['popis'] = $novinka['popis'];
            $pom['id_masaze'] = $novinka['id_masaze'];
        }

        return $pom;
    }
}