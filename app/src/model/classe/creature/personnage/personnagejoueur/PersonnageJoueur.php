<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\Personnage;
Use App\Model\Traits\Personnage\Arme;
Use App\Model\Traits\Personnage\Armure;
Use App\Model\Traits\Personnage\Capacite;
Use App\Model\Traits\Personnage\Sort;
Use App\Model\Traits\Personnage\Langue;
Use App\Model\Classe\Factory\FactoryPersonnage;
Use App\Controllers\ConnexionBdd\Bdd as Bdd;
Use Exception;

class PersonnageJoueur extends Personnage{
    // Use trait : 
    // Inventaire
    Use Arme, Armure, Capacite, Langue;

    // Endroit ou il se trouve
    protected $id_carte_actuelle = 1;

    //Identité :
    protected $identite_race;
    protected $identite_taille;
    protected $identite_age;
    protected $identite_poids;
    protected $identite_cheveux;
    protected $identite_yeux;
    protected $identite_signeparticulier = '';
    protected $penalitedencombrement = 0;

    // //Argent du joueur 
    protected $argent = 20000;

    //Resistance du joueur
    protected $jr_essence_total = 0;
    protected $jr_theurgie_total = 0;
    protected $jr_poison_total = 0;
    protected $jr_maladie_total = 0;
        
    //Points de pouvoir
    protected $point_de_pouvoir_max = 0;
    protected $point_de_pouvoir_actuelle = 0;

    //Liste de Sort
    protected $liste_sort_acquis; //array avec des listes ex : = [les voies du froid, les liaisons supérieurs, ...]
    protected $liste_sort_apprentissage; //array avec des listes et des proba ex : = [les voies du froid => 40, les liaisons supérieurs => 3, ...]


    public function __construct()
    {
        parent::__construct();
    }

    public function set_point_de_pouvoir_max_carac()
    {
        if($this->get_caracteristique_intelligence('val') >= $this->get_caracteristique_intuition('val'))
        {
            $val = new FactoryPersonnage($this->caracteristique_intelligence_total);
            $this->set_point_de_pouvoir_max($val->switch_calcul_point_de_pouvoir($this->get_caracteristique_intelligence('val')) * $this->get_comp_magie_directiondesort_total('niveau'));
            $this->set_point_de_pouvoir_actuelle($this->point_de_pouvoir_max);
        }
        else
        {
            $val = new FactoryPersonnage($this->caracteristique_intuition_total);
            $this->set_point_de_pouvoir_max(($val->switch_calcul_point_de_pouvoir($this->get_caracteristique_intuition('val'))) * $this->get_comp_magie_directiondesort_total('niveau'));
            $this->set_point_de_pouvoir_actuelle($this->point_de_pouvoir_max);
        }  
    }

    //SETTER ET GETTER
    //SETTER
    //IDENTITE
    public function set_identite_race(string $val)
    {
        $this->identite_race = $val;
    }
    public function set_identite_taille(int $val)
    {
        $this->identite_taille = $val;
    }
    public function set_identite_age(int $val)
    {
        $this->identite_age = $val;
    }
    public function set_identite_poids(int $val)
    {
        $this->identite_poids = $val;
    }
    public function set_identite_cheveux(string $val)
    {
        $this->identite_cheveux = $val;
    }
    public function set_identite_yeux(string $val)
    {
        $this->identite_yeux = $val;
    }
    public function set_identite_signeparticulier(string $val)
    {
        $this->identite_signeparticulier = $val;
    }
    public function set_penalitedencombrement(int $val)
    {
        $this->penalitedencombrement = $val;
    }
    public function set_id_carte_actuelle(int $val)
    {
        $this->id_carte_actuelle = $val;

        $this->new_connection();
        $array['id_carte_actuelle'] = $val;
        $this->update_personnage_since_array("personnage_identite", $array);
    }
    public function set_jr_essence_total(int $val)
    {
        $this->jr_essence_total = $val;
    }
    public function set_jr_theurgie_total(int $val)
    {
        $this->jr_theurgie_total = $val;
    }
    public function set_jr_poison_total(int $val)
    {
        $this->jr_poison_total = $val;
    }
    public function set_jr_maladie_total(int $val)
    {
        $this->jr_maladie_total = $val;
    }

    //PV
    public function set_point_de_vie_max_personnage_joueur()
    {
        $this->set_point_de_vie_max($this->comp_physique_developcorporel_total['val']);
        $this->set_point_de_vie($this->comp_physique_developcorporel_total['val']);
    }

    //POINT DE POUVOIR
    public function set_point_de_pouvoir_max(int $val)
    {
        $this->point_de_pouvoir_max = $val;
    }

