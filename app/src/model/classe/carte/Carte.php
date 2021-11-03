<?php

namespace App\Model\Classe\Carte;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Controllers\ConnexionBdd\Bdd;

class Carte extends Bdd {

    protected $carte_id;
    protected $carte_id_evenement; //array avec tout les evenements de la carte
    protected $carte_img; 
    protected $carte_type;
    protected $carte_coordonnée; // = [x => , y => ]
    protected $carte_accessible; //Bool pour savoir si c'est accessible

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