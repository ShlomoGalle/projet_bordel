<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


class Nain extends DetailPersonnageJoueur {

    protected $sante;

    public function __construct(int $langue = 4, string $race = 'Nain')
    {
        parent::__construct();
        $this->langue_Quenya = $langue;
        $this->identite_race = $race;
    }

    public function get_sante()
    {
        return $this->sante;
    }

}