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
    protected $nom;

    //Resistance Créature
    protected $jr_feu = 0;
    protected $jr_froid = 0;
    protected $jr_eau = 0;
    protected $jr_lumière = 0;
    protected $jr_obscurité = 0;

    public function __construct()
    {
        parent::__construct();

    }
    
    //SETTER ET GETTER
    //SETTER
    public function set_nom(string $val)
    {
        $this->nom = $val;
    }

    public function set_base_defensif(int $val)
    {
        $this->base_defensif = $val;
    }

    public function set_base_offensif(int $val)
    {
        $this->base_offensif = $val;
    }

    //GETTER   
    public function get_base_defensif()
    {
        return $this->base_defensif;
    }

    public function get_base_offensif()
    {
        return $this->base_offensif;
    }

}