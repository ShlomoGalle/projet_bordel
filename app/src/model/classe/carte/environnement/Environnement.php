<?php

namespace App\Model\Classe\Carte\Environnement;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controllers\ConnexionBdd\Bdd;

class Environnement extends Bdd {

    protected $environnement_id;
    protected $environnement_description; 
    protected $environnement_effet; // ex : +10
    protected $environnement_comp_effet; // ex : arme a deux main

    //Ou alors protected $environnement_effet = [comp => effet]

    public function __construct()
    {
        parent::__construct();

    }
    
    // //SETTER ET GETTER
    // //SETTER
    // public function set_base_defensif($val)
    // {
    //     $this->base_defensif = $val;
    // }

    // public function set_base_offensif($val)
    // {
    //     $this->base_offensif = $val;
    // }

    // // GETTER   
    // public function get_base_defensif()
    // {
    //     return $this->base_defensif;
    // }

    // public function get_base_offensif()
    // {
    //     return $this->base_offensif;
    // }

}