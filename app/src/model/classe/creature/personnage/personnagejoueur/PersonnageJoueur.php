<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\Personnage;
Use App\Model\Traits\Personnage\Arme;
Use App\Model\Traits\Personnage\Armure;
Use App\Model\Traits\Personnage\Capacite;
Use App\Model\Traits\Personnage\Sort;
Use App\Model\Classe\Factory\FactoryPersonnage;
Use Exception;

class PersonnageJoueur extends Personnage{
    // Use trait : 
    // Inventaire
    Use Arme, Armure, Capacite, Sort;

    // Endroit ou il se trouve
    protected $map_actuelle = 1;

    //Identité :
    protected $identite_race;
    protected $identite_taille;
    protected $identite_age;
    protected $identite_poids;
    protected $identite_cheveux;
    protected $identite_yeux;
    protected $identite_signeparticulier;
    protected $identite_penalitedencombrement = 0;

    // //Argent du joueur 
    protected $money_flouze_biff = 20000;

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
    public function set_money_flouze_biff(int $val)
    {
        $this->money_flouze_biff = $val;
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

    public function get_money_flouze_biff()
    {
        return $this->money_flouze_biff;
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

}