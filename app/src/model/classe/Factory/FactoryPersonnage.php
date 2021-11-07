<?php

namespace App\Model\Classe\Factory;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\ElfeNoldor;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Nain;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Humain;
Use Exception;

class FactoryPersonnage extends Factory {

    public function __construct(string $selected)
    {
        parent::__construct($selected);
    }

    public function switch_instance_class_race() //Permet d'instancier une class Elfe/Nain etc en fonction de la race selectionne
    {
        switch ($this->selected) {
            case 'ElfeNoldor':
                return new ElfeNoldor();
                break;

            case 'Nain':
                return new Nain();
                break;

            case 'Humain':
                return new Humain();
                break;
            
            default:
                throw new Exception("La classe n'existe pas");
                break;
        }
    }

    public function switch_set_caracteristique($MonPersonnage, int $val, string $key = 'val') //Rentre dans l'objet la caracteristique
    {
        switch ($this->selected) {
            case 'force':
                if($key == 'val') {$val = $MonPersonnage->get_caracteristique_force($key) + $val;}
                elseif($key == 'norm'){$val = $this->switch_calcul_bonus_caracteristique($val);}
                $MonPersonnage->set_caracteristique_force($key, $val);
                break;

            case 'agilite':
                if($key == 'val') {$val = $MonPersonnage->get_caracteristique_agilite($key) + $val;}
                elseif($key == 'norm'){$val = $this->switch_calcul_bonus_caracteristique($val);}
                $MonPersonnage->set_caracteristique_agilite($key, $val);
                break;

            case 'constitution':
                if($key == 'val') {$val = $MonPersonnage->get_caracteristique_constitution($key) + $val;}
                elseif($key == 'norm'){$val = $this->switch_calcul_bonus_caracteristique($val);}
                $MonPersonnage->set_caracteristique_constitution($key, $val);
                break;
            
            case 'intelligence':
                if($key == 'val') {$val = $MonPersonnage->get_caracteristique_intelligence($key) + $val;}
                elseif($key == 'norm'){$val = $this->switch_calcul_bonus_caracteristique($val);}
                $MonPersonnage->set_caracteristique_intelligence($key, $val);
                $MonPersonnage->set_point_de_pouvoir_max_carac();
                break;

            case 'intuition':
                if($key == 'val') {$val = $MonPersonnage->get_caracteristique_intuition($key) + $val;}
                elseif($key == 'norm'){$val = $this->switch_calcul_bonus_caracteristique($val);}
                $MonPersonnage->set_caracteristique_intuition($key, $val);
                $MonPersonnage->set_point_de_pouvoir_max_carac();
                break;

            case 'presence':
                if($key == 'val') {$val = $MonPersonnage->get_caracteristique_presence($key) + $val;}
                elseif($key == 'norm'){$val = $this->switch_calcul_bonus_caracteristique($val);}
                $MonPersonnage->set_caracteristique_presence($key, $val);
                break;
            
            default:
                throw new Exception("La caracteristique n'existe pas");
                break;
        }
        return $val;
    }

