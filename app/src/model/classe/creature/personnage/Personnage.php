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
    protected $comp_manoeuvreetmouvement_sansarmure_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_manoeuvreetmouvement_cuirsouple_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_manoeuvreetmouvement_cuirrigide_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_manoeuvreetmouvement_cottedemaille_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_manoeuvreetmouvement_plate_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];

    protected $comp_arme_tranchantunemain_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_arme_contondantunemain_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_arme_deuxmains_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_arme_armedelance_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_arme_projectile_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_arme_armedhast_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];

    protected $comp_generale_escalade_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_generale_equitation_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_generale_natation_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_generale_pistage_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];

    protected $comp_subterfuge_embuscade_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_subterfuge_filatdissim_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_subterfuge_crochetage_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_subterfuge_desarmementdepiege_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];

    protected $comp_magie_lecturederune_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_magie_utilisationdobjet_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_magie_directiondesort_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    
    protected $comp_physique_developcorporel_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];
    protected $comp_physique_perception_total = ['val' => 0, 'experience_total' => 0, 'niveau' => 1];

    public function __construct()
    {
        parent::__construct();
    }

    //SETTER ET GETTER COMP//
    //SETTER manoeuvreetmouvement
    public function set_comp_manoeuvreetmouvement_sansarmure_total($val, $key){
        $this->comp_manoeuvreetmouvement_sansarmure_total[$key] = $val;
    }

    public function set_comp_manoeuvreetmouvement_cuirsouple_total($val, $key){
        $this->comp_manoeuvreetmouvement_cuirsouple_total[$key] = $val;
    }

    public function set_comp_manoeuvreetmouvement_cuirrigide_total($val, $key){
        $this->comp_manoeuvreetmouvement_cuirrigide_total[$key] = $val;
    }

    public function set_comp_manoeuvreetmouvement_cottedemaille_total($val, $key){
        $this->comp_manoeuvreetmouvement_cottedemaille_total[$key] = $val;
    }

    public function set_comp_manoeuvreetmouvement_plate_total($val, $key){
        $this->comp_manoeuvreetmouvement_plate_total[$key] = $val;
    }

    //SETTER arme
    public function set_comp_arme_tranchantunemain_total($val, $key){
        $this->comp_arme_tranchantunemain_total[$key] = $val;
    }

    public function set_comp_arme_contondantunemain_total($val, $key){
        $this->comp_arme_contondantunemain_total[$key] = $val;
    }

    public function set_comp_arme_deuxmains_total($val, $key){
        $this->comp_arme_deuxmains_total[$key] = $val;
    }

    public function set_comp_arme_armedelance_total($val, $key){
        $this->comp_arme_armedelance_total[$key] = $val;
    }

    public function set_comp_arme_projectile_total($val, $key){
        $this->comp_arme_projectile_total[$key] = $val;
    }

    public function set_comp_arme_armedhast_total($val, $key){
        $this->comp_arme_armedhast_total[$key] = $val;
    }

    //SETTER generale
    public function set_comp_generale_escalade_total($val, $key){
        $this->comp_generale_escalade_total[$key] = $val;
    }

    public function set_comp_generale_equitation_total($val, $key){
        $this->comp_generale_equitation_total[$key] = $val;
    }

    public function set_comp_generale_natation_total($val, $key){
        $this->comp_generale_natation_total[$key] = $val;
    }

    public function set_comp_generale_pistage_total($val, $key){
        $this->comp_generale_pistage_total[$key] = $val;
    }

    //SETTER subterfuge
    public function set_comp_subterfuge_embuscade_total($val, $key){
        $this->comp_subterfuge_embuscade_total[$key] = $val;
    }

    public function set_comp_subterfuge_filatdissim_total($val, $key){
        $this->comp_subterfuge_filatdissim_total[$key] = $val;
    }

    public function set_comp_subterfuge_crochetage_total($val, $key){
        $this->comp_subterfuge_crochetage_total[$key] = $val;
    }

    public function set_comp_subterfuge_desarmementdepiege_total($val, $key){
        $this->comp_subterfuge_desarmementdepiege_total[$key] = $val;
    }

    //SETTER magie
    public function set_comp_magie_lecturederune_total($val, $key){
        $this->comp_magie_lecturederune_total[$key] = $val;
    }

    public function set_comp_magie_utilisationdobjet_total($val, $key){
        $this->comp_magie_utilisationdobjet_total[$key] = $val;
    }

    public function set_comp_magie_directiondesort_total($val, $key){
        $this->comp_magie_directiondesort_total[$key] = $val;
    }

    //SETTER physique
    public function set_comp_physique_developcorporel_total($val, $key){
        $this->comp_physique_developcorporel_total[$key] = $val;
    }

    public function set_comp_physique_perception_total($val, $key){
        $this->comp_physique_perception_total[$key] = $val;
    }



    //GETTER manoeuvreetmouvement
    public function get_comp_manoeuvreetmouvement_sansarmure_total($key){
        return $this->comp_manoeuvreetmouvement_sansarmure_total[$key];
    }

    public function get_comp_manoeuvreetmouvement_cuirsouple_total($key){
        return $this->comp_manoeuvreetmouvement_cuirsouple_total[$key];
    }

    public function get_comp_manoeuvreetmouvement_cuirrigide_total($key){
        return $this->comp_manoeuvreetmouvement_cuirrigide_total[$key];
    }

    public function get_comp_manoeuvreetmouvement_cottedemaille_total($key){
        return $this->comp_manoeuvreetmouvement_cottedemaille_total[$key];
    }

    public function get_comp_manoeuvreetmouvement_plate_total($key){
        return $this->comp_manoeuvreetmouvement_plate_total[$key];
    }

    //GETTER arme
    public function get_comp_arme_tranchantunemain_total($key){
        return $this->comp_arme_tranchantunemain_total[$key];
    }

    public function get_comp_arme_contondantunemain_total($key){
        return $this->comp_arme_contondantunemain_total[$key];
    }

    public function get_comp_arme_deuxmains_total($key){
        return $this->comp_arme_deuxmains_total[$key];
    }

    public function get_comp_arme_armedelance_total($key){
        return $this->comp_arme_armedelance_total[$key];
    }

    public function get_comp_arme_projectile_total($key){
        return $this->comp_arme_projectile_total[$key];
    }

    public function get_comp_arme_armedhast_total($key){
        return $this->comp_arme_armedhast_total[$key];
    }

    //GETTER generale
    public function get_comp_generale_escalade_total($key){
        return $this->comp_generale_escalade_total[$key];
    }

    public function get_comp_generale_equitation_total($key){
        return $this->comp_generale_equitation_total[$key];
    }

    public function get_comp_generale_natation_total($key){
        return $this->comp_generale_natation_total[$key];
    }

    public function get_comp_generale_pistage_total($key){
        return $this->comp_generale_pistage_total[$key];
    }

    //GETTER subterfuge
    public function get_comp_subterfuge_embuscade_total($key){
        return $this->comp_subterfuge_embuscade_total[$key];
    }

    public function get_comp_subterfuge_filatdissim_total($key){
        return $this->comp_subterfuge_filatdissim_total[$key];
    }

    public function get_comp_subterfuge_crochetage_total($key){
        return $this->comp_subterfuge_crochetage_total[$key];
    }

    public function get_comp_subterfuge_desarmementdepiege_total($key){
        return $this->comp_subterfuge_desarmementdepiege_total[$key];
    }

    //GETTER magie
    public function get_comp_magie_lecturederune_total($key){
        return $this->comp_magie_lecturederune_total[$key];
    }

    public function get_comp_magie_utilisationdobjet_total($key){
        return $this->comp_magie_utilisationdobjet_total[$key];
    }

    public function get_comp_magie_directiondesort_total($key){
        return $this->comp_magie_directiondesort_total[$key];
    }

    //GETTER physique
    public function get_comp_physique_developcorporel_total($key){
        return $this->comp_physique_developcorporel_total[$key];
    }

    public function get_comp_physique_perception_total($key){
        return $this->comp_physique_perception_total[$key];
    }

    //SETTER ET GETTER CACACTERISTIQUE//
    //SETTER
    public function set_caracteristique_force_total($val)
    {
        $this->caracteristique_force_total = $val;
    }

    public function set_caracteristique_agilite_total($val)
    {
        $this->caracteristique_agilite_total = $val;
    }

    public function set_caracteristique_constitution_total($val)
    {
        $this->caracteristique_constitution_total = $val;
    }

    public function set_caracteristique_intelligence_total($val)
    {
        $this->caracteristique_intelligence_total = $val;
    }

    public function set_caracteristique_intuition_total($val)
    {
        $this->caracteristique_intuition_total = $val;
    }

    public function set_caracteristique_presence_total($val)
    {
        $this->caracteristique_presence_total = $val;
    }

    //GETTER
    public function get_caracteristique_force_total()
    {
        return $this->caracteristique_force_total;
    }

    public function get_caracteristique_agilite_total()
    {
        return $this->caracteristique_agilite_total;
    }

    public function get_caracteristique_constitution_total()
    {
        return $this->caracteristique_constitution_total;
    }

    public function get_caracteristique_intelligence_total()
    {
        return $this->caracteristique_intelligence_total;
    }

    public function get_caracteristique_intuition_total()
    {
        return $this->caracteristique_intuition_total;
    }

    public function get_caracteristique_presence_total()
    {
        return $this->caracteristique_presence_total;
    }


    
    //BDD
    //INSERT
    public function insert_personnage_carac() 
    {
        $carac['id_personnage'] = $this->id;
        $carac['caracteristique_force_total'] = $this->caracteristique_force_total;
        $carac['caracteristique_agilite_total'] = $this->caracteristique_agilite_total;
        $carac['caracteristique_constitution_total'] = $this->caracteristique_constitution_total;
        $carac['caracteristique_intelligence_total'] = $this->caracteristique_intelligence_total;
        $carac['caracteristique_intuition_total'] = $this->caracteristique_intuition_total;
        $carac['caracteristique_presence_total'] = $this->caracteristique_presence_total;

        $this->insert_since_array("personnage_caracteristique", $carac);
    }

    public function insert_personnage_comp() 
    {
        $comp['id_personnage'] = $this->id;
        $comp['comp_manoeuvreetmouvement_sansarmure_total_val'] = $this->comp_manoeuvreetmouvement_sansarmure_total['val'];
        $comp['comp_manoeuvreetmouvement_sansarmure_total_experience'] = $this->comp_manoeuvreetmouvement_sansarmure_total['experience_total'];
        $comp['comp_manoeuvreetmouvement_sansarmure_total_niveau'] = $this->comp_manoeuvreetmouvement_sansarmure_total['niveau'];
        $comp['comp_manoeuvreetmouvement_cuirsouple_total_val'] = $this->comp_manoeuvreetmouvement_cuirsouple_total['val'];
        $comp['comp_manoeuvreetmouvement_cuirsouple_total_experience'] = $this->comp_manoeuvreetmouvement_cuirsouple_total['experience_total'];
        $comp['comp_manoeuvreetmouvement_cuirsouple_total_niveau'] = $this->comp_manoeuvreetmouvement_cuirsouple_total['niveau'];
        $comp['comp_manoeuvreetmouvement_cuirrigide_total_val'] = $this->comp_manoeuvreetmouvement_cuirrigide_total['val'];
        $comp['comp_manoeuvreetmouvement_cuirrigide_total_experience'] = $this->comp_manoeuvreetmouvement_cuirrigide_total['experience_total'];
        $comp['comp_manoeuvreetmouvement_cuirrigide_total_niveau'] = $this->comp_manoeuvreetmouvement_cuirrigide_total['niveau'];
        $comp['comp_manoeuvreetmouvement_cottedemaille_total_val'] = $this->comp_manoeuvreetmouvement_cottedemaille_total['val'];
        $comp['comp_manoeuvreetmouvement_cottedemaille_total_experience'] = $this->comp_manoeuvreetmouvement_cottedemaille_total['experience_total'];
        $comp['comp_manoeuvreetmouvement_cottedemaille_total_niveau'] = $this->comp_manoeuvreetmouvement_cottedemaille_total['niveau'];
        $comp['comp_manoeuvreetmouvement_plate_total_val'] = $this->comp_manoeuvreetmouvement_plate_total['val'];
        $comp['comp_manoeuvreetmouvement_plate_total_experience'] = $this->comp_manoeuvreetmouvement_plate_total['experience_total'];
        $comp['comp_manoeuvreetmouvement_plate_total_niveau'] = $this->comp_manoeuvreetmouvement_plate_total['niveau'];
        $comp['comp_arme_tranchantunemain_total_val'] = $this->comp_arme_tranchantunemain_total['val'];
        $comp['comp_arme_tranchantunemain_total_experience'] = $this->comp_arme_tranchantunemain_total['experience_total'];
        $comp['comp_arme_tranchantunemain_total_niveau'] = $this->comp_arme_tranchantunemain_total['niveau'];
        $comp['comp_arme_contondantunemain_total_val'] = $this->comp_arme_contondantunemain_total['val'];
        $comp['comp_arme_contondantunemain_total_experience'] = $this->comp_arme_contondantunemain_total['experience_total'];
        $comp['comp_arme_contondantunemain_total_niveau'] = $this->comp_arme_contondantunemain_total['niveau'];
        $comp['comp_arme_deuxmains_total_val'] = $this->comp_arme_deuxmains_total['val'];
        $comp['comp_arme_deuxmains_total_experience'] = $this->comp_arme_deuxmains_total['experience_total'];
        $comp['comp_arme_deuxmains_total_niveau'] = $this->comp_arme_deuxmains_total['niveau'];
        $comp['comp_arme_armedelance_total_val'] = $this->comp_arme_armedelance_total['val'];
        $comp['comp_arme_armedelance_total_experience'] = $this->comp_arme_armedelance_total['experience_total'];
        $comp['comp_arme_armedelance_total_niveau'] = $this->comp_arme_armedelance_total['niveau'];
        $comp['comp_arme_projectile_total_val'] = $this->comp_arme_projectile_total['val'];
        $comp['comp_arme_projectile_total_experience'] = $this->comp_arme_projectile_total['experience_total'];
        $comp['comp_arme_projectile_total_niveau'] = $this->comp_arme_projectile_total['niveau'];
        $comp['comp_arme_armedhast_total_val'] = $this->comp_arme_armedhast_total['val'];
        $comp['comp_arme_armedhast_total_experience'] = $this->comp_arme_armedhast_total['experience_total'];
        $comp['comp_arme_armedhast_total_niveau'] = $this->comp_arme_armedhast_total['niveau'];
        $comp['comp_generale_escalade_total_val'] = $this->comp_generale_escalade_total['val'];
        $comp['comp_generale_escalade_total_experience'] = $this->comp_generale_escalade_total['experience_total'];
        $comp['comp_generale_escalade_total_niveau'] = $this->comp_generale_escalade_total['niveau'];
        $comp['comp_generale_equitation_total_val'] = $this->comp_generale_equitation_total['val'];
        $comp['comp_generale_equitation_total_experience'] = $this->comp_generale_equitation_total['experience_total'];
        $comp['comp_generale_equitation_total_niveau'] = $this->comp_generale_equitation_total['niveau'];
        $comp['comp_generale_natation_total_val'] = $this->comp_generale_natation_total['val'];
        $comp['comp_generale_natation_total_experience'] = $this->comp_generale_natation_total['experience_total'];
        $comp['comp_generale_natation_total_niveau'] = $this->comp_generale_natation_total['niveau'];
        $comp['comp_generale_pistage_total_val'] = $this->comp_generale_pistage_total['val'];
        $comp['comp_generale_pistage_total_experience'] = $this->comp_generale_pistage_total['experience_total'];
        $comp['comp_generale_pistage_total_niveau'] = $this->comp_generale_pistage_total['niveau'];
        $comp['comp_subterfuge_embuscade_total_val'] = $this->comp_subterfuge_embuscade_total['val'];
        $comp['comp_subterfuge_embuscade_total_experience'] = $this->comp_subterfuge_embuscade_total['experience_total'];
        $comp['comp_subterfuge_embuscade_total_niveau'] = $this->comp_subterfuge_embuscade_total['niveau'];
        $comp['comp_subterfuge_filatdissim_total_val'] = $this->comp_subterfuge_filatdissim_total['val'];
        $comp['comp_subterfuge_filatdissim_total_experience'] = $this->comp_subterfuge_filatdissim_total['experience_total'];
        $comp['comp_subterfuge_filatdissim_total_niveau'] = $this->comp_subterfuge_filatdissim_total['niveau'];
        $comp['comp_subterfuge_crochetage_total_val'] = $this->comp_subterfuge_crochetage_total['val'];
        $comp['comp_subterfuge_crochetage_total_experience'] = $this->comp_subterfuge_crochetage_total['experience_total'];
        $comp['comp_subterfuge_crochetage_total_niveau'] = $this->comp_subterfuge_crochetage_total['niveau'];
        $comp['comp_subterfuge_desarmementdepiege_total_val'] = $this->comp_subterfuge_desarmementdepiege_total['val'];
        $comp['comp_subterfuge_desarmementdepiege_total_experience'] = $this->comp_subterfuge_desarmementdepiege_total['experience_total'];
        $comp['comp_subterfuge_desarmementdepiege_total_niveau'] = $this->comp_subterfuge_desarmementdepiege_total['niveau'];
        $comp['comp_magie_lecturederune_total_val'] = $this->comp_magie_lecturederune_total['val'];
        $comp['comp_magie_lecturederune_total_experience'] = $this->comp_magie_lecturederune_total['experience_total'];
        $comp['comp_magie_lecturederune_total_niveau'] = $this->comp_magie_lecturederune_total['niveau'];
        $comp['comp_magie_utilisationdobjet_total_val'] = $this->comp_magie_utilisationdobjet_total['val'];
        $comp['comp_magie_utilisationdobjet_total_experience'] = $this->comp_magie_utilisationdobjet_total['experience_total'];
        $comp['comp_magie_utilisationdobjet_total_niveau'] = $this->comp_magie_utilisationdobjet_total['niveau'];
        $comp['comp_magie_directiondesort_total_val'] = $this->comp_magie_directiondesort_total['val'];
        $comp['comp_magie_directiondesort_total_experience'] = $this->comp_magie_directiondesort_total['experience_total'];
        $comp['comp_magie_directiondesort_total_niveau'] = $this->comp_magie_directiondesort_total['niveau'];
        $comp['comp_physique_developcorporel_total_val'] = $this->comp_physique_developcorporel_total['val'];
        $comp['comp_physique_developcorporel_total_experience'] = $this->comp_physique_developcorporel_total['experience_total'];
        $comp['comp_physique_developcorporel_total_niveau'] = $this->comp_physique_developcorporel_total['niveau'];
        $comp['comp_physique_perception_total_val'] = $this->comp_physique_perception_total['val'];
        $comp['comp_physique_perception_total_experience'] = $this->comp_physique_perception_total['experience_total'];
        $comp['comp_physique_perception_total_niveau'] = $this->comp_physique_perception_total['niveau'];

        $this->insert_since_array("personnage_competence", $comp);
        
    }

}