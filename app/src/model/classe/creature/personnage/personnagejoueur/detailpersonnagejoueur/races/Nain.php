<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


class Nain extends DetailPersonnageJoueur {

    public function __construct(string $race = 'Nain')
    {
        parent::__construct();

        //Type de creature = pj
        $this->type_creature = 1;
        
        //Identite
        $this->identite_race = $race;

        //Langue parler
        $this->langue_Khuzdul  = 5;
        $this->langue_Sindarin  = 3;
        $this->langue_Westron = 5; 

        //Valeur racial des caracteristiques
        $this->caracteristique_force['race'] = 5;
        $this->caracteristique_agilite['race'] = -5;
        $this->caracteristique_constitution['race'] = 15;
        $this->caracteristique_intuition['race'] = -5;
        $this->caracteristique_presence['race'] = -5;
        $this->set_calcul_caracteristique_total(); //On recalcule les caracteristiques totals en fct des vals racials

        //Resistance racial
        $this->jr_essence['raciale'] = 40; 
        $this->jr_poison['raciale'] = 10;        
        $this->jr_maladie['raciale'] = 10;
        $this->set_calcul_jr_total(); //Recalculer les jr totals grace au nouvelle jr en fonction de la race

        //Competences innees (a l'adolescence)
        $this->comp_manoeuvreetmouvement_sansarmure['innee'] = 5;
        $this->comp_manoeuvreetmouvement_cuirrigide['innee'] = 5;
        $this->comp_manoeuvreetmouvement_cottedemaille['innee'] = 15;
        $this->comp_manoeuvreetmouvement_sansarmure['degre'] = 0;
        $this->comp_manoeuvreetmouvement_cuirrigide['degre'] = 0;
        $this->comp_manoeuvreetmouvement_cottedemaille['degre'] = 0;

        $this->comp_arme_contondantunemain['innee'] = 20;
        $this->comp_arme_armedelance['innee'] = 5;
        $this->comp_arme_contondantunemain['degre'] = 0;
        $this->comp_arme_armedelance['degre'] = 0;

        $this->comp_generale_escalade['innee'] = 5;
        $this->comp_generale_escalade['degre'] = 0;

        $this->comp_subterfuge_crochetage['innee'] = 5;
        $this->comp_subterfuge_desarmementdepiege['innee'] = 5;
        $this->comp_subterfuge_crochetage['degre'] = 0;
        $this->comp_subterfuge_desarmementdepiege['degre'] = 0;

        $this->comp_physique_developcorporel['innee'] = 15;
        $this->comp_physique_perception['innee'] = 10;
        $this->comp_physique_developcorporel['degre'] = 0;
        $this->comp_physique_perception['degre'] = 0;
        $this->set_calcul_comp_total();

        //Autres
        $this->chance_obtenir_liste_sort_pourcentage = 3;
        $this->nb_degres_langages_additionnel = 4;
        $this->nb_points_histor = 4;

    }

}