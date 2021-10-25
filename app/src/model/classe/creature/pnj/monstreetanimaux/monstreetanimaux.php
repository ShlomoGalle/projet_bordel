<?php

namespace App\Model\Classe\Creature\Pnj\MonstreEtAnimaux;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Creature;

class MonstreEtAnimaux extends Creature {

    protected $sante;

    public function __construct(int $sante = 700)
    {
        parent::__construct();
        $this->sante = $sante;
    }

    public function getsante()
    {
        return $this->sante;
    }

}