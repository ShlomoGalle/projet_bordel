<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\Personnage;
Use App\Model\Traits\Personnage\Arme;
Use App\Model\Traits\Personnage\Armure;
Use App\Model\Traits\Personnage\Capacite;
Use App\Model\Classe\Factory\FactoryPersonnage;

class PersonnageJoueur extends Personnage{
    // Use trait : 
    // Inventaire
    Use Arme, Armure, Capacite;

    // Endroit ou il se trouve
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
    // protected $identite_penalitedencombrement = 0;

    // //Argent du joueur 
    protected $money_flouze_biff = 20000;

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

    public function set_point_de_pouvoir_max_carac()
    {
        if($this->get_caracteristique_intelligence('val') >= $this->get_caracteristique_intuition('val'))
        {
            $val = new FactoryPersonnage($this->caracteristique_intelligence_total);
            $this->set_point_de_pouvoir_max($val->switch_calcul_point_de_pouvoir($this->get_caracteristique_intelligence('val')) * $this->get_comp_magie_directiondesort_total('niveau'));
            $this->set_point_de_pouvoir_actuelle($this->point_de_pouvoir_max);
        }
        else
        {
            $val = new FactoryPersonnage($this->caracteristique_intuition_total);
            $this->set_point_de_pouvoir_max(($val->switch_calcul_point_de_pouvoir($this->get_caracteristique_intuition('val'))) * $this->get_comp_magie_directiondesort_total('niveau'));
            $this->set_point_de_pouvoir_actuelle($this->point_de_pouvoir_max);
        }  
    }

    //SETTER
    public function set_point_de_pouvoir_max(int $val)
    {
        $this->point_de_pouvoir_max = $val;
    }

    public function set_point_de_pouvoir_actuelle(int $val)
    {
        $this->point_de_pouvoir_actuelle = $val;
    }


    //GETTER
    public function get_identite_race()
    {
        return $this->identite_race;
    }
}