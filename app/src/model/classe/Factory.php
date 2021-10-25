<?php

namespace App\Model\Classe;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Elfe;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Nain;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Humain;

class Factory {

    private $selected;

    public function __construct(string $selected )
    {
        $this->selected = $selected;
    }

    public function switch_instance_class_race()
    {
        switch ($this->selected) {
            case 'Elfe':
                return new Elfe();
                break;

            case 'Nain':
                return new Nain();
                break;

            case 'Humain':
                return new Humain();
                break;
            
            default:
                return 'Erreur';
                break;
        }
    }

}