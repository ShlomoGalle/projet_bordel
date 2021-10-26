<?php
namespace App\Controllers\Personnage\CreationPersonnage;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
Use App\Controllers\ConnexionBdd\Bdd as Bdd;

Use App\Model\Classe\Factory\FactoryPersonnage;

Use App\Model\Classe\Creature\Creature;
Use App\Model\Classe\Creature\Pnj\MonstreEtAnimaux\MonstreEtAnimaux;
Use App\Model\Classe\Creature\Personnage\Personnage;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\PersonnageJoueur;
Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\DetailPersonnageJoueur;
// Use App\Model\Classe\Creature\Personnage\PersonnageJoueur\DetailPersonnageJoueur\Races\Elfe;

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
        $race = new FactoryPersonnage($race);

        try{
            $MonPersonnage = $race->switch_instance_class_race();

            $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

            $data = array(
                'success' => 1, 
                'message' => $MonPersonnage->get_identite_race(),
            );

            return $response->withJson($data);

        }catch(Exception $e){

            $data = array(
                'success' => 0, 
            );
            return $response->withJson($data);
        }
    }

    
    function initialisation_caracteristique(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $caracteristique['force'] = 76;
        $caracteristique['agilite'] = 98;
        $caracteristique['constitution'] = 102;  //Test je creer moi meme les chiffres
        $caracteristique['intelligence'] = 44;
        $caracteristique['intuition'] = 40;
        $caracteristique['presence'] = 11;

        $caracteristique['force'] = $allPostPutVars['force'];
        $caracteristique['agilite'] = $allPostPutVars['agilite'];
        $caracteristique['constitution'] = $allPostPutVars['constitution'];
        $caracteristique['intelligence'] = $allPostPutVars['intelligence'];
        $caracteristique['intuition'] = $allPostPutVars['intuition'];
        $caracteristique['presence'] = $allPostPutVars['presence'];

        $comp['comp_manoeuvreetmouvement_sansarmure'] = 3;
        $comp['comp_manoeuvreetmouvement_cuirsouple'] = 50;

        try{
            $MonPersonnage->set_caracteristique_val($caracteristique); //Je met dans mon objet les valeurs des caracteristiques
            $MonPersonnage->set_comp_degre($comp);

            var_dump($MonPersonnage);
    
            $data = array(  
                'success' => 1, 
                'message' => ''
            );
    
            return $response->withJson($data);

        }catch(Exception $e){

            $data = array(
                'success' => 0,
            );

            return $response->withJson($data);
        }
    }
    
    // function varexport($expression, $return=FALSE) {
    //     $export = var_export($expression, TRUE);
    //     $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
    //     $array = preg_split("/\r\n|\n|\r/", $export);
    //     $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [NULL, ']$1', ' => ['], $array);
    //     $export = join(PHP_EOL, array_filter(["["] + $array));
    //     if ((bool)$return) return $export; else echo $export;
    // }
}





