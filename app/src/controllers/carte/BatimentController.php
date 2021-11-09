<?php
namespace App\Controllers\Carte;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Controllers\ConnexionBdd\Bdd as Bdd;

Use App\Model\Classe\Creature\Creature;
Use App\Model\Classe\Creature\Pnj\MonstreEtAnimaux\MonstreEtAnimaux;
Use App\Model\Classe\Creature\Personnage\Personnage;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\PersonnageJoueur;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Elfe;

class BatimentController extends Bdd {

    function check_autorize_batiment(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $row = $this->select("SELECT `id_carte` FROM `batiment` WHERE `id` = '" . $allPostPutVars['id'] . "';");

        if(empty($row))
        {
            $data = array(
                'success' => 1,
                'autorize' => 0,
            );
        }
        else
        {
            if($row[0]['id_carte'] == $MonPersonnage->get_id_carte_actuelle())
            {
                $data = array(
                    'success' => 1, 
                    'autorize' => 1,
                );
            }
            else
            {
                $data = array(
                    'success' => 1,
                    'autorize' => 0,
                );
            }
        }
        return $response->withJson($data);
    }

    function get_objet_achat(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $row = $this->select("SELECT * FROM `objet_loot_batiment` WHERE `id_batiment` = '" . $allPostPutVars['id'] . "';");

        unset($objet_a_vendre);
        $objet_a_vendre = [];

        if(!empty($row))
        {
            $argent = $MonPersonnage->get_argent();
            foreach ($row as $key => $value) {
                // $objet_a_vendre[] = $this->select("SELECT `" . $value['type_objet'] . "`.*, `objet_loot_batiment`.`type_objet` FROM `" . $value['type_objet'] . "` LEFT JOIN `objet_loot_batiment` ON `" . $value['type_objet'] . "`.`id` =  `objet_loot_batiment`.`id_objet` AND `objet_loot_batiment`.`type_objet` = '" . $value['type_objet'] . "' WHERE `" . $value['type_objet'] . "`.`id` = '" . $value['id_objet'] . "' AND `objet_loot_batiment`.`id_batiment` = '" . $allPostPutVars['id'] . "';");
                $objet_a_vendre[] = $this->select("SELECT * FROM `" . $value['type_objet'] . "` WHERE `id` = '" . $value['id_objet'] . "';");
            }

            foreach ($objet_a_vendre as $key => $value) {
                $objet_a_vendre[$key] = $objet_a_vendre[$key][0];
                if($objet_a_vendre[$key]['prix'] <= $argent)
                {
                    $objet_a_vendre[$key]['achetable'] = 1;
                }
                else
                {
                    $objet_a_vendre[$key]['achetable'] = 0;
                }
            }
        }

        
        $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

        $data = array(
            'success' => 1,
            'objet_a_vendre' => $objet_a_vendre
        );
        return $response->withJson($data);
    }
   
    //id_batiment, id_objet, type_objet
    function acheter_objet(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $row = $this->select("SELECT `id_carte` FROM `batiment` WHERE `id` = '" . $allPostPutVars['id_batiment'] . "';");
        if(empty($row)) //SI LA PERSONNE A CHANGEE L ID DU BATIMENT, ET QUE L ID DU BATIMENT N EXISTE PAS 
        {
            $data = array(
                'success' => 0,
            );
            return $response->withJson($data);
        }
        if($row[0]['id_carte'] != $MonPersonnage->get_id_carte_actuelle()) //SI LA PERSONNE A CHANGEE L ID DU BATIMENT, ET QUE L ID DU BATIMENT NEST PAS DANS LA VILLE OU LE PERSO SE TROUVE
        {
            $data = array(
                'success' => 0,
            );
            return $response->withJson($data);
        }
        $argent = $MonPersonnage->get_argent();

        $row_objet = $this->select("SELECT * FROM `". $allPostPutVars['type_objet'] ."` WHERE `id` = '" . $allPostPutVars['id_objet'] . "';");
        $row_objet = $row_objet[0];
        $row_objet['id_personnage'] =  $_SESSION['id_personnage'];
        $row_objet['id_objet'] = $row_objet['id'];
        unset($row_objet['id']);


        if($argent >= $row_objet['prix'])
        {
            $MonPersonnage->insert_in_inventaire($allPostPutVars['type_objet'], $row_objet);
            $MonPersonnage->set_argent($argent - $row_objet['prix']);
        }


        $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

        $data = array(
            'success' => 1,
        );
        return $response->withJson($data);
    }
}
