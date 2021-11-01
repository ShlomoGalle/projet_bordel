<?php

namespace App\Model\Traits\Personnage\CreationPersonnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait DetailCaract {

    // propriété : 
    //caracterisque[val,norme,race]

    protected $caracterisque_force;
    protected $caracteristique_agilite;
    protected $caracteristique_constitution;
    protected $caracteristique_intelligence;
    protected $caracteristique_presence;
    protected $caracteristique_apparence;


    public function __construct()
    {
    }

}
