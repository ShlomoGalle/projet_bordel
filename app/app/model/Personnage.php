<?php
namespace App\Model;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Personnage {

    private $sante;

    public function __construct(int $sante = 80)
    {
        $this->sante = $sante;
    }

    public function getsante()
    {
        return $this->sante;
    }

    
}


