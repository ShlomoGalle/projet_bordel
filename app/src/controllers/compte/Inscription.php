<?php

namespace App\Controllers\Compte;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Controllers\ConnexionBdd\Bdd as Bdd;

class Inscription extends bdd {

    const SALAGE = 'd1ès5çq8ç_à/à6)1g_3f';
    const POIVRAGE = 'è8-7çèg3-2qà8s89d(çà)g'; //Lol


    function inscription(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        parse_str($allPostPutVars['data'],$data_arr);

        $pseudo_inscrire = htmlspecialchars($data_arr['pseudo_inscrire']);
        $mdp_inscrire = htmlspecialchars($data_arr['mdp_inscrire']);
        $confirmation_mdp_inscrire = htmlspecialchars($data_arr['confirmation_mdp_inscrire']);

        if(!empty($pseudo_inscrire) AND !empty($mdp_inscrire) AND !empty($confirmation_mdp_inscrire))
        {
            if($mdp_inscrire == $confirmation_mdp_inscrire)
            {
                $sql = "SELECT * FROM membre WHERE pseudo = '".$pseudo_inscrire."'";
                $requser = $this->bdd->query($sql);

                $userexist = $requser->num_rows;

                if($userexist == 0)
                {
                    if(strlen($mdp_inscrire) <= 12 && strlen($mdp_inscrire) >= 4)
                    {
                        // $userinfo = $requser->fetch_assoc();



                        $data = array(
                            'success' => 1, 
                            'personnage' => $_SESSION['id_personnage'] 
                        );
                    }
                    else
                    {
                        $data = array(
                            'success' => 0,
                            'erreur' => "Le mot de passe doit etre plus long que 3 charactères et moins long que 12 charactères"
                        );
                    }
                }
                else
                {            
                    $data = array(
                        'success' => 0,
                        'erreur' => "Il existe déjà quelqu'un avec ce pseudo !"
                    );
                }
            }
            else
            {            
                $data = array(
                    'success' => 0,
                    'erreur' => "Votre mot de passe et votre confirmation de mot de passe ne correspondent pas !"
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

        // die($_SESSION['pseudo']);
        return $response->withJson($data);
    }
    

}

?>