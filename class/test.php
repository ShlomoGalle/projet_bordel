<?php


class Personnage {

    private $nom;
    private $vie;
    private $vie_max;


    public function __construct(string $nom, int $vie)
    {
        $this->nom = $nom;
        $this->vie = $vie;
        $this->vie_max = $vie;
    }

    public function tombe() :void{
        $this->vie -= 20;
    }

    public function regenere() :void{
        $this->vie = $this->vie_max;
    }
    
}