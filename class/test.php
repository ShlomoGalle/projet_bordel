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

class Kid {
 
    /**
     * Age du kid
     *
     * @var int
     * @access private
     */
    private $age;
    private $age2;
    private $age3;
    private $age4;
    private $age5;
   
    /**
     * Methode magique __get()
     *
     * Retourne la valeur de la propriété appelée
     *
     * @param string $property
     * @return int $age
     * @throws Exception
     */
    public function __get($property) {
      if('age' === $property) {
        return $this->age;
      } 
      if('age2' === $property) {
        return $this->age2;
      } 
      if('age3' === $property) {
        return $this->age3;
      } 
      if('age4' === $property) {
        return $this->age4;
      }  
    }

    public function getage($property) {
          return $this->age;
    }
    public function getage2($property) {
          return $this->age2;
    }
    public function getage3($property) {
          return $this->age3;
    }
    public function getage4($property) {
          return $this->age4;
    }
   
    /**
     * Methode magique __set()
     *
     * Fixe la valeur de la propriété appelée
     *
     * @param string $property
     * @param mixed $value
     * @return void
     * @throws Exception
     */
    public function __set($property,$value) {
   
      if('age' === $property && ctype_digit($value)) {
        $this->age = (int) $value;  
      } else {
        $this->age = 'Error';  
        }
    }
  }



