<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


class Humain extends DetailPersonnageJoueur {

    protected $sante;

    public function __construct(int $sante = 410, int $langue = 4, string $race = 'Humain')
    {
        parent::__construct();
        $this->sante = $sante;
        $this->langue_Quenya = $langue;
        $this->identite_race = $race;
    }

    public function get_sante()
    {
        return $this->sante;
    }

}