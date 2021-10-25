<?php

namespace App\Model\Traits\Personnage\CreationPersonnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait DetailComp {

    // propriété : 
    //comp[degré,carac,innee,spécial,spécial2, experience_total, niveau]
    
    protected $comp_manoeuvreetmouvement_sansarmure;
    protected $comp_manoeuvreetmouvement_cuirsouple;
    protected $comp_manoeuvreetmouvement_cuirrigide;
    protected $comp_manoeuvreetmouvement_cottedemailles;
    protected $comp_manoeuvreetmouvement_plate;

    protected $comp_arme_tranchantunemain;
    protected $comp_arme_contondantunemain;
    protected $comp_arme_armedelance;
    protected $comp_arme_projectile;
    protected $comp_arme_armedhast;

    protected $comp_generale_escalade;
    protected $comp_generale_equitation;
    protected $comp_generale_natation;
    protected $comp_generale_pistage;

    protected $comp_subterfuge_embuscade;
    protected $comp_subterfuge_filatdissim;
    protected $comp_subterfuge_crochetage;
    protected $comp_subterfuge_desarmementdepiege;

    protected $comp_magie_lecturederune;
    protected $comp_magie_utilisationdobjet;
    protected $comp_magie_directiondesort;

    protected $comp_physique_developcorporel;
    protected $comp_physique_perception;


    public function __construct()
    {
    }



}