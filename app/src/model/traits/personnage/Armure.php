<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Armure {

    // propriété : 
    protected $armure_nom;
    protected $armure_cout;
    protected $armure_poids;
    //armure_type déjà dans - class créature
    
    protected $armure_bouclier_type;
    protected $armure_jambiere_type;
    protected $armure_brassiere_type;
    protected $armure_casque_type;

    public function __construct()
    {
    }


}