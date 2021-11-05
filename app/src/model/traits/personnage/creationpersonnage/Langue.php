<?php

namespace App\Model\Traits\Personnage\CreationPersonnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;


Trait Langue {

    // propriété : 
    protected $langue_Adunaic  = 0;
    protected $langue_Apysaic  = 0;
    protected $langue_Atliduk  = 0;
    protected $langue_Haradaic  = 0;
    protected $langue_Khuzdul  = 0;
    protected $langue_Kuduk  = 0;
    protected $langue_Labba  = 0;
    protected $langue_Logathig  = 0;
    protected $langue_Nahaiduk  = 0;
    protected $langue_Noirparler  = 0;
    protected $langue_Orque  = 0;
    protected $langue_Pukael  = 0;
    protected $langue_Quenya  = 0;
    protected $langue_Rohirric  = 0;
    protected $langue_Sindarin  = 0;
    protected $langue_Sylvain  = 0;
    protected $langue_Umitic  = 0;
    protected $langue_Varadja  = 0;
    protected $langue_Waildyth  = 0;
    protected $langue_Westron = 5; //(Langage commun)
    

    public function __construct()
    {
    }

    //SETTER
    public function set_langue_Adunaic($val){
        $this->langue_Adunaic = $val;
    }

    public function set_langue_Apysaic($val){
        $this->langue_Apysaic = $val;
    }

    public function set_langue_Atliduk($val){
        $this->langue_Atliduk = $val;
    }

    public function set_langue_Haradaic($val){
        $this->langue_Haradaic = $val;
    }

    public function set_langue_Khuzdul($val){
        $this->langue_Khuzdul = $val;
    }

    public function set_langue_Kuduk($val){
        $this->langue_Kuduk = $val;
    }

    public function set_langue_Labba($val){
        $this->langue_Labba = $val;
    }

    public function set_langue_Logathig($val){
        $this->langue_Logathig = $val;
    }

    public function set_langue_Nahaiduk($val){
        $this->langue_Nahaiduk = $val;
    }

    public function set_langue_Noirparler($val){
        $this->langue_Noirparler = $val;
    }

    public function set_langue_Orque($val){
        $this->langue_Orque = $val;
    }

    public function set_langue_Pukael($val){
        $this->langue_Pukael = $val;
    }

    public function set_langue_Quenya($val){
        $this->langue_Quenya = $val;
    }

    public function set_langue_Rohirric($val){
        $this->langue_Rohirric = $val;
    }

    public function set_langue_Sindarin($val){
        $this->langue_Sindarin = $val;
    }

    public function set_langue_Sylvain($val){
        $this->langue_Sylvain = $val;
    }

    public function set_langue_Umitic($val){
        $this->langue_Umitic = $val;
    }

    public function set_langue_Varadja($val){
        $this->langue_Varadja = $val;
    }

    public function set_langue_Waildyth($val){
        $this->langue_Waildyth = $val;
    }

    public function set_langue_Westron($val){
        $this->langue_Westron = $val;
    }

    //GETTER

    public function get_langue_Adunaic(){
        return $this->langue_Adunaic;
    }

    public function get_langue_Apysaic(){
        return $this->langue_Apysaic;
    }

    public function get_langue_Atliduk(){
        return $this->langue_Atliduk;
    }

    public function get_langue_Haradaic(){
        return $this->langue_Haradaic;
    }

    public function get_langue_Khuzdul(){
        return $this->langue_Khuzdul;
    }

    public function get_langue_Kuduk(){
        return $this->langue_Kuduk;
    }

    public function get_langue_Labba(){
        return $this->langue_Labba;
    }

    public function get_langue_Logathig(){
        return $this->langue_Logathig;
    }

    public function get_langue_Nahaiduk(){
        return $this->langue_Nahaiduk;
    }

    public function get_langue_Noirparler(){
        return $this->langue_Noirparler;
    }

    public function get_langue_Orque(){
        return $this->langue_Orque;
    }

    public function get_langue_Pukael(){
        return $this->langue_Pukael;
    }

    public function get_langue_Quenya(){
        return $this->langue_Quenya;
    }

    public function get_langue_Rohirric(){
        return $this->langue_Rohirric;
    }

    public function get_langue_Sindarin(){
        return $this->langue_Sindarin;
    }

    public function get_langue_Sylvain(){
        return $this->langue_Sylvain;
    }

    public function get_langue_Umitic(){
        return $this->langue_Umitic;
    }

    public function get_langue_Varadja(){
        return $this->langue_Varadja;
    }

    public function get_langue_Waildyth(){
        return $this->langue_Waildyth;
    }

    public function get_langue_Westron(){
        return $this->langue_Westron;
    }

    //BDD
    //INSERT
    public function insert_personnage_language()
    {
        $langue['id_personnage'] = $this->id;
        $langue['Adunaic'] = $this->langue_Adunaic;
        $langue['Apysaic'] = $this->langue_Apysaic;
        $langue['Atliduk'] = $this->langue_Atliduk;
        $langue['Haradaic'] = $this->langue_Haradaic;
        $langue['Khuzdul'] = $this->langue_Khuzdul;
        $langue['Kuduk'] = $this->langue_Kuduk;
        $langue['Labba'] = $this->langue_Labba;
        $langue['Logathig'] = $this->langue_Logathig;
        $langue['Nahaiduk'] = $this->langue_Nahaiduk;
        $langue['Noirparler'] = $this->langue_Noirparler;
        $langue['Orque'] = $this->langue_Orque;
        $langue['Pukael'] = $this->langue_Pukael;
        $langue['Quenya'] = $this->langue_Quenya;
        $langue['Rohirric'] = $this->langue_Rohirric;
        $langue['Sindarin'] = $this->langue_Sindarin;
        $langue['Sylvain'] = $this->langue_Sylvain;
        $langue['Umitic'] = $this->langue_Umitic;
        $langue['Varadja'] = $this->langue_Varadja;
        $langue['Waildyth'] = $this->langue_Waildyth;
        $langue['Westron'] = $this->langue_Westron;

        $sql = "INSERT INTO `personnage_langue` (";
        foreach ($langue as $key => $value) {
            $sql .= "`".$key."`,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") VALUES (";
        foreach ($langue as $key => $value) {
            $sql .= "'". $this->bdd->real_escape_string($value)."',";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ");";

        $this->bdd->query($sql);
    }
}