    public function set_point_de_pouvoir_actuelle(int $val)
    {
        $this->point_de_pouvoir_actuelle = $val;
    }

    //ARGENT
    public function set_argent(int $val)
    {
        $this->argent = $val;
        $this->new_connection();
        $this->update_personnage_since_array('personnage_identite', ['argent' => $val]);
    }

    //SORT
    public function set_liste_sort_acquis(string $key, int $val = 1)
    {
        if($this->get_liste_sort_acquis($key) === null)
        {
            $this->liste_sort_acquis[$key] = $val;
        }
        else
        {
            throw new Exception("Vous avez déjà cette liste de sort, vous ne pouvez pas la reapprendre !");
        }
    }

    public function set_liste_sort_apprentissage(string $key, int $val) //Si la liste n'existe pas, alors on la rajoute avec la valeur d'apprentissage, si elle existe, on incremente la valeur d'apprentissage
    {
        if($this->get_liste_sort_apprentissage($key) !== null)
        {
            $temp = $this->get_liste_sort_apprentissage($key) + $val;
            ($temp > 100) ? $temp = 100 : '';
            $this->liste_sort_apprentissage[$key] = $temp;
        }
        else
        {
            $this->liste_sort_apprentissage[$key] = $val;
        }
    }


    //GETTER
    public function get_identite_race()
    {
        return $this->identite_race;
    }
    public function get_identite_taille()
    {
        return $this->identite_taille;
    }
    public function get_identite_age()
    {
        return $this->identite_age;
    }
    public function get_identite_poids()
    {
        return $this->identite_poids;
    }
    public function get_identite_cheveux()
    {
        return $this->identite_cheveux;
    }
    public function get_identite_yeux()
    {
        return $this->identite_yeux;
    }
    public function get_identite_signeparticulier()
    {
        return $this->identite_signeparticulier;
    }
    public function get_penalitedencombrement()
    {
        return $this->penalitedencombrement;
    }

    public function get_argent()
    {
        return $this->argent;
    }

    public function get_id_carte_actuelle()
    {
        return $this->id_carte_actuelle;
    }

    public function get_liste_sort_acquis_like_array()
    {
        return $this->liste_sort_acquis;
    }
    public function get_liste_sort_apprentissage_like_array()
    {
        return $this->liste_sort_apprentissage;
    }

    public function get_liste_sort_acquis(string $key) //Si elle existe je la return, sinon je return null
    {
        if(isset($this->liste_sort_acquis[$key])){
            return $this->liste_sort_acquis[$key];
        }
        else {
            return null;
        }
    }

    public function get_liste_sort_apprentissage(string $key) //Si elle existe dans l'apprentissage je la return, sinon je return null
    {
        if($this->get_liste_sort_acquis($key) !== null){//Si elle existe déjà dans les sorts acquis, on ne peux pas l'apprendre
            throw new Exception("Vous avez déjà cette liste de sort, vous ne pouvez pas la reapprendre !");
        }

        if(isset($this->liste_sort_apprentissage[$key])){
            return $this->liste_sort_apprentissage[$key];
        }
        else {
            return null;
        }
    }

    public function equiper($type_objet, $id_objet)
    {
        switch ($type_objet) {
            case 'arme':
                $this->equiper_arme($id_objet);
                break;
            case 'armure':
                $this->equiper_armure($id_objet);
                break;
            // case 'accessoire':
            //     # code...
            //     break;
            default:
                # code...
                break;
        }
    }

    public function equiper_arme($id_objet)
    {
        $this->new_connection();
        $where['id'] = $id_objet;

        $row_objet = $this->select_all('personnage_arme', $where);
        if($row_objet[0]['id_personnage'] == $_SESSION['id_personnage'])
        {
            if($this->get_arme_id() != NULL)
            {
                $this->desequiper_arme($this->get_arme_id());
            }
            $this->set_arme($row_objet[0]);
            $this->update_since_array('personnage_arme', ['equipee' => 1], $where);
        }
    }

    public function equiper_armure($id_objet)
    {
        $this->new_connection();
        $where['id'] = $id_objet;

        $row_objet = $this->select_all('personnage_armure', $where);
        if($row_objet[0]['id_personnage'] == $_SESSION['id_personnage'])
        {
            $methode_check_id_already_equiped = 'get_armure_'. $row_objet[0]['type'] .'_id';
            if($this->$methode_check_id_already_equiped() != NULL)
            {
                $this->desequiper_armure($this->$methode_check_id_already_equiped());
            }
            $this->set_armure($row_objet[0]);
            $this->update_since_array('personnage_armure', ['equipee' => 1], $where);
        }   
    }


