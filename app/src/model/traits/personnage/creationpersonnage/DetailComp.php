<?php

namespace App\Model\Traits\Personnage\CreationPersonnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;
Use App\Model\Classe\Factory\FactoryPersonnage;
Use Exception;

Trait DetailComp {

    // propriété : 
    //comp[degré,carac,innee,special_1,special_2, experience_total, niveau]
    
    protected $comp_manoeuvreetmouvement_sansarmure = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_manoeuvreetmouvement_cuirsouple = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => -15];
    protected $comp_manoeuvreetmouvement_cuirrigide = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => -30];
    protected $comp_manoeuvreetmouvement_cottedemaille = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => -45];
    protected $comp_manoeuvreetmouvement_plate = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => -60];
    
    protected $comp_arme_tranchantunemain = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_arme_contondantunemain = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_arme_deuxmains = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_arme_armedelance = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_arme_projectile = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_arme_armedhast = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    
    protected $comp_generale_escalade = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_generale_equitation = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_generale_natation = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_generale_pistage = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    
    protected $comp_subterfuge_embuscade = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_subterfuge_filatdissim = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_subterfuge_crochetage = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_subterfuge_desarmementdepiege = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    
    protected $comp_magie_lecturederune = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_magie_utilisationdobjet = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
    protected $comp_magie_directiondesort = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];
   
    protected $comp_physique_developcorporel = ['degre' => 0, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 5];
    protected $comp_physique_perception = ['degre' => -25, 'carac' => 0, 'innee' => 0, 'special_1' => 0, 'special_2' => 0];


    public function __construct()
    {
    }

    //Set le degre de comp
    //Prend un tableau de comp 'la_comp' => 'le nombre de degre en plus' sachant qu'un degre peut valoir un bonus de 5, 2 ou 1
    //ex : 'comp_arme_deuxmains' => '2'
    //et il a 10 en 'comp_arme_deuxmains', ca lui fera '20'
    //si il avait -25, ca lui ferai '10'
    public function set_comp(array $comp, string $key = 'degre')  
    {
        foreach ($comp as $index => $value) {
            $val = new FactoryPersonnage($index);
            $val->switch_set_comp($this, $value, $key); //Il faut transformer le degre en bonus puis l'incrementer au bonus deja existant
        }
        $this->set_calcul_comp_total(); //Je recalcule la norm pour chaque caracteristique
    }

    //Tout les comp innee (en fonction de la race) est defini dans la classe de la race directement
    public function set_comp_innee()  
    {}

    //Set les caracteristiques des competences en fonction des caracteristiques totals
    public function set_comp_carac() 
    {
        $this->comp_manoeuvreetmouvement_sansarmure['carac'] = $this->caracteristique_agilite_total;
        $this->comp_manoeuvreetmouvement_cuirsouple['carac'] = $this->caracteristique_agilite_total;
        $this->comp_manoeuvreetmouvement_cuirrigide['carac'] = $this->caracteristique_agilite_total;
        $this->comp_manoeuvreetmouvement_cottedemaille['carac'] = $this->caracteristique_force_total;
        $this->comp_manoeuvreetmouvement_plate['carac'] = $this->caracteristique_force_total;

        $this->comp_arme_tranchantunemain['carac'] = $this->caracteristique_force_total;
        $this->comp_arme_contondantunemain['carac'] = $this->caracteristique_force_total;
        $this->comp_arme_deuxmains['carac'] = $this->caracteristique_force_total;
        $this->comp_arme_armedelance['carac'] = $this->caracteristique_agilite_total;
        $this->comp_arme_projectile['carac'] = $this->caracteristique_agilite_total;
        $this->comp_arme_armedhast['carac'] = $this->caracteristique_force_total;

        $this->comp_generale_escalade['carac'] = $this->caracteristique_agilite_total;
        $this->comp_generale_equitation['carac'] = $this->caracteristique_intuition_total;
        $this->comp_generale_natation['carac'] = $this->caracteristique_agilite_total;
        $this->comp_generale_pistage['carac'] = $this->caracteristique_intelligence_total;

        // $this->comp_subterfuge_embuscade['carac'] = 0; //Pas en fonction des carac
        $this->comp_subterfuge_filatdissim['carac'] = $this->caracteristique_presence_total;
        $this->comp_subterfuge_crochetage['carac'] = $this->caracteristique_intelligence_total;
        $this->comp_subterfuge_desarmementdepiege['carac'] = $this->caracteristique_intuition_total;

        $this->comp_magie_lecturederune['carac'] = $this->caracteristique_intelligence_total;
        $this->comp_magie_utilisationdobjet['carac'] = $this->caracteristique_intuition_total;
        $this->comp_magie_directiondesort['carac'] = $this->caracteristique_agilite_total;

        $this->comp_physique_developcorporel['carac'] = $this->caracteristique_constitution_total;
        $this->comp_physique_perception['carac'] = $this->caracteristique_intuition_total;

        $this->set_calcul_comp_total(); //Il faut recalculer le total de toutes les competences
    }

    //Set les val totals des comp en fonctions du reste 
    // comp_total = degré + carac + innee + special_1 + special_2
    public function set_calcul_comp_total() 
    {                                       
        $this->comp_manoeuvreetmouvement_sansarmure_total['val'] = $this->comp_manoeuvreetmouvement_sansarmure['degre'] + $this->comp_manoeuvreetmouvement_sansarmure['carac'] + $this->comp_manoeuvreetmouvement_sansarmure['innee'] + $this->comp_manoeuvreetmouvement_sansarmure['special_1'];
        $this->comp_manoeuvreetmouvement_cuirsouple_total['val'] = $this->comp_manoeuvreetmouvement_cuirsouple['degre'] + $this->comp_manoeuvreetmouvement_cuirsouple['carac'] + $this->comp_manoeuvreetmouvement_cuirsouple['innee'] + $this->comp_manoeuvreetmouvement_cuirsouple['special_1'] - 15;
        $this->comp_manoeuvreetmouvement_cuirrigide_total['val'] = $this->comp_manoeuvreetmouvement_cuirrigide['degre'] + $this->comp_manoeuvreetmouvement_cuirrigide['carac'] + $this->comp_manoeuvreetmouvement_cuirrigide['innee'] + $this->comp_manoeuvreetmouvement_cuirrigide['special_1'] - 30;
        $this->comp_manoeuvreetmouvement_cottedemaille_total['val'] = $this->comp_manoeuvreetmouvement_cottedemaille['degre'] + $this->comp_manoeuvreetmouvement_cottedemaille['carac'] + $this->comp_manoeuvreetmouvement_cottedemaille['innee'] + $this->comp_manoeuvreetmouvement_cottedemaille['special_1'] - 45;
        $this->comp_manoeuvreetmouvement_plate_total['val'] = $this->comp_manoeuvreetmouvement_plate['degre'] + $this->comp_manoeuvreetmouvement_plate['carac'] + $this->comp_manoeuvreetmouvement_cottedemaille['innee'] + $this->comp_manoeuvreetmouvement_plate['special_1'] - 60;
        
        $this->comp_arme_tranchantunemain_total['val'] = $this->comp_arme_tranchantunemain['degre'] + $this->comp_arme_tranchantunemain['carac'] + $this->comp_arme_tranchantunemain['innee'] + $this->comp_arme_tranchantunemain['special_1'] + $this->comp_arme_tranchantunemain['special_2'];
        $this->comp_arme_contondantunemain_total['val'] = $this->comp_arme_contondantunemain['degre'] + $this->comp_arme_contondantunemain['carac'] + $this->comp_arme_contondantunemain['innee'] + $this->comp_arme_contondantunemain['special_1'] + $this->comp_arme_contondantunemain['special_2'];
        $this->comp_arme_deuxmains_total['val'] = $this->comp_arme_deuxmains['degre'] + $this->comp_arme_deuxmains['carac'] + $this->comp_arme_deuxmains['innee'] + $this->comp_arme_deuxmains['special_1'] + $this->comp_arme_deuxmains['special_2'];
        $this->comp_arme_armedelance_total['val'] = $this->comp_arme_armedelance['degre'] + $this->comp_arme_armedelance['carac'] + $this->comp_arme_armedelance['innee'] + $this->comp_arme_armedelance['special_1'] + $this->comp_arme_armedelance['special_2'];
        $this->comp_arme_projectile_total['val'] = $this->comp_arme_projectile['degre'] + $this->comp_arme_projectile['carac'] + $this->comp_arme_projectile['innee'] + $this->comp_arme_projectile['special_1'] + $this->comp_arme_projectile['special_2'];
        $this->comp_arme_armedhast_total['val'] = $this->comp_arme_armedhast['degre'] + $this->comp_arme_armedhast['carac'] + $this->comp_arme_armedhast['innee'] + $this->comp_arme_armedhast['special_1'] + $this->comp_arme_armedhast['special_2'];
        
        $this->comp_generale_escalade_total['val'] = $this->comp_generale_escalade['degre'] + $this->comp_generale_escalade['carac'] + $this->comp_generale_escalade['innee'] + $this->comp_generale_escalade['special_1'] + $this->comp_generale_escalade['special_2'];
        $this->comp_generale_equitation_total['val'] = $this->comp_generale_equitation['degre'] + $this->comp_generale_equitation['carac'] + $this->comp_generale_equitation['innee'] + $this->comp_generale_equitation['special_1'] + $this->comp_generale_equitation['special_2'];
        $this->comp_generale_natation_total['val'] = $this->comp_generale_natation['degre'] + $this->comp_generale_natation['carac'] + $this->comp_generale_natation['innee'] + $this->comp_generale_natation['special_1'] + $this->comp_generale_natation['special_2'];
        $this->comp_generale_pistage_total['val'] = $this->comp_generale_pistage['degre'] + $this->comp_generale_pistage['carac'] + $this->comp_generale_pistage['innee'] + $this->comp_generale_pistage['special_1'] + $this->comp_generale_pistage['special_2'];
        
        $this->comp_subterfuge_embuscade_total['val'] = $this->comp_subterfuge_embuscade['degre'] + $this->comp_subterfuge_embuscade['innee'] + $this->comp_subterfuge_embuscade['special_1'] + $this->comp_subterfuge_embuscade['special_2'];
        $this->comp_subterfuge_filatdissim_total['val'] = $this->comp_subterfuge_filatdissim['degre'] + $this->comp_subterfuge_filatdissim['carac'] + $this->comp_subterfuge_filatdissim['innee'] + $this->comp_subterfuge_filatdissim['special_1'] + $this->comp_subterfuge_filatdissim['special_2'];
        $this->comp_subterfuge_crochetage_total['val'] = $this->comp_subterfuge_crochetage['degre'] + $this->comp_subterfuge_crochetage['carac'] + $this->comp_subterfuge_crochetage['innee'] + $this->comp_subterfuge_crochetage['special_1'] + $this->comp_subterfuge_crochetage['special_2'];
        $this->comp_subterfuge_desarmementdepiege_total['val'] = $this->comp_subterfuge_desarmementdepiege['degre'] + $this->comp_subterfuge_desarmementdepiege['carac'] + $this->comp_subterfuge_desarmementdepiege['innee'] + $this->comp_subterfuge_desarmementdepiege['special_1'] + $this->comp_subterfuge_desarmementdepiege['special_2'];
        
        $this->comp_magie_lecturederune_total['val'] = $this->comp_magie_lecturederune['degre'] + $this->comp_magie_lecturederune['carac'] + $this->comp_magie_lecturederune['innee'] + $this->comp_magie_lecturederune['special_1'] + $this->comp_magie_lecturederune['special_2'];
        $this->comp_magie_utilisationdobjet_total['val'] = $this->comp_magie_utilisationdobjet['degre'] + $this->comp_magie_utilisationdobjet['carac'] + $this->comp_magie_utilisationdobjet['innee'] + $this->comp_magie_utilisationdobjet['special_1'] + $this->comp_magie_utilisationdobjet['special_2'];
        $this->comp_magie_directiondesort_total['val'] = $this->comp_magie_directiondesort['degre'] + $this->comp_magie_directiondesort['carac'] + $this->comp_magie_directiondesort['innee'] + $this->comp_magie_directiondesort['special_1'] + $this->comp_magie_directiondesort['special_2'];
        
        $this->comp_physique_developcorporel_total['val'] = $this->comp_physique_developcorporel['degre'] + $this->comp_physique_developcorporel['carac'] + $this->comp_physique_developcorporel['innee'] + $this->comp_physique_developcorporel['special_1'] + 5;
        $this->comp_physique_perception_total['val'] = $this->comp_physique_perception['degre'] + $this->comp_physique_perception['carac'] + $this->comp_physique_perception['innee'] + $this->comp_physique_perception['special_1'] + $this->comp_physique_perception['special_2'];
    }



    //SETTER manoeuvreetmouvement
    public function set_comp_manoeuvreetmouvement_sansarmure(int $val, string $key){
        $this->comp_manoeuvreetmouvement_sansarmure[$key] = $val;
    }

    public function set_comp_manoeuvreetmouvement_cuirsouple(int $val, string $key){
        $this->comp_manoeuvreetmouvement_cuirsouple[$key] = $val;
    }

    public function set_comp_manoeuvreetmouvement_cuirrigide(int $val, string $key){
        $this->comp_manoeuvreetmouvement_cuirrigide[$key] = $val;
    }

    public function set_comp_manoeuvreetmouvement_cottedemaille(int $val, string $key){
        $this->comp_manoeuvreetmouvement_cottedemaille[$key] = $val;
    }

    public function set_comp_manoeuvreetmouvement_plate(int $val, string $key){
        $this->comp_manoeuvreetmouvement_plate[$key] = $val;
    }

    //SETTER arme
    public function set_comp_arme_tranchantunemain(int $val, string $key){
        $this->comp_arme_tranchantunemain[$key] = $val;
    }

    public function set_comp_arme_contondantunemain(int $val, string $key){
        $this->comp_arme_contondantunemain[$key] = $val;
    }

    public function set_comp_arme_deuxmains(int $val, string $key){
        $this->comp_arme_deuxmains[$key] = $val;
    }

    public function set_comp_arme_armedelance(int $val, string $key){
        $this->comp_arme_armedelance[$key] = $val;
    }

    public function set_comp_arme_projectile(int $val, string $key){
        $this->comp_arme_projectile[$key] = $val;
    }

    public function set_comp_arme_armedhast(int $val, string $key){
        $this->comp_arme_armedhast[$key] = $val;
    }

    //SETTER generale
    public function set_comp_generale_escalade(int $val, string $key){
        $this->comp_generale_escalade[$key] = $val;
    }

    public function set_comp_generale_equitation(int $val, string $key){
        $this->comp_generale_equitation[$key] = $val;
    }

    public function set_comp_generale_natation(int $val, string $key){
        $this->comp_generale_natation[$key] = $val;
    }

    public function set_comp_generale_pistage(int $val, string $key){
        $this->comp_generale_pistage[$key] = $val;
    }

    //SETTER subterfuge
    public function set_comp_subterfuge_embuscade(int $val, string $key){
        $this->comp_subterfuge_embuscade[$key] = $val;
    }

    public function set_comp_subterfuge_filatdissim(int $val, string $key){
        $this->comp_subterfuge_filatdissim[$key] = $val;
    }

    public function set_comp_subterfuge_crochetage(int $val, string $key){
        $this->comp_subterfuge_crochetage[$key] = $val;
    }

    public function set_comp_subterfuge_desarmementdepiege(int $val, string $key){
        $this->comp_subterfuge_desarmementdepiege[$key] = $val;
    }

    //SETTER magie
    public function set_comp_magie_lecturederune(int $val, string $key){
        $this->comp_magie_lecturederune[$key] = $val;
    }

    public function set_comp_magie_utilisationdobjet(int $val, string $key){
        $this->comp_magie_utilisationdobjet[$key] = $val;
    }

    public function set_comp_magie_directiondesort(int $val, string $key){
        $this->comp_magie_directiondesort[$key] = $val;
    }

    //SETTER physique
    public function set_comp_physique_developcorporel(int $val, string $key){
        $this->comp_physique_developcorporel[$key] = $val;
    }

    public function set_comp_physique_perception(int $val, string $key){
        $this->comp_physique_perception[$key] = $val;
    }



    //GETTER manoeuvreetmouvement
    public function get_comp_manoeuvreetmouvement_sansarmure(string $key){
        return $this->comp_manoeuvreetmouvement_sansarmure[$key];
    }

    public function get_comp_manoeuvreetmouvement_cuirsouple(string $key){
        return $this->comp_manoeuvreetmouvement_cuirsouple[$key];
    }

    public function get_comp_manoeuvreetmouvement_cuirrigide(string $key){
        return $this->comp_manoeuvreetmouvement_cuirrigide[$key];
    }

    public function get_comp_manoeuvreetmouvement_cottedemaille(string $key){
        return $this->comp_manoeuvreetmouvement_cottedemaille[$key];
    }

    public function get_comp_manoeuvreetmouvement_plate(string $key){
        return $this->comp_manoeuvreetmouvement_plate[$key];
    }

    //GETTER arme
    public function get_comp_arme_tranchantunemain(string $key){
        return $this->comp_arme_tranchantunemain[$key];
    }

    public function get_comp_arme_contondantunemain(string $key){
        return $this->comp_arme_contondantunemain[$key];
    }

    public function get_comp_arme_deuxmains(string $key){
        return $this->comp_arme_deuxmains[$key];
    }

    public function get_comp_arme_armedelance(string $key){
        return $this->comp_arme_armedelance[$key];
    }

    public function get_comp_arme_projectile(string $key){
        return $this->comp_arme_projectile[$key];
    }

    public function get_comp_arme_armedhast(string $key){
        return $this->comp_arme_armedhast[$key];
    }

    //GETTER generale
    public function get_comp_generale_escalade(string $key){
        return $this->comp_generale_escalade[$key];
    }

    public function get_comp_generale_equitation(string $key){
        return $this->comp_generale_equitation[$key];
    }

    public function get_comp_generale_natation(string $key){
        return $this->comp_generale_natation[$key];
    }

    public function get_comp_generale_pistage(string $key){
        return $this->comp_generale_pistage[$key];
    }

    //GETTER subterfuge
    public function get_comp_subterfuge_embuscade(string $key){
        return $this->comp_subterfuge_embuscade[$key];
    }

    public function get_comp_subterfuge_filatdissim(string $key){
        return $this->comp_subterfuge_filatdissim[$key];
    }

    public function get_comp_subterfuge_crochetage(string $key){
        return $this->comp_subterfuge_crochetage[$key];
    }

    public function get_comp_subterfuge_desarmementdepiege(string $key){
        return $this->comp_subterfuge_desarmementdepiege[$key];
    }

    //GETTER magie
    public function get_comp_magie_lecturederune(string $key){
        return $this->comp_magie_lecturederune[$key];
    }

    public function get_comp_magie_utilisationdobjet(string $key){
        return $this->comp_magie_utilisationdobjet[$key];
    }

    public function get_comp_magie_directiondesort(string $key){
        return $this->comp_magie_directiondesort[$key];
    }

    //GETTER physique
    public function get_comp_physique_developcorporel(string $key){
        return $this->comp_physique_developcorporel[$key];
    }

    public function get_comp_physique_perception(string $key){
        return $this->comp_physique_perception[$key];
    }

}