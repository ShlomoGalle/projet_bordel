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

        try{
            $MonPersonnage->set_comp($comp);

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




    function comp(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session


        // $comp['comp_manoeuvreetmouvement_sansarmure'] = 3;
        // $comp['comp_manoeuvreetmouvement_cuirsouple'] = 50;        
        // $comp['comp_manoeuvreetmouvement_sansarmure'] = 1;
        // $comp['comp_manoeuvreetmouvement_cuirsouple'] = 1;
        $comp['comp_manoeuvreetmouvement_cuirrigide'] = 1;
        $comp['comp_manoeuvreetmouvement_cottedemaille'] = 1;
        $comp['comp_manoeuvreetmouvement_plate'] = 1;
        $comp['comp_arme_tranchantunemain'] = 1;
        $comp['comp_arme_contondantunemain'] = 1;
        $comp['comp_arme_deuxmains'] = 1;
        $comp['comp_arme_armedelance'] = 1;
        $comp['comp_arme_projectile'] = 1;
        $comp['comp_arme_armedhast'] = 1;
        $comp['comp_generale_escalade'] = 1;
        $comp['comp_generale_equitation'] = 1;
        $comp['comp_generale_natation'] = 1;
        $comp['comp_generale_pistage'] = 1;
        $comp['comp_subterfuge_embuscade'] = 1;
        $comp['comp_subterfuge_filatdissim'] = 1;
        $comp['comp_subterfuge_crochetage'] = 1;
        $comp['comp_subterfuge_desarmementdepiege'] = 1;
        $comp['comp_magie_lecturederune'] = 1;
        $comp['comp_magie_utilisationdobjet'] = 1;
        $comp['comp_magie_directiondesort'] = 1;
        $comp['comp_physique_developcorporel'] = 1;
        $comp['comp_physique_perception'] = 1;

        try{
            $MonPersonnage->set_caracteristique_val($caracteristique); //Je met dans mon objet les valeurs des caracteristiques
            $MonPersonnage->set_comp($comp, 'degre');

            var_dump($MonPersonnage);
            $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

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
}
