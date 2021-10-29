<?php

namespace App\Model\Traits\Personnage\CreationPersonnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Factory\FactoryPersonnage;
Use Exception;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait DetailCarac {

    // propriété : 
    //caracteristique[val,norme,race]
    protected $caracteristique_force = ['val' => 0, 'norm' => 0, 'race' => 0];
    protected $caracteristique_agilite = ['val' => 0, 'norm' => 0, 'race' => 0];
    protected $caracteristique_constitution = ['val' => 0, 'norm' => 0, 'race' => 0];
    protected $caracteristique_intelligence = ['val' => 0, 'norm' => 0, 'race' => 0];
    protected $caracteristique_intuition = ['val' => 0, 'norm' => 0, 'race' => 0];
    protected $caracteristique_presence = ['val' => 0, 'norm' => 0, 'race' => 0];

    public function __construct()
    {
    }

    //Set la valeur dans caracteristique
    //Prend un tableau de caracteristique 'la_caracteristique' => 'la valeur'
    public function set_caracteristique(array $caracteristique, string $key)  
    {
        foreach ($caracteristique as $index => $value) {
            $val = new FactoryPersonnage($index);
            $caracteristique[$index] = $val->switch_set_caracteristique($this, $value, $key);
        }

        if($key == 'val')
        {
            $this->set_caracteristique($caracteristique, 'norm'); //Je recalcule la norm pour chaque caracteristique
        }
        elseif($key == 'norm'){
            $this->set_calcul_caracteristique_total();
        }
    }


    public function set_calcul_caracteristique_total() //Caracteristique total = Norm + Race
    {
        $this->caracteristique_force_total = $this->caracteristique_force['norm'] + $this->caracteristique_force['race'];
        $this->caracteristique_agilite_total = $this->caracteristique_agilite['norm'] + $this->caracteristique_agilite['race'];
        $this->caracteristique_constitution_total = $this->caracteristique_constitution['norm'] + $this->caracteristique_constitution['race'];
        $this->caracteristique_intelligence_total = $this->caracteristique_intelligence['norm'] + $this->caracteristique_intelligence['race'];
        $this->caracteristique_intuition_total = $this->caracteristique_intuition['norm'] + $this->caracteristique_intuition['race'];
        $this->caracteristique_presence_total = $this->caracteristique_presence['norm'] + $this->caracteristique_presence['race'];
        $this->set_comp_carac(); //dans trait DetalComp
        $this->set_bd_carac(); //dans class DetailPersonnageJoueur
        $this->set_jr_carac(); //dans class DetailPersonnageJoueur
        // $this->set_point_de_pouvoir_carac(); //A FAIRE
    }


    //SETTER
    public function set_caracteristique_force(string $key, int $val)
    {
        $this->caracteristique_force[$key] = $val;
    }

    public function set_caracteristique_agilite(string $key, int $val)
    {
        $this->caracteristique_agilite[$key] = $val;
    }

    public function set_caracteristique_constitution(string $key, int $val)
    {
        $this->caracteristique_constitution[$key] = $val;
    }

    public function set_caracteristique_intelligence(string $key, int $val)
    {
        $this->caracteristique_intelligence[$key] = $val;
    }

    public function set_caracteristique_intuition(string $key, int $val)
    {
        $this->caracteristique_intuition[$key] = $val;
    }

    public function set_caracteristique_presence(string $key, int $val)
    {
        $this->caracteristique_presence[$key] = $val;
    }

    //GETTER
    public function get_caracteristique_force(string $key)
    {
        return $this->caracteristique_force[$key];
    }

    public function get_caracteristique_agilite(string $key)
    {
        return $this->caracteristique_agilite[$key];
    }

    public function get_caracteristique_constitution(string $key)
    {
        return $this->caracteristique_constitution[$key];
    }

    public function get_caracteristique_intelligence(string $key)
    {
        return $this->caracteristique_intelligence[$key];
    }

    public function get_caracteristique_intuition(string $key)
    {
        return $this->caracteristique_intuition[$key];
    }

    public function get_caracteristique_presence(string $key)
    {
        return $this->caracteristique_presence[$key];
    }

}
