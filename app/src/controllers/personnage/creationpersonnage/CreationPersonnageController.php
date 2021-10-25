<?php
namespace App\Controllers\Personnage\CreationPersonnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Controllers\ConnexionBdd\Bdd as Bdd;

Use App\Model\Classe\Factory;

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




    function instanciation_class_personnage(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();

        $race  = $allPostPutVars['race'];
        $race = new Factory($race);
        $MonPersonnage = $race->switch_instance_class_race();
        
        if($MonPersonnage === 'Erreur')
        {
            $data = array(
                'success' => 0, 
                'message' => "Erreur, la race n'existe pas !"
            );
            return $response->withJson($data);
        }
        else{
            // var_dump($MonPersonnage);

            $data = array(
                'success' => 1, 
                'message' => $MonPersonnage->get_identite_race()
            );

            return $response->withJson($data);
        }    

    }

    
    function initialisation_caracteristique(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();


        $data = array(
            'success' => 1, 
            'message' => '' 
        );

        return $response->withJson($data);
        

    }


    
}





