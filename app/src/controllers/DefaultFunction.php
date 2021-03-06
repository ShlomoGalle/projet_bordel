<?php

namespace App\Controllers;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Controllers\ConnexionBdd\Bdd as Bdd;

class DefaultFunction extends bdd {
    
    function default(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();

        if(isset($_SESSION['id_personnage'])) //VERIFIE SI IL A FAIT SON PERSONNAGE 
        {
            if($_SESSION['id_personnage'] == 0)
            {
                $sql = "SELECT `id_personnage` FROM `membre` WHERE `id` = " . $_SESSION['id'];
                $result = $this->bdd->query($sql);
                $row = $result->fetch_assoc();
                if($row['id_personnage'] != 0)
                {
                    $_SESSION['id_personnage'] = $row['id_personnage'];
                }
            }
        }


        if(isset($_SESSION['id']))
        {
            if($_SESSION['id_personnage'] != 0)
            {
                $data = array(
                    'success' => 1,
                    'connected' => 1,
                    'personnage' => $_SESSION['id_personnage'],
                );  
            }
            else
            {
                $data = array(
                    'success' => 1,
                    'connected' => 1,
                    'personnage' => 0,
                );  
            }
        }
        else
        {
            $data = array(
                'success' => 1,
                'connected' => 0,
                'personnage' => 0,
            );  
        }
        return $response->withJson($data);
    }

}

?>