<?php

class Personnage extends Creature {
    
    private $is_pj;
    
    class Caracteristique {
        private $force = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
        private int $total_force;

        private $agilite = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
        private $constitution = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
        private $intelligence = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
        private $intuition = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
        private $presence = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
        private $apparence = array('total' => '');

        // trait caracteristique {
        //     private $val;
        //     private $norme;
        //     private $race;
        //     private $total;
            
        // }

        public function __construct(private $force, private $agilite, private $constitution, private $intelligence, private $intuition, private $presence, private $apparence)
        {
            //SELECT * FROM caracteristique
            //private $force = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
            //private $agilite = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
            //private $constitution = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
            //private $intelligence = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
            //private $intuition = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
            //private $presence = array('val' => '', 'norme' => '', 'race' => '', 'total' => '');
            //private $apparence = array('total' => '');
        }

        public function creation_caracteristique() {
            //creer un new array

            //faire 6 jets, sans comptabilisé les scors en dessous de 20

            //trier le tableau du plus grand au plus petit

            //return le tableau
        }

        public function set_caracteristique_val(int $force, int $agilite, int $constitution, int $intelligence, int $intuition, int $presence, int $apparence) {
            //insert into caracteristique set val_force = $force... WHERE nom = $nom
            calcul_bonus_norm('force', $force);
        }

        public function set_bonus_norm(int $caracteristique, int $valeur){
            //norme =0;
            //switch valeur = 1 => norme = -25
            //       valeur = 2 => norme = -20
            //       ....

            //insert into caracteristique set norme = $norme WHERE nom = $nom;
        }

        public function set_total(int $caracteristique, int $valeur){
            //SELECT * FROM caract WHERE nom = nom
            //foreach total = val + bonus + race
            //insert total
        }

    }

    class Langage {
        private $adûnaic = 0;
        private $apysaic = 0;
        private $atliduk = 0;
        private $haradaic = 0;
        private $khuzdul = 0;
        private $kuduk = 0;
        private $labba = 0;
        private $logathig = 0;
        private $nahaiduk = 0;
        private $noir_parler = 0;
        private $orque = 0;
        private $pûkael = 0;
        private $quenya = 0;
        private $rohirric = 0;
        private $sindarin = 0;
        private $sylvain = 0;
        private $umitic = 0;
        private $varadja = 0;
        private $waildyth = 0;
        private $westron_Langage_commun = 0;

        public function __construct(private $adûnaic, private $apysaic......)
        {
            //SELECT * FROM langage
            //private $adûnaic = ...
            //...
        }

        public function set_langage($langage, $degre){
            //UPDATE langage FROM langage VALUES ($degre)  
        }

        public function get_langage()
        {
            //select * from langage
            // return langage
        }
    }
    
    class Competence {
        //Manoeuvres et mouvements
        private $sans_armure = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $cuir_souple = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $cuir_rigide = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $cotte_de_mailles = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $plates = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');

        //Armes
        private $tranchant_une_main = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $contondant_une_main = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $arme_de_lance = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $projectile = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $arme_dhast = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        
        //Compétences Générales
        private $escalade = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $equitation = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $natation = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $pistage = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');

        //Subterfuges
        private $embuscade = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $filat_dissim = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $crochetage = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $desarmement_piege = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');

        //Compétences de magie
        private $lecture_de_runes = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $utilisation_objets = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $direction_de_sorts = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');

        //Physique
        private $develop_corporel = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
        private $perception = array('degré' => '', 'carac' => '', 'profession' => '', 'objet' => '', 'special' => '',  'total' => '');
    }
    
