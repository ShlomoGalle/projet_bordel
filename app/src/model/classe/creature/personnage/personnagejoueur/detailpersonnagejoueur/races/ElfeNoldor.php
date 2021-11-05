<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


class ElfeNoldor extends DetailPersonnageJoueur {


    public function __construct(string $race = 'Elfe Noldor')
    {
        parent::__construct();

        //Type de creature = pj
        $this->type_creature = 1;

        //Identite
        $this->identite_race = $race;

        //Langue parler
        $this->langue_Adunaic = 3;
        $this->langue_Quenya = 5;
        $this->langue_Sindarin = 5;

        //Valeur racial des caracteristiques
        $this->caracteristique_agilite['race'] = 15;
        $this->caracteristique_constitution['race'] = 10;
        $this->caracteristique_intelligence['race'] = 5;
        $this->caracteristique_intuition['race'] = 5;
        $this->caracteristique_presence['race'] = 15;
        $this->set_calcul_caracteristique_total(); //On recalcule les caracteristiques totals en fct des vals racials
        
        
        //Resistance racial       
        $this->jr_poison['raciale'] = 10;        
        $this->jr_maladie['raciale'] = 100;
        $this->set_calcul_jr_total(); //Recalculer les jr totals grace au nouvelle jr en fonction de la race

        //Competences innees (a l'adolescence)
        $this->comp_manoeuvreetmouvement_sansarmure['innee'] = 5;
        $this->comp_manoeuvreetmouvement_sansarmure['degre'] = 0;

        $this->comp_arme_tranchantunemain['innee'] = 5;
        $this->comp_arme_tranchantunemain['degre'] = 0;
        $this->comp_arme_projectile['innee'] = 5;
        $this->comp_arme_projectile['degre'] = 0;

        $this->comp_generale_equitation['innee'] = 5;
        $this->comp_generale_equitation['degre'] = 0;
        $this->comp_generale_natation['innee'] = 10;
        $this->comp_generale_natation['degre'] = 0;
        $this->comp_generale_pistage['innee'] = 5;
        $this->comp_generale_pistage['degre'] = 0;

        $this->comp_subterfuge_filatdissim['innee'] = 10;
        $this->comp_subterfuge_filatdissim['degre'] = 0;

        $this->comp_magie_lecturederune['innee'] = 10;
        $this->comp_magie_lecturederune['degre'] = 0;
        $this->comp_magie_utilisationdobjet['innee'] = 5;
        $this->comp_magie_utilisationdobjet['degre'] = 0;
        
        $this->comp_physique_developcorporel['innee'] = 5;
        $this->comp_physique_developcorporel['degre'] = 0;
        $this->comp_physique_perception['innee'] = 15;
        $this->comp_physique_perception['degre'] = 0;
        $this->set_calcul_comp_total();

        //Autres
        $this->chance_obtenir_liste_sort_pourcentage = 280;
        $this->nb_degres_langages_additionnel = 0;
        $this->nb_points_histor = 0;
    }

}