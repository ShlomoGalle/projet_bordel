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

    function get_objet_vendre(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $row = $this->select("SELECT * FROM `objet_loot_batiment` WHERE `id_batiment` = '" . $allPostPutVars['id'] . "';");

        $objet_a_vendre = [];

        if(!empty($row))
        {
            foreach ($row as $key => $value) {
                $objet_a_vendre[] = $this->select("SELECT * FROM `" . $value['type_objet'] . "` WHERE `id` = '" . $value['id_objet'] . "';");
            }
            foreach ($objet_a_vendre as $key => $value) {
                $objet_a_vendre[$key] = $objet_a_vendre[$key][0];
            }
        }

        $data = array(
            'success' => 1,
            'objet_a_vendre' => $objet_a_vendre
        );
        return $response->withJson($data);
    }
   
}