    Class Identite {
        public $nom;
        private $race;
        private $taille;
        private $age;
        private $poids;
        private $cheveux;
        private $yeux;
        private $signe_particulier;
        private $profession;
        private $royaume;
        private $point_de_pouvoir;
        private $point_experience;
        private $penalite_encombrement;

        public function set_profession($profession){
            //INSERT INTO profession SET profession = $profession
        }

        public function get_profession(){
            //SELECT FROM profession/identite
            //return profession
        }

        public function set_caracteristique_race_jet_resistance(int $race) {
            switch ($race) {
                case 'hobbit':
                    $caracteristique_race = array(-20,15,15,0,-5,-5);
                    $jet_resistance = array(50,20,30,15);
                    $comp = array(1,0,0,0,0,0,0,2,2,0,2,0,0,0,5,1,1,0,0,2,4);
                    $chance_obtenir_sort = 0; //0*20%
                    $nb_degre_langage_additionnel = 3;
                    $nb_point_histoire = 5;
                    set_langage('kuduk',5);
                    set_langage('westron',5);
                    break;
                case 'umli':
                    $caracteristique_race = array(5,0,10,0,-5,-5);
                    $jet_resistance = array(20,0,5,5);
                    break;
                case 'nain':
                    $caracteristique_race = array(5,-5,15,0,-5,-5);
                    $jet_resistance = array(40,0,10,10);
                    $comp = array(1,0,1,3,0,4,0,1,0,0,1,0,0,0,0,1,1,0,0,3,2);
                    $chance_obtenir_sort = 3; //
                    $nb_degre_langage_additionnel = 4;
                    $nb_point_histoire = 4;
                    set_langage('khuzdul',5);
                    set_langage('sindarin',3);
                    set_langage('westron', 5);
                    break;
                case 'wose':
                    $caracteristique_race = array(0,0,5,0,0,-5);
                    $jet_resistance = array(20,0,0,0);
                    $comp = array(1,3,0,0,2,0,0,4,0,1,3,0,2,2,4,0,0,0,0,3,1);
                    $chance_obtenir_sort = 5; //
                    $nb_degre_langage_additionnel = 2;
                    $nb_point_histoire = 5;
                    set_langage('pukael',5);
                    set_langage('westron', 2);
                    break;
                case 'humain':
                    $caracteristique_race = array(5,0,0,0,0,0);
                    $jet_resistance = array(0,0,0,0);
                    break;
                case 'dunedain':
                    $caracteristique_race = array(5,0,10,0,0,5);
                    $jet_resistance = array(0,0,5,5);
                    break;                    
                case 'semi-elfe':
                    $caracteristique_race = array(5,5,5,0,0,5);
                    $jet_resistance = array(0,0,5,50);
                    break;
                case 'elfe_sylvain':
                    $caracteristique_race = array(0,10,0,0,5,5);
                    $jet_resistance = array(0,0,10,100);
                    break;
                case 'elfe_sindar':
                    $caracteristique_race = array(0,10,5,0,5,10);
                    $jet_resistance = array(0,0,10,100);
                    break;
                case 'elfe_noldor':
                    $caracteristique_race = array(0,15,10,5,5,15);
                    $jet_resistance = array(0,0,10,100);
                    $comp = array(1,0,0,0,1,0,0,0,1,0,0,1,2,0,2,0,0,2,1,1,3);
                    $chance_obtenir_sort = 40; //
                    $nb_degre_langage_additionnel = 10;
                    $nb_point_histoire = 2;
                    set_langage('adunaic', 3);
                    set_langage('quenya', 5);
                    set_langage('sindarin', 5);
                    set_langage('westron', 5);
                    break;
                    
                    default:
                    $caracteristique_race = array(0,0,0,0,0,0);
                    $jet_resistance = array(0,0,0,0);
                    break;
            }
            //INSERT INTO caracteristique set 
            //foreach caracteristique race
            //where nom = nom

            //INSERT INTO resistance set 
            //foreach jet_resistance
            //where nom = nom
        }
    }

    Class Inventaire {
        private $arme;
        private $bouclier;
        private $casque;
        private $prot_bras;
        private $prot_jambe;
        private $piece_or;
        private $piece_argent;
        private $piece_cuivre;
    }

    Class Resistance {
        private $command_et_influence;
        private $resistance_essence;
        private $resistance_theurgie;
        private $resistance_poison;
        private $resistance_maladie;
    }

}


?>