    public function desequiper($type_objet, $id_objet)
    {
        switch ($type_objet) {
            case 'arme':
                $this->desequiper_arme($id_objet);
                break;
            case 'armure':
                $this->desequiper_armure($id_objet);
                break;
            // case 'accessoire':
            //     # code...
            //     break;
            default:
                # code...
                break;
        }
    }

    public function desequiper_arme($id_objet)
    {
        $this->new_connection();
        $where['id'] = $id_objet;

        $row_objet = $this->select_all('personnage_arme', $where);
        if($row_objet[0]['id_personnage'] == $_SESSION['id_personnage'])
        {
            $this->update_since_array('personnage_arme', ['equipee' => 0], $where);
            $this->set_arme_by_default();
        }
    }

    public function desequiper_armure($id_objet)
    {
        $this->new_connection();
        $where['id'] = $id_objet;

        $row_objet = $this->select_all('personnage_armure', $where);
        if($row_objet[0]['id_personnage'] == $_SESSION['id_personnage'])
        {
            $methode_desequipe = 'set_armure_'. $row_objet[0]['type'] .'_by_default';
            (method_exists($this, $methode_desequipe)) ? $this->$methode_desequipe() : '';

            $this->update_since_array('personnage_armure', ['equipee' => 0], $where);
        }
    }

    public function insert_in_inventaire($type_objet, $row_objet) 
    {
        $this->new_connection();
        $table_insert = 'personnage_'.$type_objet;
        $this->insert_since_array($table_insert, $row_objet);

        //RECALCULER L ENCOMBREMENT
    }


    public function delete_in_inventaire($type_objet, $id_objet) 
    {
        $this->new_connection();
        $table_delete = 'personnage_'.$type_objet;
        $this->delete_since_id($table_delete, $id_objet);

        //RECALCULER L ENCOMBREMENT
    }

    public function get_inventaire() 
    {
        $this->new_connection();
        $inventaire_arme = [];
        $inventaire_arme[] = $this->select_personnage_all('personnage_arme');

        $inventaire_armure = [];
        $inventaire_armure[] = $this->select_personnage_all('personnage_armure');

        $inventaire_objet = [];
        $inventaire_objet[] = $this->select_personnage_all('personnage_objet');

        $inventaire = [];
        $inventaire['arme'] = $inventaire_arme[0];
        $inventaire['armure'] = $inventaire_armure[0];
        $inventaire['objet'] = $inventaire_objet[0];
        
        return $inventaire;
    }

    //BDD
    //INSERT
    public function insert_personnage_joueur_identite() 
    {
        $sql = "INSERT INTO `personnage_identite` (`nom`, `race`, `taille`, `age`, `poids`, `cheveux`, `yeux`, `signeparticulier`, `id_carte_actuelle`, `argent`, `point_de_pouvoir`, `point_de_vie`, `jr_essence_total`, `jr_theurgie_total`, `jr_poison_total`, `jr_maladie_total`) 
        VALUES ('". $this->bdd->real_escape_string($this->nom) ."', '". $this->bdd->real_escape_string($this->identite_race) ."', ". $this->bdd->real_escape_string($this->identite_taille) .", ". $this->bdd->real_escape_string($this->identite_age) .", ". $this->bdd->real_escape_string($this->identite_poids) .", '". $this->bdd->real_escape_string($this->identite_cheveux) ."', '". $this->bdd->real_escape_string($this->identite_yeux) ."', '". $this->bdd->real_escape_string($this->identite_signeparticulier) ."', ". $this->bdd->real_escape_string($this->id_carte_actuelle) .", ". $this->bdd->real_escape_string($this->argent) .", ". $this->bdd->real_escape_string($this->point_de_pouvoir_actuelle) .", ". $this->bdd->real_escape_string($this->point_de_vie) .", ". $this->bdd->real_escape_string($this->jr_essence_total) .", ". $this->bdd->real_escape_string($this->jr_theurgie_total) .", ". $this->bdd->real_escape_string($this->jr_poison_total) .", ". $this->bdd->real_escape_string($this->jr_maladie_total) .");";
        $this->bdd->query($sql);
        $last_id = $this->bdd->insert_id;
        return $last_id;
    }

