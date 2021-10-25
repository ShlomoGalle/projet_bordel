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
    protected $map_actuelle;

    // Identité :
    protected $identite_race;
    protected $identite_taille;
    protected $identite_age;
    protected $identite_poids;
    protected $identite_cheveux;
    protected $identite_yeux;
    protected $identite_signeparticulier;
    protected $identite_royaume;
    protected $identite_pointsdepouvoir;
    protected $identite_penalitedencombrement;

    // Argent du joueur 
    protected $money_flouze_biff;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getsante()
    {
        return $this->sante;
    }

}