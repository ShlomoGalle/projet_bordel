<?php
namespace App\Controllers\Personnage\CreationPersonnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Controllers\ConnexionBdd\Bdd as Bdd;

Use App\Model\Classe\Creature\Creature;
Use App\Model\Classe\Creature\Pnj\MonstreEtAnimaux\MonstreEtAnimaux;
Use App\Model\Classe\Creature\Personnage\Personnage;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\PersonnageJoueur;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Elfe;

class CreationPersonnageController extends Bdd {

    function home(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        
        $moi = new Elfe();
        $sante = $moi->getsante();
        
        var_dump($moi);

        // $sql1 = "SELECT * FROM test WHERE id = '2';";
        // $result1 = $this->bdd->query($sql1);
        // $row = $result1->fetch_assoc();
        // $sante = $row['name'];
        
        $data = array(
            'success' => 1, 
            'message' => $sante
        );
    
        return $response->withJson($data);
    }

    
}