    public function insert_personnage_joueur_complementaire() 
    {
        $sql = "INSERT INTO `personnage_complementaire` (`id_personnage`, `point_de_vie_max`, `cc_point_de_vie`, `point_de_pouvoir_max`, `cc_point_de_pouvoir`, `base_defensif`, `base_offensif`, `type_armure`, `type_arme`) 
        VALUES ('". $this->bdd->real_escape_string($this->id) ."', '". $this->bdd->real_escape_string($this->point_de_vie_max) ."', '". $this->bdd->real_escape_string($this->point_de_vie) ."', '". $this->bdd->real_escape_string($this->point_de_pouvoir_max) ."', '". $this->bdd->real_escape_string($this->point_de_pouvoir_actuelle) ."',
        '". $this->bdd->real_escape_string($this->base_defensif) ."', '". $this->bdd->real_escape_string($this->base_offensif) ."', '". $this->bdd->real_escape_string($this->type_armure) ."', '". $this->bdd->real_escape_string($this->type_arme) ."');";
        $this->bdd->query($sql);
    }

    public function insert_personnage_liste_sort()
    {
        if(isset($this->liste_sort_acquis))
        {
            foreach ($this->liste_sort_acquis as $key => $value) {
                $liste['id_personnage'] = $this->id;
                $liste['liste'] = $key;
                $liste['acquis'] = 1;
    
                $this->insert_since_array("personnage_liste_sort", $liste);
            }
        }

        if(isset($this->liste_sort_apprentissage))
        {
            foreach ($this->liste_sort_apprentissage as $key => $value) {
                $liste['id_personnage'] = $this->id;
                $liste['liste'] = $key;
                $liste['acquis'] = 0;
                $liste['apprentissage'] = $value;
    
                $this->insert_since_array("personnage_liste_sort", $liste);
            }
        }
    }


    
    public function hydrate_mon_personnage($id_personnage)
    {
        $this->type_creature = 1;

        //identite
        $row = $this->select_personnage_all("personnage_identite");
        $this->id = $row[0]['id'];
        $this->hydrate_identite_mon_personnage($row[0]);
        unset($row);unset($where);

        //complementaire
        $row = $this->select_personnage_all("personnage_complementaire");
        $this->hydrate($row[0]);
        unset($row);

        //langue
        $row = $this->select_personnage_all("personnage_langue");
        $this->hydrate($row[0], "langue_");
        unset($row);

        //capacite
        $row = $this->select_personnage_all("personnage_capacite");
        $this->hydrate($row[0]);
        unset($row);

        //competence
        $row = $this->select_personnage_all("personnage_competence");
        $this->hydrate_competence_mon_personnage($row[0]);
        unset($row);

        //caracteristique
        $row = $this->select_personnage_all("personnage_caracteristique");
        $this->hydrate($row[0]);
        unset($row);

        //liste de sort
        $row = $this->select_personnage_all("personnage_liste_sort");
        $this->hydrate_liste_sort_mon_personnage($row);
        unset($row);

        $where['id_personnage'] = $id_personnage;
        $where['equipee'] = '1';

        //arme
        $row = $this->select_all("personnage_arme", $where);
        $this->equiper_arme($row[0]['id']);
        unset($row);

        //armure
        $row = $this->select_all("personnage_armure", $where);
        foreach ($row as $key => $value) {
            $this->equiper_armure($value['id']); 
        }
        unset($row);

        //accessoire quand il y en aura
    }

    private function hydrate_identite_mon_personnage($row)
    {
        $this->nom = $row['nom'];
        foreach ($row as $key => $value){
            $methode = 'set_identite_'.$key;
            if (method_exists($this, $methode))
            {
                $this->$methode($value);
            }
            else{
                $methode = 'set_'.$key;
                if (method_exists($this, $methode))
                {
                    $this->$methode($value);
                }
            }
        }
        $this->point_de_pouvoir_actuelle = $row['point_de_pouvoir'];
    }

    private function hydrate_competence_mon_personnage($row)
    {
        unset($row['id'], $row['id_personnage']);
        foreach ($row as $key => $value){
            $index = strrchr($key, '_');
            $variable = substr($key, 0, -strlen($index));
            $index = substr($index, 1);
            $methode = 'set_'.$variable;
            if (method_exists($this, $methode))
            {
                $this->$methode($value, $index);
            }
        }
    }

    private function hydrate_liste_sort_mon_personnage($row)
    {
        foreach ($row as $key => $value){
            unset($row[$key]['id'], $row[$key]['id_personnage']);
            if($value['acquis'] == 1)
            {
                $this->liste_sort_acquis[] = $value['liste'];
            }
            if($value['acquis'] == 0)
            {
                $this->liste_sort_apprentissage[$value['liste']] = $value['apprentissage'];
            }
        }
    }

    private function hydrate($row, $prefixe = "")
    {
        foreach ($row as $key => $value){
            $methode = 'set_'.$prefixe.$key;
            if (method_exists($this, $methode))
            {
                $this->$methode($value);
            }
        }
    }
}