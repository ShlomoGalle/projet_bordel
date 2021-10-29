<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\Personnage;
Use App\Model\Traits\Personnage\Arme;
Use App\Model\Traits\Personnage\Armure;

class PersonnageJoueur extends Personnage{
    // Use trait : 
    // Inventaire
    Use Arme, Armure;

    //Endroit ou il se trouve
    // protected $map_actuelle;

    //Identité :
    protected $identite_race;
    // protected $identite_taille;
    // protected $identite_age;
    // protected $identite_poids;
    // protected $identite_cheveux;
    // protected $identite_yeux;
    // protected $identite_signeparticulier;
    // protected $identite_royaume;
    // protected $identite_pointsdepouvoir;
    // protected $identite_penalitedencombrement;

    // //Argent du joueur 
    // protected $money_flouze_biff = 20000;

    //Resistance du joueur
    protected $jr_essence_total = 0;
    protected $jr_theurgie_total = 0;
    protected $jr_poison_total = 0;
    protected $jr_maladie_total = 0;
        
    //Points de pouvoir
    protected $point_de_pouvoir_max = 0;
    protected $point_de_pouvoir_actuelle = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_identite_race()
    {
        return $this->identite_race;
    }

}