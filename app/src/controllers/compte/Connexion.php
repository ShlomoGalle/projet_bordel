<?php

namespace App\Controllers\Compte;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\PersonnageJoueur;
Use App\Controllers\ConnexionBdd\Bdd as Bdd;

class Connexion extends bdd {

    const SALAGE = 'd1ès5çq8ç_à/à6)1g_3f';
    const POIVRAGE = 'è8-7çèg3-2qà8s89d(çà)g'; //Lol

    function connexion(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        parse_str($allPostPutVars['data'],$data_arr);

        $pseudo_connect = htmlspecialchars($data_arr['pseudo_connect']);
        $mdp_connect = htmlspecialchars($data_arr['mdp_connect']);

        if(!empty($pseudo_connect) AND !empty($mdp_connect))
        {
            $mdp_connect = md5(self::SALAGE.$mdp_connect.self::POIVRAGE);
            
            $sql = "SELECT * FROM membre WHERE pseudo = '".$pseudo_connect."' AND password = '".$mdp_connect."'";
            $requser = $this->bdd->query($sql);

            $userexist = $requser->num_rows;

            if($userexist == 1)
            {
                $userinfo = $requser->fetch_assoc();

                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                $_SESSION['id_personnage'] = $userinfo['id_personnage']; //If id_personnage == 0 alors il a pas encore fait la création de personnage

                if($userinfo['id_personnage'] != 0)
                {
                    $MonPersonnage = new PersonnageJoueur();
                    $MonPersonnage->hydrate_mon_personnage($userinfo['id_personnage']);
                    $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

                }

                $data = array(
                    'success' => 1, 
                    'personnage' => $_SESSION['id_personnage'] 
                );
            }
            else
            {            
                $data = array(
                    'success' => 0,
                    'erreur' => "Votre pseudo ou votre mot de passe n'existe pas !"
                );
            }
            
        }
        else
        {
            $data = array(
                'success' => 0,
                'erreur' => "Tous les champs doivent être complétés !"
            );
        }
        

        // $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

        return $response->withJson($data);
    }

    function deconnexion(ServerRequestInterface $request, ResponseInterface $response)
    {
        session_destroy();

        return $response->withJson($data);
    }

}

?>