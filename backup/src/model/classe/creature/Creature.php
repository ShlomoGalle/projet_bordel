<?php

namespace App\Model\Classe\Creature;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controllers\ConnexionBdd\Bdd;

class Creature extends Bdd {

    protected $sante; //test


    protected $point_de_vie;
    protected $base_defensif;
    protected $base_offensif;
    protected $type_armure;
    protected $type_arme;
    protected $type_creature; //1 pj, 2 monstre&animaux, 3pnj
    protected $nom;

    public function __construct(int $sante = 81)
    {
        parent::__construct();
        $this->sante = $sante;
    }

    public function getsante()
    {
        $sql = "SELECT * FROM test WHERE id = '1'";
        // $result1 = $this->bdd->query($sql);
        // $row = $result1->fetch_assoc();

        $row = $this->select($sql);

        foreach($row as $key => $value)
        {
            $row_final = $row[$key]['name'];
        }

        return $row;
    }

}