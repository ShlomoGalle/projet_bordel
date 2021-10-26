<?php

namespace App\Model\Classe\Creature;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controllers\ConnexionBdd\Bdd;

class Creature extends Bdd {

    protected $point_de_vie = 0;
    protected $point_de_vie_max = 5;
    protected $base_defensif = 0;
    protected $base_offensif = 0;
    protected $type_armure = 0;
    protected $type_arme = 0;
    protected $type_creature = 0; //1 pj, 2 monstre&animaux, 3pnj
    protected $nom = 0;

    public function __construct()
    {
        parent::__construct();

    }
    
    public function set_base_defensif($val)
    {
        $this->base_defensif = $val;
    }

}