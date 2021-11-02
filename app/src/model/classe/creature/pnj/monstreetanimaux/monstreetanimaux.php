<?php

namespace App\Model\Classe\Creature\Pnj\MonstreEtAnimaux;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Creature;

class MonstreEtAnimaux extends Creature {

    protected $name;
    protected $quantite_proba; //array avec la quantité et la proba ex: [1 => 100, 2 => 50, 3 => 6] 
    protected $or_lache; //array avec la min et la max ex : [25, 300] entre 25 et 300 piece de cuivre
    protected $objet_lache; //array avec le name de l'objet et la proba
    protected $experience; //array avec la quantité et la proba ex: [200 => 100, 250 => 50, 300 => 6] 

    public function __construct()
    {
        parent::__construct();
    }

}