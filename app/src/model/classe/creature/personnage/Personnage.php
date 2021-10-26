<?php

namespace App\Model\Classe\Creature\Personnage;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Creature;

class Personnage extends Creature {

    //Caractéristique :
    protected $caracteristique_force_total;
    protected $caracteristique_agilite_total;
    protected $caracteristique_constitution_total;
    protected $caracteristique_intelligence_total;
    protected $caracteristique_intuition_total;
    protected $caracteristique_presence_total;

    //Compétence :
    protected $comp_manoeuvreetmouvement_sansarmure_total;
    protected $comp_manoeuvreetmouvement_cuirsouple_total;
    protected $comp_manoeuvreetmouvement_cuirrigide_total;
    protected $comp_manoeuvreetmouvement_cottedemaille_total;
    protected $comp_manoeuvreetmouvement_plate_total;

    protected $comp_arme_tranchantunemain_total;
    protected $comp_arme_contondantunemain_total;
    protected $comp_arme_deuxmains_total;
    protected $comp_arme_armedelance_total;
    protected $comp_arme_projectile_total;
    protected $comp_arme_armedhast_total;

    protected $comp_generale_escalade_total;
    protected $comp_generale_equitation_total;
    protected $comp_generale_natation_total;
    protected $comp_generale_pistage_total;

    protected $comp_subterfuge_embuscade_total;
    protected $comp_subterfuge_filatdissim_total;
    protected $comp_subterfuge_crochetage_total;
    protected $comp_subterfuge_desarmementdepiege_total;

    protected $comp_magie_lecturederune_total;
    protected $comp_magie_utilisationdobjet_total;
    protected $comp_magie_directiondesort_total;
    
    protected $comp_physique_developcorporel_total;
    protected $comp_physique_perception_total;

    public function __construct()
    {
        parent::__construct();
    }
}