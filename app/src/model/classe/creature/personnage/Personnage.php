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
        $carac['caracteristique_force_total'] = $this->caracteristique_force_total;
        $carac['caracteristique_agilite_total'] = $this->caracteristique_agilite_total;
        $carac['caracteristique_constitution_total'] = $this->caracteristique_constitution_total;
        $carac['caracteristique_intelligence_total'] = $this->caracteristique_intelligence_total;
        $carac['caracteristique_intuition_total'] = $this->caracteristique_intuition_total;
        $carac['caracteristique_presence_total'] = $this->caracteristique_presence_total;

        foreach ($carac as $key => $value) {
            $sql = "INSERT INTO `personnage_caracteristique` (`id_personnage`, `name`, `val`) 
            VALUES ('". $this->id ."', '". $this->bdd->real_escape_string($key) ."', '". $this->bdd->real_escape_string($value) ."');";
            $this->bdd->query($sql);
        }
    }

    public function insert_personnage_comp() 
    {
        $comp['comp_manoeuvreetmouvement_sansarmure_total'] = $this->comp_manoeuvreetmouvement_sansarmure_total;
        $comp['comp_manoeuvreetmouvement_cuirsouple_total'] = $this->comp_manoeuvreetmouvement_cuirsouple_total;
        $comp['comp_manoeuvreetmouvement_cuirrigide_total'] = $this->comp_manoeuvreetmouvement_cuirrigide_total;
        $comp['comp_manoeuvreetmouvement_cottedemaille_total'] = $this->comp_manoeuvreetmouvement_cottedemaille_total;
        $comp['comp_manoeuvreetmouvement_plate_total'] = $this->comp_manoeuvreetmouvement_plate_total;
        $comp['comp_arme_tranchantunemain_total'] = $this->comp_arme_tranchantunemain_total;
        $comp['comp_arme_contondantunemain_total'] = $this->comp_arme_contondantunemain_total;
        $comp['comp_arme_deuxmains_total'] = $this->comp_arme_deuxmains_total;
        $comp['comp_arme_armedelance_total'] = $this->comp_arme_armedelance_total;
        $comp['comp_arme_projectile_total'] = $this->comp_arme_projectile_total;
        $comp['comp_arme_armedhast_total'] = $this->comp_arme_armedhast_total;
        $comp['comp_generale_escalade_total'] = $this->comp_generale_escalade_total;
        $comp['comp_generale_equitation_total'] = $this->comp_generale_equitation_total;
        $comp['comp_generale_natation_total'] = $this->comp_generale_natation_total;
        $comp['comp_generale_pistage_total'] = $this->comp_generale_pistage_total;
        $comp['comp_subterfuge_embuscade_total'] = $this->comp_subterfuge_embuscade_total;
        $comp['comp_subterfuge_filatdissim_total'] = $this->comp_subterfuge_filatdissim_total;
        $comp['comp_subterfuge_crochetage_total'] = $this->comp_subterfuge_crochetage_total;
        $comp['comp_subterfuge_desarmementdepiege_total'] = $this->comp_subterfuge_desarmementdepiege_total;
        $comp['comp_magie_lecturederune_total'] = $this->comp_magie_lecturederune_total;
        $comp['comp_magie_utilisationdobjet_total'] = $this->comp_magie_utilisationdobjet_total;
        $comp['comp_magie_directiondesort_total'] = $this->comp_magie_directiondesort_total;
        $comp['comp_physique_developcorporel_total'] = $this->comp_physique_developcorporel_total;
        $comp['comp_physique_perception_total'] = $this->comp_physique_perception_total;

        foreach ($comp as $key => $value) {
            $sql = "INSERT INTO `personnage_competence` (`id_personnage`, `name`, `val`, `experience`, `niveau`) 
            VALUES ('". $this->id ."', '". $this->bdd->real_escape_string($key) ."', '". $this->bdd->real_escape_string($value['val']) ."', '". $this->bdd->real_escape_string($value['experience_total']) ."', '". $this->bdd->real_escape_string($value['niveau']) ."');";
            $this->bdd->query($sql);
        }
    }

}