    //INFOOO : Si je veux augmenter mes degres de +10, ca equivaut à 2 lvl, donc degré = 2, et ca augmente de 10 mes degrés
    public function switch_set_comp($MonPersonnage, int $val, string $key = 'degre') //Incremente les degres dans les comp
    {
        switch ($this->selected) {
            case 'comp_manoeuvreetmouvement_sansarmure':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_sansarmure_total('niveau');
                    $MonPersonnage->set_comp_manoeuvreetmouvement_sansarmure_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_sansarmure($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_manoeuvreetmouvement_sansarmure($val, $key);
                break;

            case 'comp_manoeuvreetmouvement_cuirsouple':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirsouple_total('niveau');
                    $MonPersonnage->set_comp_manoeuvreetmouvement_cuirsouple_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirsouple($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_manoeuvreetmouvement_cuirsouple($val, $key);
                break;

            case 'comp_manoeuvreetmouvement_cuirrigide':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirrigide_total('niveau');
                    $MonPersonnage->set_comp_manoeuvreetmouvement_cuirrigide_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirrigide($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_manoeuvreetmouvement_cuirrigide($val, $key);
                break;
            
            case 'comp_manoeuvreetmouvement_cottedemaille':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_cottedemaille_total('niveau');
                    $MonPersonnage->set_comp_manoeuvreetmouvement_cottedemaille_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_cottedemaille($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_manoeuvreetmouvement_cottedemaille($val, $key);
                break;

            case 'comp_manoeuvreetmouvement_plate':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_plate_total('niveau');
                    $MonPersonnage->set_comp_manoeuvreetmouvement_plate_total(($niveau_actuel+$val), 'niveau');
                }                
                $bonus_actuel = $MonPersonnage->get_comp_manoeuvreetmouvement_plate($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_manoeuvreetmouvement_plate($val, $key);
                break;

            case 'comp_arme_tranchantunemain':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_arme_tranchantunemain_total('niveau');
                    $MonPersonnage->set_comp_arme_tranchantunemain_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_arme_tranchantunemain($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_arme_tranchantunemain($val, $key);
                break;

            case 'comp_arme_contondantunemain':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_arme_contondantunemain_total('niveau');
                    $MonPersonnage->set_comp_arme_contondantunemain_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_arme_contondantunemain($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_arme_contondantunemain($val, $key);
                break;

            case 'comp_arme_deuxmains':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_arme_deuxmains_total('niveau');
                    $MonPersonnage->set_comp_arme_deuxmains_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_arme_deuxmains($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_arme_deuxmains($val, $key);
                break;
            
            case 'comp_arme_armedelance':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_arme_armedelance_total('niveau');
                    $MonPersonnage->set_comp_arme_armedelance_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_arme_armedelance($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_arme_armedelance($val, $key);
                break;

            case 'comp_arme_projectile':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_arme_projectile_total('niveau');
                    $MonPersonnage->set_comp_arme_projectile_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_arme_projectile($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_arme_projectile($val, $key);
                break;

            case 'comp_arme_armedhast':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_arme_armedhast_total('niveau');
                    $MonPersonnage->set_comp_arme_armedhast_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_arme_armedhast($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_arme_armedhast($val, $key);
                break;
            
            case 'comp_generale_escalade':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_generale_escalade_total('niveau');
                    $MonPersonnage->set_comp_generale_escalade_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_generale_escalade($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_generale_escalade($val, $key);
                break;

            case 'comp_generale_equitation':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_generale_equitation_total('niveau');
                    $MonPersonnage->set_comp_generale_equitation_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_generale_equitation($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_generale_equitation($val, $key);
                break;

            case 'comp_generale_natation':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_generale_natation_total('niveau');
                    $MonPersonnage->set_comp_generale_natation_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_generale_natation($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_generale_natation($val, $key);
                break;
            
            case 'comp_generale_pistage':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_generale_pistage_total('niveau');
                    $MonPersonnage->set_comp_generale_pistage_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_generale_pistage($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_generale_pistage($val, $key);
                break;
                
            case 'comp_subterfuge_embuscade':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_subterfuge_embuscade_total('niveau');
                    $MonPersonnage->set_comp_subterfuge_embuscade_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_subterfuge_embuscade($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_subterfuge_embuscade($val, $key);
                break;

            case 'comp_subterfuge_filatdissim':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_subterfuge_filatdissim_total('niveau');
                    $MonPersonnage->set_comp_subterfuge_filatdissim_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_subterfuge_filatdissim($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_subterfuge_filatdissim($val, $key);
                break;

            case 'comp_subterfuge_crochetage':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_subterfuge_crochetage_total('niveau');
                    $MonPersonnage->set_comp_subterfuge_crochetage_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_subterfuge_crochetage($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_subterfuge_crochetage($val, $key);
                break;
            
            case 'comp_subterfuge_desarmementdepiege':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_subterfuge_desarmementdepiege_total('niveau');
                    $MonPersonnage->set_comp_subterfuge_desarmementdepiege_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_subterfuge_desarmementdepiege($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_subterfuge_desarmementdepiege($val, $key);
                break;

            case 'comp_magie_lecturederune':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_magie_lecturederune_total('niveau');
                    $MonPersonnage->set_comp_magie_lecturederune_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_magie_lecturederune($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_magie_lecturederune($val, $key);
                break;

            case 'comp_magie_utilisationdobjet':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_magie_utilisationdobjet_total('niveau');
                    $MonPersonnage->set_comp_magie_utilisationdobjet_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_magie_utilisationdobjet($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_magie_utilisationdobjet($val, $key);
                break;
            
            case 'comp_magie_directiondesort':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_magie_directiondesort_total('niveau');
                    $MonPersonnage->set_comp_magie_directiondesort_total(($niveau_actuel+$val), 'niveau');
                    $MonPersonnage->set_point_de_pouvoir_max_carac(); //Comme j'augmente de lvl et que c'est val d'intel * lvl de direction de sort, alors je dois recalculer les points de pouvoir max         
                }
                $bonus_actuel = $MonPersonnage->get_comp_magie_directiondesort($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);   
                $MonPersonnage->set_comp_magie_directiondesort($val, $key);
                break;

            case 'comp_physique_developcorporel':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_physique_developcorporel_total('niveau');
                    $MonPersonnage->set_comp_physique_developcorporel_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_physique_developcorporel($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_physique_developcorporel($val, $key);
                $MonPersonnage->set_point_de_vie_max_personnage_joueur(); //Recalcul les pv du personnages quand on modifie les stat du dev corporel
                break;
            
            case 'comp_physique_perception':
                if($key == "degre"){
                    $niveau_actuel = $MonPersonnage->get_comp_physique_perception_total('niveau');
                    $MonPersonnage->set_comp_physique_perception_total(($niveau_actuel+$val), 'niveau');
                }
                $bonus_actuel = $MonPersonnage->get_comp_physique_perception($key);      
                $val = $this->switch_convertir_degre_en_bonus($bonus_actuel, $val);            
                $MonPersonnage->set_comp_physique_perception($val, $key);
                break;

            default:
                throw new Exception("La compétence ''".$this->selected."'' n'existe pas");
                break;
        }
    }

    private function switch_convertir_degre_en_bonus(int $bonus_actuel, int $degre_a_incrementer) //Incremente les degres dans les comp
    {
        for ($i=1; $i <= $degre_a_incrementer; $i++) { 
            switch (true) {
                case ($bonus_actuel >= 70):
                    $bonus_actuel += 1; 
                    break;
                case ($bonus_actuel >= 50):
                    $bonus_actuel += 2; 
                    break;
                case ($bonus_actuel >= -24):
                    $bonus_actuel += 5; 
                    break;
                case ($bonus_actuel >= -25):
                    $bonus_actuel += 30; 
                    break;
                
                default:
                    throw new Exception("Impossible de convertir les degres en bonus");
                    break;
            }
        }

        return $bonus_actuel;
    }

    public function switch_set_langage($MonPersonnage, int $val) //Incremente les degres dans les comp
    {
        switch ($this->selected) {
            case 'langue_Adunaic' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Adunaic(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Adunaic($check);                    
                }
                break;

            case 'langue_Apysaic' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Apysaic(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Apysaic($check);                    
                }
                break;

            case 'langue_Atliduk' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Atliduk(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Atliduk($check);                    
                }
                break;

            case 'langue_Haradaic' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Haradaic(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Haradaic($check);                    
                }
                break;

            case 'langue_Khuzdul' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Khuzdul(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Khuzdul($check);                    
                }
                break;

            case 'langue_Kuduk' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Kuduk(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Kuduk($check);                    
                }
                break;

            case 'langue_Labba' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Labba(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Labba($check);                    
                }
                break;

            case 'langue_Logathig' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Logathig(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Logathig($check);                    
                }
                break;

            case 'langue_Nahaiduk' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Nahaiduk(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Nahaiduk($check);                    
                }
                break;

            case 'langue_Noirparler' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Noirparler(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Noirparler($check);                    
                }
                break;

            case 'langue_Orque' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Orque(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Orque($check);                    
                }
                break;

            case 'langue_Pukael' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Pukael(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Pukael($check);                    
                }
                break;

            case 'langue_Quenya' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Quenya(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Quenya($check);                    
                }
                break;

            case 'langue_Rohirric' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Rohirric(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Rohirric($check);                    
                }
                break;

            case 'langue_Sindarin' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Sindarin(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Sindarin($check);                    
                }
                break;

            case 'langue_Sylvain' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Sylvain(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Sylvain($check);                    
                }
                break;

            case 'langue_Umitic' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Umitic(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Umitic($check);                    
                }
                break;

            case 'langue_Varadja' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Varadja(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Varadja($check);                    
                }
                break;

            case 'langue_Waildyth' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Waildyth(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Waildyth($check);                    
                }
                break;

            case 'langue_Westron' :
                $check = $this->check_langage_superior_five($MonPersonnage->get_langue_Westron(), $val);
                if($check !== "false"){
                    $MonPersonnage->set_langue_Westron($check);                    
                }
                break;

            default:
                throw new Exception("Cette langue n'existe pas");
                break;
        }
        return $check;
    }

    private function check_langage_superior_five(int $val_of_competence, int $add_val) //La valeur qu'il y a dans le langage, La valeur a ajouté dans le langage
    {
        if(($val_of_competence + $add_val) <= 5){
            return ($val_of_competence + $add_val);
        }else{
            throw new Exception("La langue ". $this->selected ." à déjà " . $val_of_competence . " et à un maximum de 5 points");
            return "false";
        }  
    }

    public function switch_calcul_bonus_caracteristique(int $val) //Donne en fonction de la valeur d'une caracteristique sa norme
    {
        switch (true) {
            case $val >= 102:
                return 35;
                break;

            case $val >= 101:
                return 30;
                break;

            case $val >= 100:
                return 25;
                break;
            
            case $val >= 98:
                return 20;
                break;
            
            case $val >= 95:
                return 15;
                break;
            
            case $val >= 90:
                return 10;
                break;
            
            case $val >= 75:
                return 5;
                break;
            
            case $val >= 25:
                return 0;
                break;
            
            case $val >= 10:
                return -5;
                break;
            
            case $val >= 5:
                return -10;
                break;
            
            case $val >= 3:
                return -15;
                break;
            
            case $val >= 2:
                return -20;
                break;
            
            case $val >= 1:
                return -25;
                break;
            
            default:
                throw new Exception("La valeur de la caracteristique n'est pas valide");
                break;
        }
    }

    public function switch_calcul_point_de_pouvoir(int $val) //Donne en fonction de la valeur d'une caracteristique sa norme
    {
        switch (true) {
            case $val >= 102:
                return 5;
                break;

            case $val >= 99:
                return 4;
                break;
            
            case $val >= 95:
                return 3;
                break;

            case $val >= 75:
                return 2;
                break;
            
            case $val >= 55:
                return 1;
                break;
            
            case $val < 55:
                return 0;
                break;
            
            default:
                throw new Exception("Probleme dans le calcul des points de pouvoir");
                break;
        }
    }

    public function switch_habilite_speciale($MonPersonnage) //Donne en fonction de la valeur d'une caracteristique sa norme
    {
        switch (true) {
            // $this->selected
            case $this->selected >= 96:
                $comp["comp_physique_developcorporel"] = 4;
                $MonPersonnage->set_comp($comp, "innee");
                return '<b>Peaux Robuste :</b> bonus innée <b>+20</b> Developpement Corporel';
                break;

            case $this->selected >= 91:
                $caracteristique["presence"] = 15;
                $MonPersonnage->set_caracteristique($caracteristique, "val");
                return '<b>Charismatique :</b> bonus de <b>+15</b> au valeur de Présence';
                break;
            
            case $this->selected >= 86:
                $MonPersonnage->set_bd_detail(10, 'special_1');
                $MonPersonnage->set_bo_detail(10, 'special_1');
                return '<b>Reaction éclair :</b> bonus de <b>+10</b> à la Base Defensif et Offensif';
                break;

            case $this->selected >= 81:
                $comp["comp_physique_perception"] = 3;
                $comp["comp_generale_pistage"] = 3;
                $MonPersonnage->set_comp($comp, "innee");
                return '<b>Très observateur :</b> bonus innée de <b>+15</b> à la Perception et au Pistage';
                break;
            
            case $this->selected >= 75:
                $comp["comp_manoeuvreetmouvement_sansarmure"] = 3;
                $comp["comp_manoeuvreetmouvement_cuirsouple"] = 3;
                $comp["comp_manoeuvreetmouvement_cuirrigide"] = 3;
                $comp["comp_manoeuvreetmouvement_cottedemaille"] = 3;
                $comp["comp_manoeuvreetmouvement_plate"] = 3;
                $MonPersonnage->set_comp($comp, "innee");
                return '<b>Expert en mouvement :</b> bonus spécial de <b>+15</b> pour toutes les manoeuvres';
                break;
            
            case $this->selected >= 71:
                $MonPersonnage->set_chance_obtenir_liste_sort_pourcentage(80);
                return '<b>Erudit en magie :</b> le personnage commence avec 4 points supplémentaire pour apprendre une liste de sort (20% par points)';
                break;
                
            case $this->selected >= 66:
                $MonPersonnage->set_jr_essence(15, "special_1");
                $MonPersonnage->set_jr_theurgie(15, "special_1");
                $MonPersonnage->set_jr_poison(15, "special_1");
                $MonPersonnage->set_jr_maladie(15, "special_1");
                return '<b>Resistance naturel :</b> bonus spécial de <b>+15</b> à tout les Jets de Résistance';
                break;

            case $this->selected >= 61:
                if(!$MonPersonnage->get_capacite_infravision())
                {
                    $MonPersonnage->set_capacite_infravision(1);
                    return "<b>Infravision :</b> capacité spéciale à voir les sources de chaleur dans l'obscurité ";
                }
                else{
                    throw new Exception("Vous avez déjà cette capacité spéciale !");
                }
                break;

            case $this->selected >= 56:
                if(!$MonPersonnage->get_capacite_vision_nocturne())
                {
                    $MonPersonnage->set_capacite_vision_nocturne(1);
                    return "<b>Vision Nocturne :</b> capacité spéciale à voir loin dans l'obscurité totale";
                }
                else{
                    throw new Exception("Vous avez déjà cette capacité spéciale !");
                }
                break;

            case $this->selected >= 51:
                $comp_random = $this->switch_return_random_comp();
                $comp[$comp_random] = 2;
                $MonPersonnage->set_comp($comp, "innee");
                return "<b>Trait naturel :</b> bonus innée de <b>+10</b> à une compétence aléatoire = " . $comp_random;
                break;
            
            case $this->selected >= 1:
                $comp_random = $this->switch_return_random_comp();
                $comp[$comp_random] = 1;
                $MonPersonnage->set_comp($comp, "innee");
                return "<b>Trait naturel :</b> bonus innée de <b>+5</b> à une compétence aléatoire = " . $comp_random;
                break;
            
            default:
                throw new Exception("Probleme dans le choix des habilités spéciales");
                break;
        }
    }

    public function switch_option_finance($MonPersonnage) //Donne en fonction de la valeur d'une caracteristique sa norme
    {
        $money_actuel = $MonPersonnage->get_money_flouze_biff();
        switch (true) {
            // $this->selected
            case $this->selected >= 100:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 2000000);
                return 'Vous avez gagné un montant de : <b> 200 po </b>';
                break;

            case $this->selected >= 98:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 1500000);
                return 'Vous avez gagné un montant de : <b> 150 po </b>';
                break;
            
            case $this->selected >= 95:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 1250000);
                return 'Vous avez gagné un montant de : <b> 125 po </b>';
                break;

            case $this->selected >= 91:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 1000000);
                return 'Vous avez gagné un montant de : <b> 100 po </b>';
                break;
            
            case $this->selected >= 86:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 800000);
                return 'Vous avez gagné un montant de : <b> 80 po </b>';
                break;
            
            case $this->selected >= 81:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 700000);
                return 'Vous avez gagné un montant de : <b> 70 po </b>';
                break;
                
            case $this->selected >= 76:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 600000);
                return 'Vous avez gagné un montant de : <b> 60 po </b>';
                break;

            case $this->selected >= 71:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 500000);
                return 'Vous avez gagné un montant de : <b> 50 po </b>';
                break;

            case $this->selected >= 66:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 400000);
                return 'Vous avez gagné un montant de : <b> 40 po </b>';
                break;
            case $this->selected >= 56:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 350000);
                return 'Vous avez gagné un montant de : <b> 35 po </b>';
                break;
            case $this->selected >= 46:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 300000);
                return 'Vous avez gagné un montant de : <b> 30 po </b>';
                break;

            case $this->selected >= 36:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 200000);
                return 'Vous avez gagné un montant de : <b> 20 po </b>';
                break;
            
            case $this->selected >= 26:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 150000);
                return 'Vous avez gagné un montant de : <b> 15 po </b>';
                break;
            
            case $this->selected >= 16:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 100000);
                return 'Vous avez gagné un montant de : <b> 10 po </b>';
                break;
            
            case $this->selected >= 6:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 50000);
                return 'Vous avez gagné un montant de : <b> 5 po </b>';
                break;
            
            case $this->selected >= 3:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 20000);
                return 'Vous avez gagné un montant de : <b> 2 po </b>';
                break;
            
            case $this->selected >= 1:
                $MonPersonnage->set_money_flouze_biff($money_actuel + 10000);
                return 'Vous avez gagné un montant de : <b> 1 po </b>';
                break;
            
            default:
                throw new Exception("Probleme dans le choix des habilités spéciales");
                break;
        }
    }

    public function switch_return_random_comp() //Donne en fonction de la valeur d'une caracteristique sa norme
    {
        $random = random_int(1, 24);
        switch ($random) {
            case 1 : 
                return "comp_manoeuvreetmouvement_sansarmure";
                break;

            case 2 : 
                return "comp_manoeuvreetmouvement_cuirsouple";
                break;

            case 3 : 
                return "comp_manoeuvreetmouvement_cuirrigide";
                break;

            case 4 : 
                return "comp_manoeuvreetmouvement_cottedemaille";
                break;

            case 5 : 
                return "comp_manoeuvreetmouvement_plate";
                break;

            case 6 : 
                return "comp_arme_tranchantunemain";
                break;

            case 7 : 
                return "comp_arme_contondantunemain";
                break;

            case 8 : 
                return "comp_arme_deuxmains";
                break;

            case 9 : 
                return "comp_arme_armedelance";
                break;

            case 10 : 
                return "comp_arme_projectile";
                break;

            case 11 : 
                return "comp_arme_armedhast";
                break;

            case 12 : 
                return "comp_generale_escalade";
                break;

            case 13 : 
                return "comp_generale_equitation";
                break;

            case 14 : 
                return "comp_generale_natation";
                break;

            case 15 : 
                return "comp_generale_pistage";
                break;

            case 16 : 
                return "comp_subterfuge_embuscade";
                break;

            case 17 : 
                return "comp_subterfuge_filatdissim";
                break;

            case 18 : 
                return "comp_subterfuge_crochetage";
                break;

            case 19 : 
                return "comp_subterfuge_desarmementdepiege";
                break;

            case 20 : 
                return "comp_magie_lecturederune";
                break;

            case 21 : 
                return "comp_magie_utilisationdobjet";
                break;

            case 22 : 
                return "comp_magie_directiondesort";
                break;

            case 23 : 
                return "comp_physique_developcorporel";
                break;

            case 24 : 
                return "comp_physique_perception";
                break;

            default:
                throw new Exception("Probleme pour return une compétence random");
                break;
        }
    }

}