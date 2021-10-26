<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


class Race extends DetailPersonnageJoueur {


    public function __construct(string $race = 'Race')
    {
        parent::__construct();

        //Type de creature = pj
        $this->type_creature = 1;
        
        //Identite
        $this->identite_race = $race;

        //Langue parler
        $this->langue_Adûnaic  = 0;
        $this->langue_Apysaic  = 0;
        $this->langue_Atliduk  = 0;
        $this->langue_Haradaic  = 0;
        $this->langue_Khuzdul  = 0;
        $this->langue_Kuduk  = 0;
        $this->langue_Labba  = 0;
        $this->langue_Logathig  = 0;
        $this->langue_Nahaiduk  = 0;
        $this->langue_Noirparler  = 0;
        $this->langue_Orque  = 0;
        $this->langue_Pûkael  = 0;
        $this->langue_Quenya  = 0;
        $this->langue_Rohirric  = 0;
        $this->langue_Sindarin  = 0;
        $this->langue_Sylvain  = 0;
        $this->langue_Umitic  = 0;
        $this->langue_Varadja  = 0;
        $this->langue_Waildyth  = 0;
        $this->langue_Westron = 5; 

        //Valeur racial des caracteristiques
        $this->caracteristique_force['race'] = 0;
        $this->caracteristique_agilite['race'] = 0;
        $this->caracteristique_constitution['race'] = 0;
        $this->caracteristique_intelligence['race'] = 0;
        $this->caracteristique_intuition['race'] = 0;
        $this->caracteristique_presence['race'] = 0;
        $this->set_calcul_caracteristique_total(); //On recalcule les caracteristiques totals en fct des vals racials

        //Resistance racial
        $this->jr_essence_total['raciale'] = 0;        
        $this->jr_theurgie_total['raciale'] = 0;        
        $this->jr_poison_total['raciale'] = 0;        
        $this->jr_maladie_total['raciale'] = 0;
        $this->set_calcul_jr_total(); //Recalculer les jr totals grace au nouvelle jr en fonction de la race

        //Competences innees (a l'adolescence)
        $this->comp_manoeuvreetmouvement_sansarmure['innee'] = 0;
        $this->comp_manoeuvreetmouvement_cuirsouple['innee'] = 0;
        $this->comp_manoeuvreetmouvement_cuirrigide['innee'] = 0;
        $this->comp_manoeuvreetmouvement_cottedemaille['innee'] = 0;

        $this->comp_arme_tranchantunemain['innee'] = 0;
        $this->comp_arme_contondantunemain['innee'] = 0;
        $this->comp_arme_deuxmains['innee'] = 0;
        $this->comp_arme_armedelance['innee'] = 0;
        $this->comp_arme_projectile['innee'] = 0;
        $this->comp_arme_armedhast['innee'] = 0;

        $this->comp_generale_escalade['innee'] = 0;
        $this->comp_generale_equitation['innee'] = 0;
        $this->comp_generale_natation['innee'] = 0;
        $this->comp_generale_pistage['innee'] = 0;

        $this->comp_subterfuge_embuscade['innee'] = 0;
        $this->comp_subterfuge_filatdissim['innee'] = 0;
        $this->comp_subterfuge_crochetage['innee'] = 0;
        $this->comp_subterfuge_desarmementdepiege['innee'] = 0;

        $this->comp_magie_lecturederune['innee'] = 0;
        $this->comp_magie_utilisationdobjet['innee'] = 0;
        $this->comp_magie_directiondesort['innee'] = 0;

        $this->comp_physique_developcorporel['innee'] = 0;
        $this->comp_physique_perception['innee'] = 0;
        //Competences innees (a l'adolescence) Pour chaque competence innee qu'il a, (ou il a un degre de maitrise), il faut initialisé 
        //le bonus de degre a zero pour lui retirer le malus de -25 (si il a un talent innee c'est logique qu'il n'est pas de -25)
        $this->comp_manoeuvreetmouvement_sansarmure['degre'] = 0;
        $this->comp_manoeuvreetmouvement_cuirsouple['degre'] = 0;
        $this->comp_manoeuvreetmouvement_cuirrigide['degre'] = 0;
        $this->comp_manoeuvreetmouvement_cottedemaille['degre'] = 0;

        $this->comp_arme_tranchantunemain['degre'] = 0;
        $this->comp_arme_contondantunemain['degre'] = 0;
        $this->comp_arme_deuxmains['degre'] = 0;
        $this->comp_arme_armedelance['degre'] = 0;
        $this->comp_arme_projectile['degre'] = 0;
        $this->comp_arme_armedhast['degre'] = 0;

        $this->comp_generale_escalade['degre'] = 0;
        $this->comp_generale_equitation['degre'] = 0;
        $this->comp_generale_natation['degre'] = 0;
        $this->comp_generale_pistage['degre'] = 0;

        $this->comp_subterfuge_embuscade['degre'] = 0;
        $this->comp_subterfuge_filatdissim['degre'] = 0;
        $this->comp_subterfuge_crochetage['degre'] = 0;
        $this->comp_subterfuge_desarmementdepiege['degre'] = 0;

        $this->comp_magie_lecturederune['degre'] = 0;
        $this->comp_magie_utilisationdobjet['degre'] = 0;
        $this->comp_magie_directiondesort['degre'] = 0;

        $this->comp_physique_developcorporel['degre'] = 0;
        $this->comp_physique_perception['degre'] = 0;
        $this->set_calcul_comp_total();

        //Autres
        $this->chance_obtenir_liste_sort_pourcentage = 0;
        $this->nb_degres_langages_additionnel = 0;
        $this->nb_points_histor = 0;

    }

}