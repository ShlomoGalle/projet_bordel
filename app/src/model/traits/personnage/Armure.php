<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Armure {

    // propriété : 
    protected $armure_nom  = NULL;
    protected $armure_prix  = NULL;
    protected $armure_poids  = NULL;
    //armure_type déjà dans - class créature
    
    protected $armure_bouclier_type = NULL;
    protected $armure_jambiere_type  = NULL;
    protected $armure_brassiere_type  = NULL;
    protected $armure_casque_type  = NULL;

    public function __construct()
    {
    }


}