<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Capacite {

    //Capacité
    protected $infravision = 0;
    protected $vision_nocturne = 0;
    // protected $compagnon = 0;
    

    public function __construct()
    {
    }


    //SETTER
    public function set_infravision(int $val)
    {
        $this->infravision = $val;
    }

    public function set_vision_nocturne(int $val)
    {
        $this->vision_nocturne = $val;
    }
}