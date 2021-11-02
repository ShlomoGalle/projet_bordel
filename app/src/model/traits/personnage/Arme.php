<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Arme {

    // propriété : 
    protected $arme_nom;
    protected $arme_abreviation;
    protected $arme_cout;
    protected $arme_poids;
    //arme_type déjà dans - class créature
    
    protected $arme_statistique_maladresse;
    protected $arme_statistique_coupcritprimaire;
    protected $arme_statistique_coupcritsecondaire;
    protected $arme_statistique_modifspeciaux = 0;
    protected $arme_statistique_enchantement = 0;
    

    public function __construct()
    {
    }


}