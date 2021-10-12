<?php


class Personnage {

    protected $nom;
    protected $vie;
    protected $vie_max;

    public function __construct(string $nom, int $vie)
    {
        $this->nom = $nom;
        $this->vie = $vie;
        $this->vie_max = $vie;
    }

    public function tombe($quantité = 20) :void{
        $this->vie -= $quantité;
    }  

    public function regenere() :void{
        $this->vie = $this->vie_max;
    }
    
}

class Elfe extends Personnage {

    protected $race;
    
    public function __construct(string $race,string $nom, int $vie)
    {   
        parent::__construct($nom,$vie);
        $this->race = $race;
    }
}

class ElfeDesBois extends Elfe {

    private $sous_race;
    private $tombe = 0;

    public function __construct(string $sous_race,string $race,string $nom, int $vie)
    {
        parent::__construct($race,$nom,$vie);
        $this->sous_race = $sous_race;
    }

    public function tombe($quantité = 40) :void{
        parent::tombe($quantité);

        $this->tombe = 1;
    }
}

class Base {
    use SayWorld;

    // public function test() {
    //     $this->test = 4;
    // }

    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public $test = 3;
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {

    public function test() {
        $this->test = 4;
    }
}



