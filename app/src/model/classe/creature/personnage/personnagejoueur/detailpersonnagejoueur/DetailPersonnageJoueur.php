<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\PersonnageJoueur;
Use App\Model\Traits\Personnage\CreationPersonnage\Langue;
Use App\Model\Traits\Personnage\CreationPersonnage\DetailComp;
Use App\Model\Traits\Personnage\CreationPersonnage\DetailCarac;


class DetailPersonnageJoueur extends PersonnageJoueur {
    Use Langue, DetailComp, DetailCarac;

    protected $chance_obtenir_liste_sort_pourcentage = 0; //Permet d'apprendre des nouvelles listes de sort a chaque niveau
    protected $nb_degres_langages_additionnel = 0; //Permet d'apprendre de nouveaux langages en plus des langages appris de base (raciaux)
    protected $nb_points_histor = 0; //Point d'historique, permet d'avoir des bonus/habilite special a la creation de personnage

    //Detail des jets de resistances
    protected $jr_essence = ['carac' => 0, 'special_1' => 0, 'raciale' => 0];
    protected $jr_theurgie = ['carac' => 0, 'special_1' => 0, 'raciale' => 0];
    protected $jr_poison = ['carac' => 0, 'special_1' => 0, 'raciale' => 0];
    protected $jr_maladie = ['carac' => 0, 'special_1' => 0, 'raciale' => 0];

    //Detail du bd et du bo (base defensif et base offensif)
    protected $base_offensif_detail = ['carac' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $base_defensif_detail = ['carac' => 0, 'special_1' => 0, 'special_2' => 0];


    public function __construct()
    {
        parent::__construct();
    }

    public function set_jr_carac()
    {
        $this->jr_essence['carac'] = $this->caracteristique_intelligence_total;
        $this->jr_theurgie['carac'] = $this->caracteristique_intuition_total;
        $this->jr_poison['carac'] = $this->caracteristique_constitution_total;
        $this->jr_maladie['carac'] = $this->caracteristique_constitution_total;
        $this->set_calcul_jr_total(); //Recalculer les jr totals grace au nouvelle jr en fonction des carac
    }

    public function set_calcul_jr_total()
    {
        $this->jr_essence_total =  $this->jr_essence['carac'] +  $this->jr_essence['special_1'] + $this->jr_essence['raciale'];
        $this->jr_theurgie_total = $this->jr_theurgie['carac'] +  $this->jr_theurgie['special_1'] + $this->jr_theurgie['raciale'];
        $this->jr_poison_total = $this->jr_poison['carac'] +  $this->jr_poison['special_1'] + $this->jr_poison['raciale'];
        $this->jr_maladie_total = $this->jr_maladie['carac'] +  $this->jr_maladie['special_1'] + $this->jr_maladie['raciale'];
    }

    public function set_bd_carac()
    {
        $this->base_defensif_detail['carac'] = $this->caracteristique_agilite_total;
        $this->set_base_defensif($this->base_defensif_detail['carac'] +  $this->base_defensif_detail['special_1'] + $this->base_defensif_detail['special_2']); //Recalculer la bd total en fonction des carac
    }

}