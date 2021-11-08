<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\PersonnageJoueur;
Use App\Model\Traits\Personnage\CreationPersonnage\DetailComp;
Use App\Model\Traits\Personnage\CreationPersonnage\DetailCarac;
Use App\Model\Classe\Factory\FactoryPersonnage;


class DetailPersonnageJoueur extends PersonnageJoueur {
    Use DetailComp, DetailCarac;

    protected $chance_obtenir_liste_sort_pourcentage = 0; //Permet d'apprendre des nouvelles listes de sort a chaque niveau
    protected $nb_degres_langages_additionnel = 0; //Permet d'apprendre de nouveaux langages en plus des langages appris de base (raciaux)
    protected $nb_points_histor = 0; //Point d'historique, permet d'avoir des bonus/habilite special a la creation de personnage

    //Detail des jets de resistances
    protected $jr_essence = ['carac' => 0, 'special_1' => 0, 'raciale' => 0];
    protected $jr_theurgie = ['carac' => 0, 'special_1' => 0, 'raciale' => 0];
    protected $jr_poison = ['carac' => 0, 'special_1' => 0, 'raciale' => 0];
    protected $jr_maladie = ['carac' => 0, 'special_1' => 0, 'raciale' => 0];

    //Detail du bd et du bo (base defensif et base offensif)
    protected $base_defensif_detail = ['carac' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $base_offensif_detail = ['special_1' => 0, 'special_2' => 0];


    public function __construct()
    {
        parent::__construct();
    }

    //SETTER
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
    
    public function set_bo_carac()
    {
        $this->set_base_offensif($this->base_offensif_detail['special_1'] + $this->base_offensif_detail['special_2']); //Recalculer la bd total en fonction des carac
    }

    public function set_bd_detail(int $val, string $key){
        $this->base_defensif_detail[$key] = $val;
        $this->set_bd_carac();
    }

    public function set_bo_detail(int $val, string $key){
        $this->base_offensif_detail[$key] = $val;
        $this->set_bo_carac();
    }

    public function set_chance_obtenir_liste_sort_pourcentage(int $val){
        $this->chance_obtenir_liste_sort_pourcentage = $this->get_chance_obtenir_liste_sort_pourcentage() + $val;
    }

    public function set_jr_essence(int $val, string $key){
        $this->jr_essence[$key] = $this->get_jr_essence($key) + $val;
        $this->set_calcul_jr_total();
    }

    public function set_jr_theurgie(int $val, string $key){
        $this->jr_theurgie[$key] = $this->get_jr_theurgie($key) + $val;
        $this->set_calcul_jr_total();
    }

    public function set_jr_poison(int $val, string $key){
        $this->jr_poison[$key] = $this->get_jr_poison($key) + $val;
        $this->set_calcul_jr_total();
    }

    public function set_jr_maladie(int $val, string $key){
        $this->jr_maladie[$key] = $this->get_jr_maladie($key) + $val;
        $this->set_calcul_jr_total();
    }

    //GETTER
    public function get_chance_obtenir_liste_sort_pourcentage(){
        return $this->chance_obtenir_liste_sort_pourcentage;
    }
    public function get_nb_degres_langages_additionnel(){
        return $this->nb_degres_langages_additionnel;
    }
    public function get_nb_points_histor(){
        return $this->nb_points_histor;
    }
    
    public function get_jr_essence($key){
        return $this->jr_essence[$key];
    }
    
    public function get_jr_theurgie($key){
        return $this->jr_theurgie[$key];
    }

    public function get_jr_poison($key){
        return $this->jr_poison[$key];
    }

    public function get_jr_maladie($key){
        return $this->jr_maladie[$key];
    }


    //BDD
    //INSERT
    public function insert_detail_personnage_carac() 
    {
        $carac['id_personnage'] = $this->id;
        $carac['caracteristique_force_val'] = $this->caracteristique_force['val'];
        $carac['caracteristique_force_norm'] = $this->caracteristique_force['norm'];
        $carac['caracteristique_force_race'] = $this->caracteristique_force['race'];
        $carac['caracteristique_agilite_val'] = $this->caracteristique_agilite['val'];
        $carac['caracteristique_agilite_norm'] = $this->caracteristique_agilite['norm'];
        $carac['caracteristique_agilite_race'] = $this->caracteristique_agilite['race'];
        $carac['caracteristique_constitution_val'] = $this->caracteristique_constitution['val'];
        $carac['caracteristique_constitution_norm'] = $this->caracteristique_constitution['norm'];
        $carac['caracteristique_constitution_race'] = $this->caracteristique_constitution['race'];
        $carac['caracteristique_intelligence_val'] = $this->caracteristique_intelligence['val'];
        $carac['caracteristique_intelligence_norm'] = $this->caracteristique_intelligence['norm'];
        $carac['caracteristique_intelligence_race'] = $this->caracteristique_intelligence['race'];
        $carac['caracteristique_intuition_val'] = $this->caracteristique_intuition['val'];
        $carac['caracteristique_intuition_norm'] = $this->caracteristique_intuition['norm'];
        $carac['caracteristique_intuition_race'] = $this->caracteristique_intuition['race'];
        $carac['caracteristique_presence_val'] = $this->caracteristique_presence['val'];
        $carac['caracteristique_presence_norm'] = $this->caracteristique_presence['norm'];
        $carac['caracteristique_presence_race'] = $this->caracteristique_presence['race'];

        $this->insert_since_array("detail_personnage_caracteristique", $carac);
    }

    public function insert_detail_personnage_jr_bd_bo() 
    {
        $jr['id_personnage'] = $this->id;
        $jr['jr_essence_carac'] = $this->jr_essence['carac'];
        $jr['jr_essence_special_1'] = $this->jr_essence['special_1'];
        $jr['jr_essence_raciale'] = $this->jr_essence['raciale'];
        $jr['jr_theurgie_carac'] = $this->jr_theurgie['carac'];
        $jr['jr_theurgie_special_1'] = $this->jr_theurgie['special_1'];
        $jr['jr_theurgie_raciale'] = $this->jr_theurgie['raciale'];
        $jr['jr_poison_carac'] = $this->jr_poison['carac'];
        $jr['jr_poison_special_1'] = $this->jr_poison['special_1'];
        $jr['jr_poison_raciale'] = $this->jr_poison['raciale'];
        $jr['jr_maladie_carac'] = $this->jr_maladie['carac'];
        $jr['jr_maladie_special_1'] = $this->jr_maladie['special_1'];
        $jr['jr_maladie_raciale'] = $this->jr_maladie['raciale'];

        $jr['base_defensif_detail_carac'] = $this->base_defensif_detail['carac'];
        $jr['base_defensif_detail_special_1'] = $this->base_defensif_detail['special_1'];
        $jr['base_defensif_detail_special_2'] = $this->base_defensif_detail['special_2'];
        $jr['base_offensif_detail_special_1'] = $this->base_offensif_detail['special_1'];
        $jr['base_offensif_detail_special_2'] = $this->base_offensif_detail['special_2'];

        $this->insert_since_array("detail_personnage_jr_bd_bo", $jr);
    }

    public function insert_detail_personnage_autre() 
    {
        $autre['id_personnage'] = $this->id;
        $autre['chance_obtenir_liste_sort_pourcentage'] = $this->chance_obtenir_liste_sort_pourcentage;
        $autre['nb_degres_langages_additionnel'] = $this->nb_degres_langages_additionnel;
        $autre['nb_points_histor'] = $this->nb_points_histor;

        $this->insert_since_array("detail_personnage_autre", $autre);
    }

    public function insert_detail_personnage_comp() 
    {
        $comp['id_personnage'] = $this->id;
        $comp['comp_manoeuvreetmouvement_sansarmure_degre'] = $this->comp_manoeuvreetmouvement_sansarmure['degre'];
        $comp['comp_manoeuvreetmouvement_sansarmure_carac'] = $this->comp_manoeuvreetmouvement_sansarmure['carac'];
        $comp['comp_manoeuvreetmouvement_sansarmure_innee'] = $this->comp_manoeuvreetmouvement_sansarmure['innee'];
        $comp['comp_manoeuvreetmouvement_sansarmure_special_1'] = $this->comp_manoeuvreetmouvement_sansarmure['special_1'];
        $comp['comp_manoeuvreetmouvement_sansarmure_special_2'] = $this->comp_manoeuvreetmouvement_sansarmure['special_2'];
        $comp['comp_manoeuvreetmouvement_cuirsouple_degre'] = $this->comp_manoeuvreetmouvement_cuirsouple['degre'];
        $comp['comp_manoeuvreetmouvement_cuirsouple_carac'] = $this->comp_manoeuvreetmouvement_cuirsouple['carac'];
        $comp['comp_manoeuvreetmouvement_cuirsouple_innee'] = $this->comp_manoeuvreetmouvement_cuirsouple['innee'];
        $comp['comp_manoeuvreetmouvement_cuirsouple_special_1'] = $this->comp_manoeuvreetmouvement_cuirsouple['special_1'];
        $comp['comp_manoeuvreetmouvement_cuirsouple_special_2'] = $this->comp_manoeuvreetmouvement_cuirsouple['special_2'];
        $comp['comp_manoeuvreetmouvement_cuirrigide_degre'] = $this->comp_manoeuvreetmouvement_cuirrigide['degre'];
        $comp['comp_manoeuvreetmouvement_cuirrigide_carac'] = $this->comp_manoeuvreetmouvement_cuirrigide['carac'];
        $comp['comp_manoeuvreetmouvement_cuirrigide_innee'] = $this->comp_manoeuvreetmouvement_cuirrigide['innee'];
        $comp['comp_manoeuvreetmouvement_cuirrigide_special_1'] = $this->comp_manoeuvreetmouvement_cuirrigide['special_1'];
        $comp['comp_manoeuvreetmouvement_cuirrigide_special_2'] = $this->comp_manoeuvreetmouvement_cuirrigide['special_2'];
        $comp['comp_manoeuvreetmouvement_cottedemaille_degre'] = $this->comp_manoeuvreetmouvement_cottedemaille['degre'];
        $comp['comp_manoeuvreetmouvement_cottedemaille_carac'] = $this->comp_manoeuvreetmouvement_cottedemaille['carac'];
        $comp['comp_manoeuvreetmouvement_cottedemaille_innee'] = $this->comp_manoeuvreetmouvement_cottedemaille['innee'];
        $comp['comp_manoeuvreetmouvement_cottedemaille_special_1'] = $this->comp_manoeuvreetmouvement_cottedemaille['special_1'];
        $comp['comp_manoeuvreetmouvement_cottedemaille_special_2'] = $this->comp_manoeuvreetmouvement_cottedemaille['special_2'];
        $comp['comp_manoeuvreetmouvement_plate_degre'] = $this->comp_manoeuvreetmouvement_plate['degre'];
        $comp['comp_manoeuvreetmouvement_plate_carac'] = $this->comp_manoeuvreetmouvement_plate['carac'];
        $comp['comp_manoeuvreetmouvement_plate_innee'] = $this->comp_manoeuvreetmouvement_plate['innee'];
        $comp['comp_manoeuvreetmouvement_plate_special_1'] = $this->comp_manoeuvreetmouvement_plate['special_1'];
        $comp['comp_manoeuvreetmouvement_plate_special_2'] = $this->comp_manoeuvreetmouvement_plate['special_2'];
        $comp['comp_arme_tranchantunemain_degre'] = $this->comp_arme_tranchantunemain['degre'];
        $comp['comp_arme_tranchantunemain_carac'] = $this->comp_arme_tranchantunemain['carac'];
        $comp['comp_arme_tranchantunemain_innee'] = $this->comp_arme_tranchantunemain['innee'];
        $comp['comp_arme_tranchantunemain_special_1'] = $this->comp_arme_tranchantunemain['special_1'];
        $comp['comp_arme_tranchantunemain_special_2'] = $this->comp_arme_tranchantunemain['special_2'];
        $comp['comp_arme_contondantunemain_degre'] = $this->comp_arme_contondantunemain['degre'];
        $comp['comp_arme_contondantunemain_carac'] = $this->comp_arme_contondantunemain['carac'];
        $comp['comp_arme_contondantunemain_innee'] = $this->comp_arme_contondantunemain['innee'];
        $comp['comp_arme_contondantunemain_special_1'] = $this->comp_arme_contondantunemain['special_1'];
        $comp['comp_arme_contondantunemain_special_2'] = $this->comp_arme_contondantunemain['special_2'];
        $comp['comp_arme_deuxmains_degre'] = $this->comp_arme_deuxmains['degre'];
        $comp['comp_arme_deuxmains_carac'] = $this->comp_arme_deuxmains['carac'];
        $comp['comp_arme_deuxmains_innee'] = $this->comp_arme_deuxmains['innee'];
        $comp['comp_arme_deuxmains_special_1'] = $this->comp_arme_deuxmains['special_1'];
        $comp['comp_arme_deuxmains_special_2'] = $this->comp_arme_deuxmains['special_2'];
        $comp['comp_arme_armedelance_degre'] = $this->comp_arme_armedelance['degre'];
        $comp['comp_arme_armedelance_carac'] = $this->comp_arme_armedelance['carac'];
        $comp['comp_arme_armedelance_innee'] = $this->comp_arme_armedelance['innee'];
        $comp['comp_arme_armedelance_special_1'] = $this->comp_arme_armedelance['special_1'];
        $comp['comp_arme_armedelance_special_2'] = $this->comp_arme_armedelance['special_2'];
        $comp['comp_arme_projectile_degre'] = $this->comp_arme_projectile['degre'];
        $comp['comp_arme_projectile_carac'] = $this->comp_arme_projectile['carac'];
        $comp['comp_arme_projectile_innee'] = $this->comp_arme_projectile['innee'];
        $comp['comp_arme_projectile_special_1'] = $this->comp_arme_projectile['special_1'];
        $comp['comp_arme_projectile_special_2'] = $this->comp_arme_projectile['special_2'];
        $comp['comp_arme_armedhast_degre'] = $this->comp_arme_armedhast['degre'];
        $comp['comp_arme_armedhast_carac'] = $this->comp_arme_armedhast['carac'];
        $comp['comp_arme_armedhast_innee'] = $this->comp_arme_armedhast['innee'];
        $comp['comp_arme_armedhast_special_1'] = $this->comp_arme_armedhast['special_1'];
        $comp['comp_arme_armedhast_special_2'] = $this->comp_arme_armedhast['special_2'];
        $comp['comp_generale_escalade_degre'] = $this->comp_generale_escalade['degre'];
        $comp['comp_generale_escalade_carac'] = $this->comp_generale_escalade['carac'];
        $comp['comp_generale_escalade_innee'] = $this->comp_generale_escalade['innee'];
        $comp['comp_generale_escalade_special_1'] = $this->comp_generale_escalade['special_1'];
        $comp['comp_generale_escalade_special_2'] = $this->comp_generale_escalade['special_2'];
        $comp['comp_generale_equitation_degre'] = $this->comp_generale_equitation['degre'];
        $comp['comp_generale_equitation_carac'] = $this->comp_generale_equitation['carac'];
        $comp['comp_generale_equitation_innee'] = $this->comp_generale_equitation['innee'];
        $comp['comp_generale_equitation_special_1'] = $this->comp_generale_equitation['special_1'];
        $comp['comp_generale_equitation_special_2'] = $this->comp_generale_equitation['special_2'];
        $comp['comp_generale_natation_degre'] = $this->comp_generale_natation['degre'];
        $comp['comp_generale_natation_carac'] = $this->comp_generale_natation['carac'];
        $comp['comp_generale_natation_innee'] = $this->comp_generale_natation['innee'];
        $comp['comp_generale_natation_special_1'] = $this->comp_generale_natation['special_1'];
        $comp['comp_generale_natation_special_2'] = $this->comp_generale_natation['special_2'];
        $comp['comp_generale_pistage_degre'] = $this->comp_generale_pistage['degre'];
        $comp['comp_generale_pistage_carac'] = $this->comp_generale_pistage['carac'];
        $comp['comp_generale_pistage_innee'] = $this->comp_generale_pistage['innee'];
        $comp['comp_generale_pistage_special_1'] = $this->comp_generale_pistage['special_1'];
        $comp['comp_generale_pistage_special_2'] = $this->comp_generale_pistage['special_2'];
        $comp['comp_subterfuge_embuscade_degre'] = $this->comp_subterfuge_embuscade['degre'];
        $comp['comp_subterfuge_embuscade_carac'] = $this->comp_subterfuge_embuscade['carac'];
        $comp['comp_subterfuge_embuscade_innee'] = $this->comp_subterfuge_embuscade['innee'];
        $comp['comp_subterfuge_embuscade_special_1'] = $this->comp_subterfuge_embuscade['special_1'];
        $comp['comp_subterfuge_embuscade_special_2'] = $this->comp_subterfuge_embuscade['special_2'];
        $comp['comp_subterfuge_filatdissim_degre'] = $this->comp_subterfuge_filatdissim['degre'];
        $comp['comp_subterfuge_filatdissim_carac'] = $this->comp_subterfuge_filatdissim['carac'];
        $comp['comp_subterfuge_filatdissim_innee'] = $this->comp_subterfuge_filatdissim['innee'];
        $comp['comp_subterfuge_filatdissim_special_1'] = $this->comp_subterfuge_filatdissim['special_1'];
        $comp['comp_subterfuge_filatdissim_special_2'] = $this->comp_subterfuge_filatdissim['special_2'];
        $comp['comp_subterfuge_crochetage_degre'] = $this->comp_subterfuge_crochetage['degre'];
        $comp['comp_subterfuge_crochetage_carac'] = $this->comp_subterfuge_crochetage['carac'];
        $comp['comp_subterfuge_crochetage_innee'] = $this->comp_subterfuge_crochetage['innee'];
        $comp['comp_subterfuge_crochetage_special_1'] = $this->comp_subterfuge_crochetage['special_1'];
        $comp['comp_subterfuge_crochetage_special_2'] = $this->comp_subterfuge_crochetage['special_2'];
        $comp['comp_subterfuge_desarmementdepiege_degre'] = $this->comp_subterfuge_desarmementdepiege['degre'];
        $comp['comp_subterfuge_desarmementdepiege_carac'] = $this->comp_subterfuge_desarmementdepiege['carac'];
        $comp['comp_subterfuge_desarmementdepiege_innee'] = $this->comp_subterfuge_desarmementdepiege['innee'];
        $comp['comp_subterfuge_desarmementdepiege_special_1'] = $this->comp_subterfuge_desarmementdepiege['special_1'];
        $comp['comp_subterfuge_desarmementdepiege_special_2'] = $this->comp_subterfuge_desarmementdepiege['special_2'];
        $comp['comp_magie_lecturederune_degre'] = $this->comp_magie_lecturederune['degre'];
        $comp['comp_magie_lecturederune_carac'] = $this->comp_magie_lecturederune['carac'];
        $comp['comp_magie_lecturederune_innee'] = $this->comp_magie_lecturederune['innee'];
        $comp['comp_magie_lecturederune_special_1'] = $this->comp_magie_lecturederune['special_1'];
        $comp['comp_magie_lecturederune_special_2'] = $this->comp_magie_lecturederune['special_2'];
        $comp['comp_magie_utilisationdobjet_degre'] = $this->comp_magie_utilisationdobjet['degre'];
        $comp['comp_magie_utilisationdobjet_carac'] = $this->comp_magie_utilisationdobjet['carac'];
        $comp['comp_magie_utilisationdobjet_innee'] = $this->comp_magie_utilisationdobjet['innee'];
        $comp['comp_magie_utilisationdobjet_special_1'] = $this->comp_magie_utilisationdobjet['special_1'];
        $comp['comp_magie_utilisationdobjet_special_2'] = $this->comp_magie_utilisationdobjet['special_2'];
        $comp['comp_magie_directiondesort_degre'] = $this->comp_magie_directiondesort['degre'];
        $comp['comp_magie_directiondesort_carac'] = $this->comp_magie_directiondesort['carac'];
        $comp['comp_magie_directiondesort_innee'] = $this->comp_magie_directiondesort['innee'];
        $comp['comp_magie_directiondesort_special_1'] = $this->comp_magie_directiondesort['special_1'];
        $comp['comp_magie_directiondesort_special_2'] = $this->comp_magie_directiondesort['special_2'];
        $comp['comp_physique_developcorporel_degre'] = $this->comp_physique_developcorporel['degre'];
        $comp['comp_physique_developcorporel_carac'] = $this->comp_physique_developcorporel['carac'];
        $comp['comp_physique_developcorporel_innee'] = $this->comp_physique_developcorporel['innee'];
        $comp['comp_physique_developcorporel_special_1'] = $this->comp_physique_developcorporel['special_1'];
        $comp['comp_physique_developcorporel_special_2'] = $this->comp_physique_developcorporel['special_2'];
        $comp['comp_physique_perception_degre'] = $this->comp_physique_perception['degre'];
        $comp['comp_physique_perception_carac'] = $this->comp_physique_perception['carac'];
        $comp['comp_physique_perception_innee'] = $this->comp_physique_perception['innee'];
        $comp['comp_physique_perception_special_1'] = $this->comp_physique_perception['special_1'];
        $comp['comp_physique_perception_special_2'] = $this->comp_physique_perception['special_2'];

        $this->insert_since_array("detail_personnage_competence", $comp);
    }

}