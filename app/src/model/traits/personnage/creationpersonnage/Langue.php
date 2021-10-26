<?php

namespace App\Model\Traits\Personnage\CreationPersonnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Langue {

    // propriété : 
    protected $langue_Adûnaic  = 0;
    protected $langue_Apysaic  = 0;
    protected $langue_Atliduk  = 0;
    protected $langue_Haradaic  = 0;
    protected $langue_Khuzdul  = 0;
    protected $langue_Kuduk  = 0;
    protected $langue_Labba  = 0;
    protected $langue_Logathig  = 0;
    protected $langue_Nahaiduk  = 0;
    protected $langue_Noirparler  = 0;
    protected $langue_Orque  = 0;
    protected $langue_Pûkael  = 0;
    protected $langue_Quenya  = 0;
    protected $langue_Rohirric  = 0;
    protected $langue_Sindarin  = 0;
    protected $langue_Sylvain  = 0;
    protected $langue_Umitic  = 0;
    protected $langue_Varadja  = 0;
    protected $langue_Waildyth  = 0;
    protected $langue_Westron = 5; //(Langage commun)
    

    public function __construct()
    {
    }


}