<?php

namespace App\Model\Traits\Personnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;


Trait Sort {

    //Sort                                            //EXEMPLE
    // protected $sort['name']['name'] = 0;           //Eclair de glace
    // protected $sort['name']['classe_de_sort'] = 0; //E (élémentaire)
    // protected $sort['name']['type'] = 0;           //combat
    // protected $sort['name']['sous_type'] = 0;      //eclair
    // protected $sort['name']['royaume'] = 0;        //essence
    // protected $sort['name']['name_liste'] = 0;     //Les voies du froid
    // protected $sort['name']['portee'] = 0;         //30 (metre)
    // protected $sort['name']['niveau'] = 0;         //6
    // protected $sort['name']['element'] = 0;        //froid
    // protected $sort['name']['duree'] = 0;          //-
    // protected $sort['name']['charge'] = 0 = 0;     //true                        //Si c'est un sort a chargé ou pas    
    // protected $sort['name']['air_effet'] = 0 = 0;  //1                         //combien de personne ca touche    

    protected $sort = ['classe_de_sort' => 0, 'type' => 0, 'sous_type' => 0, 'royaume' => 0, 'name_liste' => 0, 'portee' => 0, 'niveau' => 0, 'element' => 0, 'duree' => 0, 'charge' => 0, 'sort_air_effet' => 0];


    public function __construct()
    {
    }


    //SETTER
    public function set_sort_name(int $val)
    {
        // $this->sort_name = $val;
    }

    //GETTER
    public function get_sort_name()
    {
        // return $this->sort_name;
    }
}