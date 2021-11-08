<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Accessoire {

    // propriété : 
    //armure_type déjà dans - class créature
    
    protected $accessoire_bague = NULL;
    protected $accessoire_bracelet = NULL;
    protected $accessoire_collier = NULL;

    protected $accessoire_bague_comp = NULL;
    protected $accessoire_bague_val = 0;
    
    protected $accessoire_bracelet_comp = NULL;
    protected $accessoire_bracelet_val = 0;
    
    protected $accessoire_collier_comp = NULL;
    protected $accessoire_collier_val = 0;

    public function __construct()
    {
    }


}