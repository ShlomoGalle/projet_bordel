<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Arme {

    // propriété : 
    protected $arme_id  = NULL;
    protected $arme_name  = NULL;
    protected $arme_abreviation  = NULL;
    //arme_type déjà dans - class créature
    
    protected $arme_portee = 1.5;
    protected $arme_maladresse = NULL;
    protected $arme_coup_crit_primaire = NULL;
    protected $arme_coup_crit_secondaire = NULL;
    protected $arme_modificateur_comp = NULL;
    protected $arme_modificateur_val = NULL;
    protected $arme_enchantement_val = 0;
    protected $arme_utilise_avec_bouclier = 0;
    

    public function __construct()
    {
    }

    //SETTER
    public function set_arme($array)
    {
        foreach ($array as $key => $value) {
            $methode = 'set_arme_'.$key;
            if(method_exists($this, $methode))
            {
                $this->$methode($value);
            }
        }

        $this->set_type_arme($array['type']);
    }

    public function set_arme_id($val)
    {
        $this->arme_id = $val;
    }

    public function set_arme_name($val)
    {
        $this->arme_name = $val;
    }

    public function set_arme_abreviation($val)
    {
        $this->arme_abreviation = $val;
    }

    public function set_arme_portee($val)
    {
        $this->arme_portee = $val;
    }

    public function set_arme_maladresse($val)
    {
        $this->arme_maladresse = $val;
    }

    public function set_arme_coup_crit_primaire($val)
    {
        $this->arme_coup_crit_primaire = $val;
    }

    public function set_arme_coup_crit_secondaire($val)
    {
        $this->arme_coup_crit_secondaire = $val;
    }

    public function set_arme_modificateur_comp($val)
    {
        $this->arme_modificateur_comp = $val;
    }

    public function set_arme_modificateur_val($val)
    {
        $this->arme_modificateur_val = $val;
    }

    public function set_arme_enchantement_val($val)
    {
        $this->arme_enchantement_val = $val;
    }

    public function set_arme_utilise_avec_bouclier($val)
    {
        $this->arme_utilise_avec_bouclier = $val;
    }

    public function set_arme_by_default()
    {
        $this->arme_id = NULL;
        $this->arme_name = NULL;
        $this->type_arme = NULL;
        $this->arme_abreviation = NULL;
        $this->arme_portee = 1.5;
        $this->arme_maladresse = NULL;
        $this->arme_coup_crit_primaire = NULL;
        $this->arme_coup_crit_secondaire = NULL;
        $this->arme_modificateur_comp = NULL;
        $this->arme_modificateur_val = NULL;
        $this->arme_enchantement_val = 0;
        $this->arme_utilise_avec_bouclier = 0;
    }

    //GETTER
    public function get_arme_id()
    {
        return $this->arme_id;
    }
    
    public function get_arme_name()
    {
        return $this->arme_name;
    }

    public function get_arme_abreviation()
    {
        return $this->arme_abreviation;
    }

    public function get_arme_portee()
    {
        return $this->arme_portee;
    }

    public function get_arme_maladresse()
    {
        return $this->arme_maladresse;
    }

    public function get_arme_coup_crit_primaire()
    {
        return $this->arme_coup_crit_primaire;
    }

    public function get_arme_coup_crit_secondaire()
    {
        return $this->arme_coup_crit_secondaire;
    }

    public function get_arme_modificateur_comp()
    {
        return $this->arme_modificateur_comp;
    }

    public function get_arme_modificateur_val()
    {
        return $this->arme_modificateur_val;
    }

    public function get_arme_enchantement_val()
    {
        return $this->arme_enchantement_val;
    }

    public function get_arme_utilise_avec_bouclier()
    {
        return $this->arme_utilise_avec_bouclier;
    }

}