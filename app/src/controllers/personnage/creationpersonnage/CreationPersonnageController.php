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

    function var_dump(ServerRequestInterface $request, ResponseInterface $response)
    {
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session
        var_dump($MonPersonnage);
        $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session
        $data = array(
            'success' => 1, 
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
                'message' => '<b>' . $MonPersonnage->get_identite_race() . '</b>',
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

        // $caracteristique['force'] = $allPostPutVars['force'];
        // $caracteristique['agilite'] = $allPostPutVars['agilite'];
        // $caracteristique['constitution'] = $allPostPutVars['constitution'];
        // $caracteristique['intelligence'] = $allPostPutVars['intelligence'];
        // $caracteristique['intuition'] = $allPostPutVars['intuition'];
        // $caracteristique['presence'] = $allPostPutVars['presence'];
        $caracteristique['force'] = 98;
        $caracteristique['agilite'] = 70;
        $caracteristique['constitution'] = 90;
        $caracteristique['intelligence'] = 95;
        $caracteristique['intuition'] = 74;
        $caracteristique['presence'] = 50;
        
        try{
            $MonPersonnage->set_caracteristique($caracteristique, 'val'); //Je met dans mon objet les valeurs des caracteristiques

            // var_dump($MonPersonnage);
            $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

            $data = array(  
                'success' => 1, 
                'langage_add' => $MonPersonnage->get_nb_degres_langages_additionnel(),
                'nb_pts_histor' => $MonPersonnage->get_nb_points_histor(),
            );
    
            return $response->withJson($data);

        }catch(Exception $e){

            $data = array(
                'success' => 0,
            );

            return $response->withJson($data);
        }
    }
    
    function add_langage_additionnel(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $langage = new FactoryPersonnage($allPostPutVars['langage']);

        try{
            $val_langage = $langage->switch_set_langage($MonPersonnage, $allPostPutVars['val']);

            $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session
            
            $data = array(  
                'success' => 1, 
                'nb_point' => $val_langage
            );
    
            return $response->withJson($data);

        }catch(Exception $e){

            $data = array(
                'success' => 0,
            );

            return $response->withJson($data);
        }
    }

    function add_competence_additionnel(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $comp[$allPostPutVars['comp']] = $allPostPutVars['val'];
        $key = $allPostPutVars['key'];

        try{
            $MonPersonnage->set_comp($comp, $key);

            // var_dump($MonPersonnage);
            $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session
            
            $data = array(  
                'success' => 1,
            );
    
            return $response->withJson($data);

        }catch(Exception $e){

            $data = array(
                'success' => 0,
            );

            return $response->withJson($data);
        }
    }

    function add_carac_additionnel(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $caracteristique[$allPostPutVars['carac']] = $allPostPutVars['val'];

        try{
            $MonPersonnage->set_caracteristique($caracteristique, 'val'); //Je met dans mon objet les valeurs des caracteristiques

            // var_dump($MonPersonnage);
            $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

            $data = array(  
                'success' => 1,
            );
    
            return $response->withJson($data);

        }catch(Exception $e){

            $data = array(
                'success' => 0,
            );

            return $response->withJson($data);
        }
    }

    function add_habilite_speciale(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $habilite_speciale = $allPostPutVars['habilite_speciale'];
        $habilite = new FactoryPersonnage($habilite_speciale);
        
        try{
            
            $message = $habilite->switch_habilite_speciale($MonPersonnage);

            // var_dump($MonPersonnage);
            $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

            $data = array(  
                'success' => 1,
                'message' => $message
            );
    
            return $response->withJson($data);

        }catch(Exception $e){

            $data = array(
                'success' => 0,
            );

            return $response->withJson($data);
        }
    }

    function add_option_finance(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $option_finance = $allPostPutVars['option_finance'];
        $finance = new FactoryPersonnage($option_finance);
        
        try{
            
            $message = $finance->switch_option_finance($MonPersonnage);

            // var_dump($MonPersonnage);
            $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

            $data = array(  
                'success' => 1,
                'message' => $message
            );
    
            return $response->withJson($data);

        }catch(Exception $e){

            $data = array(
                'success' => 0,
            );

            return $response->withJson($data);
        }
    }
}
