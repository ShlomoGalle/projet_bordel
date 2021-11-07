<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Arme {

    // propriété : 
    protected $arme_nom  = NULL;
    protected $arme_abreviation  = NULL;
    protected $arme_prix = NULL;
    protected $arme_poids = NULL;
    //arme_type déjà dans - class créature
    
    protected $arme_statistique_maladresse = NULL;
    protected $arme_statistique_coupcritprimaire = NULL;
    protected $arme_statistique_coupcritsecondaire = NULL;
    protected $arme_statistique_modifspeciaux = 0;
    protected $arme_statistique_enchantement = 0;
    

    public function __construct()
    {
    }


}