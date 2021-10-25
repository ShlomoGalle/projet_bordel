<?php

namespace App\Controllers\ConnexionBdd;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Bdd {

    protected $bdd; 

    public function __construct(){
        // Create connection
        $conn = new \mysqli('localhost', "root","","projet_bordel_bdd");
        // $conn = new \mysqli('localhost', "root","JHDYSkxhe845xsUE!","LielCom");
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $this->bdd = $conn;
    }

    public function select($query){
        $result = $this->bdd->query($query);
        $rowtotal = [];
        while ($row = $result->fetch_assoc())
        {
            $rowtotal[] = $row;
        }
        
        return $rowtotal;
    }
    

}

?>