<?php

namespace App\Model\Classe\Factory;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\ElfeNoldor;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Nain;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Humain;
Use Exception;

class Factory {

    protected $selected;

    public function __construct(string $selected)
    {
        $this->selected = $selected;
    }

}