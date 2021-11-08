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

class CarteController extends Bdd {

    function get_info_carte(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $where['id'] = $MonPersonnage->get_id_carte_actuelle();
        $row = $this->select_all("carte", $where);

        $img = "\\src\\views\\css\\img\\carte\\" . $row[0]['img'];

        $type = $row[0]['type'];

        $code_area = $row[0]['code_area'];
        
        $data = array(
            'success' => 1, 
            'img' => $img,
            'type' => $type,
            'code_area' => $code_area,
        );
    
        return $response->withJson($data);
    }

    function change_map(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $MonPersonnage->set_id_carte_actuelle($allPostPutVars['id']);
        
        $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session
        $data = array(
            'success' => 1,
        );
    
        return $response->withJson($data);
    }

    
}





