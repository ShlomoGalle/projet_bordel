<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Armure {

    // propriété : 
    protected $armure_id  = NULL;
    protected $armure_name  = NULL;
    protected $armure_type  = NULL;
    protected $armure_materiaux  = NULL;
    protected $armure_enchantement_val  = NULL;
    //armure_type déjà dans - class créature
    
    protected $armure_bouclier_id = NULL;
    protected $armure_jambiere_id  = NULL;
    protected $armure_brassiere_id  = NULL;
    protected $armure_casque_id  = NULL;
    
    protected $armure_bouclier_name = NULL;
    protected $armure_jambiere_name  = NULL;
    protected $armure_brassiere_name  = NULL;
    protected $armure_casque_name  = NULL;

    protected $armure_bouclier_type = NULL;
    protected $armure_jambiere_type  = NULL;
    protected $armure_brassiere_type  = NULL;
    protected $armure_casque_type  = NULL;

    protected $armure_bouclier_modificateur_comp = NULL;
    protected $armure_jambiere_modificateur_comp  = NULL;
    protected $armure_brassiere_modificateur_comp  = NULL;
    protected $armure_casque_modificateur_comp  = NULL;

    protected $armure_bouclier_modificateur_val = NULL;
    protected $armure_jambiere_modificateur_val  = NULL;
    protected $armure_brassiere_modificateur_val  = NULL;
    protected $armure_casque_modificateur_val  = NULL;

    protected $armure_bouclier_materiaux = NULL;
    protected $armure_jambiere_materiaux  = NULL;
    protected $armure_brassiere_materiaux  = NULL;
    protected $armure_casque_materiaux  = NULL;

    protected $armure_bouclier_enchantement_val = NULL;
    protected $armure_jambiere_enchantement_val  = NULL;
    protected $armure_brassiere_enchantement_val  = NULL;
    protected $armure_casque_enchantement_val  = NULL;

    public function __construct()
    {
    }

    //SETTER
    public function set_armure($array)
    {
        foreach ($array as $key => $value) {

            $methode = 'set_armure_'.$array['type'].'_'.$key;
            if(method_exists($this, $methode))
            {
                $this->$methode($value);
            }
        }
    }
    
    public function set_armure_armure_id($val)
    {
        $this->armure_id = $val;
    }

    public function set_armure_armure_name($val)
    {
        $this->armure_name = $val;
    }

    public function set_armure_armure_type($val)
    {
        $this->armure_type = $val;
    }

    public function set_armure_armure_materiaux($val)
    {
        $this->armure_materiaux = $val;
    }

    public function set_armure_armure_enchantement_val($val)
    {
        $this->armure_enchantement_val = $val;
    }

    public function set_armure_bouclier_id($val)
    {
        $this->armure_bouclier_id = $val;
    }

    public function set_armure_jambiere_id($val)
    {
        $this->armure_jambiere_id = $val;
    }

    public function set_armure_brassiere_id($val)
    {
        $this->armure_brassiere_id = $val;
    }

    public function set_armure_casque_id($val)
    {
        $this->armure_casque_id = $val;
    }

    public function set_armure_bouclier_name($val)
    {
        $this->armure_bouclier_name = $val;
    }

    public function set_armure_jambiere_name($val)
    {
        $this->armure_jambiere_name = $val;
    }

    public function set_armure_brassiere_name($val)
    {
        $this->armure_brassiere_name = $val;
    }

    public function set_armure_casque_name($val)
    {
        $this->armure_casque_name = $val;
    }

    public function set_armure_bouclier_type($val)
    {
        $this->armure_bouclier_type = $val;
    }

    public function set_armure_jambiere_type($val)
    {
        $this->armure_jambiere_type = $val;
    }

    public function set_armure_brassiere_type($val)
    {
        $this->armure_brassiere_type = $val;
    }

    public function set_armure_casque_type($val)
    {
        $this->armure_casque_type = $val;
    }

    public function set_armure_bouclier_modificateur_comp($val)
    {
        $this->armure_bouclier_modificateur_comp = $val;
    }

    public function set_armure_jambiere_modificateur_comp($val)
    {
        $this->armure_jambiere_modificateur_comp = $val;
    }

    public function set_armure_brassiere_modificateur_comp($val)
    {
        $this->armure_brassiere_modificateur_comp = $val;
    }

    public function set_armure_casque_modificateur_comp($val)
    {
        $this->armure_casque_modificateur_comp = $val;
    }

    public function set_armure_bouclier_modificateur_val($val)
    {
        $this->armure_bouclier_modificateur_val = $val;
    }

    public function set_armure_jambiere_modificateur_val($val)
    {
        $this->armure_jambiere_modificateur_val = $val;
    }

    public function set_armure_brassiere_modificateur_val($val)
    {
        $this->armure_brassiere_modificateur_val = $val;
    }

    public function set_armure_casque_modificateur_val($val)
    {
        $this->armure_casque_modificateur_val = $val;
    }

    public function set_armure_bouclier_materiaux($val)
    {
        $this->armure_bouclier_materiaux = $val;
    }

    public function set_armure_jambiere_materiaux($val)
    {
        $this->armure_jambiere_materiaux = $val;
    }

    public function set_armure_brassiere_materiaux($val)
    {
        $this->armure_brassiere_materiaux = $val;
    }

    public function set_armure_casque_materiaux($val)
    {
        $this->armure_casque_materiaux = $val;
    }

    public function set_armure_bouclier_enchantement_val($val)
    {
        $this->armure_bouclier_enchantement_val = $val;
    }

    public function set_armure_jambiere_enchantement_val($val)
    {
        $this->armure_jambiere_enchantement_val = $val;
    }

    public function set_armure_brassiere_enchantement_val($val)
    {
        $this->armure_brassiere_enchantement_val = $val;
    }

    public function set_armure_casque_enchantement_val($val)
    {
        $this->armure_casque_enchantement_val = $val;
    }

    public function set_armure_by_default()
    {
        $this->armure_id = NULL;
        $this->armure_name = NULL;
        $this->type_armure = NULL;
        $this->armure_materiaux = NULL;
        $this->armure_enchantement_val = NULL;
        $this->armure_bouclier_id = NULL;
        $this->armure_jambiere_id = NULL;
        $this->armure_brassiere_id = NULL;
        $this->armure_casque_id = NULL;
        $this->armure_bouclier_name = NULL;
        $this->armure_jambiere_name = NULL;
        $this->armure_brassiere_name = NULL;
        $this->armure_casque_name = NULL;
        $this->armure_bouclier_type = NULL;
        $this->armure_jambiere_type = NULL;
        $this->armure_brassiere_type = NULL;
        $this->armure_casque_type = NULL;
        $this->armure_bouclier_modificateur_comp = NULL;
        $this->armure_jambiere_modificateur_comp = NULL;
        $this->armure_brassiere_modificateur_comp = NULL;
        $this->armure_casque_modificateur_comp = NULL;
        $this->armure_bouclier_modificateur_val = NULL;
        $this->armure_jambiere_modificateur_val = NULL;
        $this->armure_brassiere_modificateur_val = NULL;
        $this->armure_casque_modificateur_val = NULL;
        $this->armure_bouclier_materiaux = NULL;
        $this->armure_jambiere_materiaux = NULL;
        $this->armure_brassiere_materiaux = NULL;
        $this->armure_casque_materiaux = NULL;
        $this->armure_bouclier_enchantement_val = NULL;
        $this->armure_jambiere_enchantement_val = NULL;
        $this->armure_brassiere_enchantement_val = NULL;
        $this->armure_casque_enchantement_val = NULL;
    }

    public function set_armure_armure_by_default()
    {
        $this->armure_id = NULL;
        $this->armure_name = NULL;
        $this->type_armure = NULL;
        $this->armure_materiaux = NULL;
        $this->armure_enchantement_val = NULL;
    }

    public function set_armure_bouclier_by_default()
    {
        $this->armure_bouclier_id = NULL;
        $this->armure_bouclier_name = NULL;
        $this->armure_bouclier_type = NULL;
        $this->armure_bouclier_modificateur_comp = NULL;
        $this->armure_bouclier_modificateur_val = NULL;
        $this->armure_bouclier_materiaux = NULL;
        $this->armure_bouclier_enchantement_val = NULL;
    }

    public function set_armure_casque_by_default()
    {
        $this->armure_casque_id = NULL;
        $this->armure_casque_name = NULL;
        $this->armure_casque_type = NULL;
        $this->armure_casque_modificateur_comp = NULL;
        $this->armure_casque_modificateur_val = NULL;
        $this->armure_casque_materiaux = NULL;
        $this->armure_casque_enchantement_val = NULL;
    }

    public function set_armure_jambiere_by_default()
    {
        $this->armure_jambiere_id = NULL;
        $this->armure_jambiere_name = NULL;
        $this->armure_jambiere_type = NULL;
        $this->armure_jambiere_modificateur_comp = NULL;
        $this->armure_jambiere_modificateur_val = NULL;
        $this->armure_jambiere_materiaux = NULL;
        $this->armure_jambiere_enchantement_val = NULL;
    }

    public function set_armure_brassiere_by_default()
    {
        $this->armure_brassiere_id = NULL;
        $this->armure_brassiere_name = NULL;
        $this->armure_brassiere_type = NULL;
        $this->armure_brassiere_modificateur_comp = NULL;
        $this->armure_brassiere_modificateur_val = NULL;
        $this->armure_brassiere_materiaux = NULL;
        $this->armure_brassiere_enchantement_val = NULL;
    }

    //GETTER
    public function get_armure_armure_id()
    {
        return $this->armure_id;
    }

    public function get_armure_armure_name()
    {
        return $this->armure_name;
    }

    public function get_armure_armure_type()
    {
        return $this->armure_type;
    }

    public function get_armure_armure_materiaux()
    {
        return $this->armure_materiaux;
    }

    public function get_armure_armure_enchantement_val()
    {
        return $this->armure_enchantement_val;
    }

    public function get_armure_bouclier_id()
    {
        return $this->armure_bouclier_id;
    }

    public function get_armure_jambiere_id()
    {
        return $this->armure_jambiere_id;
    }

    public function get_armure_brassiere_id()
    {
        return $this->armure_brassiere_id;
    }

    public function get_armure_casque_id()
    {
        return $this->armure_casque_id;
    }

    public function get_armure_bouclier_name()
    {
        return $this->armure_bouclier_name;
    }

    public function get_armure_jambiere_name()
    {
        return $this->armure_jambiere_name;
    }

    public function get_armure_brassiere_name()
    {
        return $this->armure_brassiere_name;
    }

    public function get_armure_casque_name()
    {
        return $this->armure_casque_name;
    }

    public function get_armure_bouclier_type()
    {
        return $this->armure_bouclier_type;
    }

    public function get_armure_jambiere_type()
    {
        return $this->armure_jambiere_type;
    }

    public function get_armure_brassiere_type()
    {
        return $this->armure_brassiere_type;
    }

    public function get_armure_casque_type()
    {
        return $this->armure_casque_type;
    }

    public function get_armure_bouclier_modificateur_comp()
    {
        return $this->armure_bouclier_modificateur_comp;
    }

    public function get_armure_jambiere_modificateur_comp()
    {
        return $this->armure_jambiere_modificateur_comp;
    }

    public function get_armure_brassiere_modificateur_comp()
    {
        return $this->armure_brassiere_modificateur_comp;
    }

    public function get_armure_casque_modificateur_comp()
    {
        return $this->armure_casque_modificateur_comp;
    }

    public function get_armure_bouclier_modificateur_val()
    {
        return $this->armure_bouclier_modificateur_val;
    }

    public function get_armure_jambiere_modificateur_val()
    {
        return $this->armure_jambiere_modificateur_val;
    }

    public function get_armure_brassiere_modificateur_val()
    {
        return $this->armure_brassiere_modificateur_val;
    }

    public function get_armure_casque_modificateur_val()
    {
        return $this->armure_casque_modificateur_val;
    }

    public function get_armure_bouclier_materiaux()
    {
        return $this->armure_bouclier_materiaux;
    }

    public function get_armure_jambiere_materiaux()
    {
        return $this->armure_jambiere_materiaux;
    }

    public function get_armure_brassiere_materiaux()
    {
        return $this->armure_brassiere_materiaux;
    }

    public function get_armure_casque_materiaux()
    {
        return $this->armure_casque_materiaux;
    }

    public function get_armure_bouclier_enchantement_val()
    {
        return $this->armure_bouclier_enchantement_val;
    }

    public function get_armure_jambiere_enchantement_val()
    {
        return $this->armure_jambiere_enchantement_val;
    }

    public function get_armure_brassiere_enchantement_val()
    {
        return $this->armure_brassiere_enchantement_val;
    }

    public function get_armure_casque_enchantement_val()
    {
        return $this->armure_casque_enchantement_val;
    }
}
