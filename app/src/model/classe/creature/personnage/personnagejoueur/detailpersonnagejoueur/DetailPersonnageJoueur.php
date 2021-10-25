<?php

namespace App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\PersonnageJoueur;
Use App\Model\Traits\Personnage\CreationPersonnage\Langue;
Use App\Model\Traits\Personnage\CreationPersonnage\DetailComp;
Use App\Model\Traits\Personnage\CreationPersonnage\DetailCaract;


class DetailPersonnageJoueur extends PersonnageJoueur {
    Use Langue, DetailComp, DetailCaract;

    protected $sante;

    public function __construct(int $sante = 82, int $langue = 3)
    {
        parent::__construct();
        $this->sante = $sante;
        $this->langue_Adûnaic = $langue;
    }

    public function getsante()
    {
        return $this->sante;
    }

}