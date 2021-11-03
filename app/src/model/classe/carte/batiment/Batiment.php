<?php

namespace App\Model\Classe\Carte\Batiment;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controllers\ConnexionBdd\Bdd;

class Batiment extends Bdd {

    protected $batiment_id;
    protected $batiment_type; 
    protected $batiment_prix;
    protected $batiment_propriétaire;

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