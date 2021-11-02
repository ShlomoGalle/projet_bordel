<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Capacite {

    //Capacité
    protected $capacite_infravision = 0;
    protected $capacite_vision_nocturne = 0;
    // protected $compagnon = 0;
    

    public function __construct()
    {
    }


    //SETTER
    public function set_capacite_infravision(int $val)
    {
        $this->capacite_infravision = $val;
    }

    public function set_capacite_vision_nocturne(int $val)
    {
        $this->capacite_vision_nocturne = $val;
    }

    //GETTER
    public function get_capacite_infravision()
    {
        return $this->capacite_infravision;
    }

    public function get_capacite_vision_nocturne()
    {
        return $this->capacite_vision_nocturne;
    }
}