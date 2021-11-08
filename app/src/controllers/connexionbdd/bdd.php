<?php

namespace App\Controllers\ConnexionBdd;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Bdd {
    const SALAGE = 'd1ès5çq8ç_à/à6)1g_3f';
    const POIVRAGE = 'è8-7çèg3-2qà8s89d(çà)g'; //Lol
    
    protected $bdd; 

    public function __construct(){
        
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Create connection
        $conn = new \mysqli('127.0.0.1', "root","","projet_bordel_bdd");
        // $conn = new \mysqli('localhost', "root","JHDYSkxhe845xsUE!","LielCom");
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $this->bdd = $conn;
    }

    public function new_connection(){
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Create connection
        $conn = new \mysqli('127.0.0.1', "root","","projet_bordel_bdd");
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

    public function select_all($name_table, $where){
        $sql = "SELECT * FROM `".$name_table."` WHERE ";
        foreach ($where as $key => $value) {
            $sql .= "`".$this->bdd->real_escape_string($key)."` = ";
            $sql .= "'". $this->bdd->real_escape_string($value)."',";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ";";

        $result = $this->bdd->query($sql);
        $rowtotal = [];
        while ($row = $result->fetch_assoc())
        {
            $rowtotal[] = $row;
        }
        
        return $rowtotal;
    }

    public function insert_since_array($name_table, $array){
        $sql = "INSERT INTO `".$name_table."` (";
        foreach ($array as $key => $value) {
            $sql .= "`".$this->bdd->real_escape_string($key)."`,";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ") VALUES (";
        foreach ($array as $key => $value) {
            $sql .= "'". $this->bdd->real_escape_string($value)."',";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ");";

        $this->bdd->query($sql);
    }
    
    public function update_since_array($name_table, $array, $where){
        $sql = "UPDATE `".$name_table."` SET ";
        foreach ($array as $key => $value) {
            $sql .= "`".$this->bdd->real_escape_string($key)."` = ";
            $sql .= "'". $this->bdd->real_escape_string($value)."',";
        }
        $sql = substr($sql, 0, -1);
        $sql .= " WHERE ";
        foreach ($where as $key => $value) {
            $sql .= "`".$this->bdd->real_escape_string($key)."` = ";
            $sql .= "'". $this->bdd->real_escape_string($value)."',";
        }
        $sql = substr($sql, 0, -1);
        $sql .= ";";

        $this->bdd->query($sql);
        return $sql;
    }

    public function update_personnage_since_array($name_table, $array){
        $sql = "UPDATE `".$name_table."` SET ";
        foreach ($array as $key => $value) {
            $sql .= "`".$this->bdd->real_escape_string($key)."` = ";
            $sql .= "'". $this->bdd->real_escape_string($value)."',";
        }
        $sql = substr($sql, 0, -1);

        if($name_table == "personnage_identite")
        {
            $sql .= " WHERE `id` = ". $_SESSION['id_personnage'] . ";";
        }
        else
        {
            $sql .= " WHERE `id_personnage` = ". $_SESSION['id_personnage'] . ";";
        }

        $this->bdd->query($sql);
        return $sql;
    }


    

}

?>