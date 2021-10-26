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
    public function set_caracteristique_val(array $caracteristique)  
    {
        foreach ($caracteristique as $key => $value) {
            $val = new FactoryPersonnage($key);
            $val->switch_set_caracteristique($this, $value);
        }
        $this->set_caracteristique_norm($caracteristique); //Je recalcule la norm pour chaque caracteristique
    }

    //Set la norme dans caracteristique en fonction de la valeur (le bonus de caracteristique)
    //Prend un tableau de caracteristique 'la_caracteristique' => 'la valeur'
    public function set_caracteristique_norm(array $caracteristique)
    {
        foreach ($caracteristique as $key => $value) {
            $norme = new FactoryPersonnage($key);
            $norme_val = $norme->switch_calcul_bonus_caracteristique($value);
            $norme->switch_set_caracteristique($this, $norme_val, 'norm');
        }
        $this->set_calcul_caracteristique_total();
    }

    public function set_calcul_caracteristique_total() //Caracteristique total = Norm + Race
    {
        $this->caracteristique_force_total = $this->caracteristique_force['norm'] + $this->caracteristique_force['race'];
        $this->caracteristique_agilite_total = $this->caracteristique_agilite['norm'] + $this->caracteristique_agilite['race'];
        $this->caracteristique_constitution_total = $this->caracteristique_constitution['norm'] + $this->caracteristique_constitution['race'];
        $this->caracteristique_intelligence_total = $this->caracteristique_intelligence['norm'] + $this->caracteristique_intelligence['race'];
        $this->caracteristique_intuition_total = $this->caracteristique_intuition['norm'] + $this->caracteristique_intuition['race'];
        $this->caracteristique_presence_total = $this->caracteristique_presence['norm'] + $this->caracteristique_presence['race'];
        $this->set_comp_carac();
        $this->set_bd_carac();
        $this->set_jr_carac();
    }

    public function set_caracteristique_force($key, $val)
    {
        $this->caracteristique_force[$key] = $val;
    }

    public function set_caracteristique_agilite($key, $val)
    {
        $this->caracteristique_agilite[$key] = $val;
    }

    public function set_caracteristique_constitution($key, $val)
    {
        $this->caracteristique_constitution[$key] = $val;
    }

    public function set_caracteristique_intelligence($key, $val)
    {
        $this->caracteristique_intelligence[$key] = $val;
    }

    public function set_caracteristique_intuition($key, $val)
    {
        $this->caracteristique_intuition[$key] = $val;
    }

    public function set_caracteristique_presence($key, $val)
    {
        $this->caracteristique_presence[$key] = $val;
    }

}
