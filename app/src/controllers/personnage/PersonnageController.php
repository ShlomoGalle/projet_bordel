<?php
namespace App\Controllers\Personnage;

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

class PersonnageController extends Bdd {

    function get_info_personnage(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $identite[] = $MonPersonnage->get_nom();
        $identite[] = $MonPersonnage->get_identite_race();
        $identite[] = $MonPersonnage->get_identite_taille();
        $identite[] = $MonPersonnage->get_identite_age();
        $identite[] = $MonPersonnage->get_identite_poids();
        $identite[] = $MonPersonnage->get_identite_cheveux();
        $identite[] = $MonPersonnage->get_identite_yeux();
        $identite[] = $MonPersonnage->get_identite_signeparticulier();

        $caracteristique[] = $MonPersonnage->get_caracteristique_force_total();
        $caracteristique[] = $MonPersonnage->get_caracteristique_agilite_total();
        $caracteristique[] = $MonPersonnage->get_caracteristique_constitution_total();
        $caracteristique[] = $MonPersonnage->get_caracteristique_intelligence_total();
        $caracteristique[] = $MonPersonnage->get_caracteristique_intuition_total();
        $caracteristique[] = $MonPersonnage->get_caracteristique_presence_total();

        $competence_val[] = $MonPersonnage->get_comp_manoeuvreetmouvement_sansarmure_total('val');
        $competence_val[] = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirsouple_total('val');
        $competence_val[] = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirrigide_total('val');
        $competence_val[] = $MonPersonnage->get_comp_manoeuvreetmouvement_cottedemaille_total('val');
        $competence_val[] = $MonPersonnage->get_comp_manoeuvreetmouvement_plate_total('val');
        $competence_val[] = $MonPersonnage->get_comp_arme_tranchantunemain_total('val');
        $competence_val[] = $MonPersonnage->get_comp_arme_contondantunemain_total('val');
        $competence_val[] = $MonPersonnage->get_comp_arme_deuxmains_total('val');
        $competence_val[] = $MonPersonnage->get_comp_arme_armedelance_total('val');
        $competence_val[] = $MonPersonnage->get_comp_arme_projectile_total('val');
        $competence_val[] = $MonPersonnage->get_comp_arme_armedhast_total('val');
        $competence_val[] = $MonPersonnage->get_comp_generale_escalade_total('val');
        $competence_val[] = $MonPersonnage->get_comp_generale_equitation_total('val');
        $competence_val[] = $MonPersonnage->get_comp_generale_natation_total('val');
        $competence_val[] = $MonPersonnage->get_comp_generale_pistage_total('val');
        $competence_val[] = $MonPersonnage->get_comp_subterfuge_embuscade_total('val');
        $competence_val[] = $MonPersonnage->get_comp_subterfuge_filatdissim_total('val');
        $competence_val[] = $MonPersonnage->get_comp_subterfuge_crochetage_total('val');
        $competence_val[] = $MonPersonnage->get_comp_subterfuge_desarmementdepiege_total('val');
        $competence_val[] = $MonPersonnage->get_comp_magie_lecturederune_total('val');
        $competence_val[] = $MonPersonnage->get_comp_magie_utilisationdobjet_total('val');
        $competence_val[] = $MonPersonnage->get_comp_magie_directiondesort_total('val');
        $competence_val[] = $MonPersonnage->get_comp_physique_developcorporel_total('val');
        $competence_val[] = $MonPersonnage->get_comp_physique_perception_total('val');

        $competence_niveau[] = $MonPersonnage->get_comp_manoeuvreetmouvement_sansarmure_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirsouple_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_manoeuvreetmouvement_cuirrigide_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_manoeuvreetmouvement_cottedemaille_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_manoeuvreetmouvement_plate_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_arme_tranchantunemain_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_arme_contondantunemain_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_arme_deuxmains_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_arme_armedelance_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_arme_projectile_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_arme_armedhast_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_generale_escalade_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_generale_equitation_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_generale_natation_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_generale_pistage_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_subterfuge_embuscade_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_subterfuge_filatdissim_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_subterfuge_crochetage_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_subterfuge_desarmementdepiege_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_magie_lecturederune_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_magie_utilisationdobjet_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_magie_directiondesort_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_physique_developcorporel_total('niveau');
        $competence_niveau[] = $MonPersonnage->get_comp_physique_perception_total('niveau');

        
        $capacite = [];
        ($MonPersonnage->get_capacite_infravision()) ? $capacite[] = 'Infravision' : '';
        ($MonPersonnage->get_capacite_vision_nocturne()) ? $capacite[] = 'Vision Nocturne' : '';


        $liste_de_sort = [];
        $liste_de_sort_acquis = $MonPersonnage->get_liste_sort_acquis_like_array();
        if(isset($liste_de_sort_acquis) && $liste_de_sort_acquis != null)
        {
            foreach ($liste_de_sort_acquis as $key => $value) {
                $liste_de_sort[] = $value;
                $liste_de_sort[] = 'Oui';
                $liste_de_sort[] = 'Finit';
            }
        }
        $liste_de_sort_apprentissage = $MonPersonnage->get_liste_sort_apprentissage_like_array();
        if(isset($liste_de_sort_apprentissage) && $liste_de_sort_apprentissage != null)
        {
            foreach ($liste_de_sort_apprentissage as $key => $value) {
                $liste_de_sort[] = $key;
                $liste_de_sort[] = 'Non';
                $liste_de_sort[] = $value;
            }
        }


        $langue = [];
        $temp_langue[] = 'Adunaic';
        $temp_langue[] = 'Apysaic';
        $temp_langue[] = 'Atliduk';
        $temp_langue[] = 'Haradaic';
        $temp_langue[] = 'Khuzdul';
        $temp_langue[] = 'Kuduk';
        $temp_langue[] = 'Labba';
        $temp_langue[] = 'Logathig';
        $temp_langue[] = 'Nahaiduk';
        $temp_langue[] = 'Noirparler';
        $temp_langue[] = 'Orque';
        $temp_langue[] = 'Pukael';
        $temp_langue[] = 'Quenya';
        $temp_langue[] = 'Rohirric';
        $temp_langue[] = 'Sindarin';
        $temp_langue[] = 'Sylvain';
        $temp_langue[] = 'Umitic';
        $temp_langue[] = 'Varadja';
        $temp_langue[] = 'Waildyth';
        $temp_langue[] = 'Westron';
        
        foreach ($temp_langue as $key => $value) {
            $methode = 'get_langue_'.$value;
            if (method_exists($MonPersonnage, $methode))
            {
                $temp_langue_val = $MonPersonnage->$methode();

                if($temp_langue_val != 0)
                {
                    $langue[] = $value;
                    $langue[] = $temp_langue_val;
                }
            }
        }

        $poid_inventaire['transportable'] = $MonPersonnage->get_poids_transportable();
        $poid_inventaire['transporte'] = $MonPersonnage->get_poids_transporte();
        $poid_inventaire['penalite_encombrement'] = $MonPersonnage->get_penalitedencombrement();

        $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

        $data = array(
            'success' => 1, 
            'identite' => $identite,
            'caracteristique' => $caracteristique,
            'competence_val' => $competence_val,
            'competence_niveau' => $competence_niveau,
            'capacite' => $capacite,
            'liste_de_sort' => $liste_de_sort,
            'langue' => $langue,
            'inventaire' => $MonPersonnage->get_inventaire(),
            'poid_inventaire' => $poid_inventaire,
        );
        return $response->withJson($data);
    }

    function get_inventaire(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

        $data = array(
            'success' => 1,
            'inventaire' => $MonPersonnage->get_inventaire()
        );
        return $response->withJson($data);
    }

    function equiper_desequiper(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        $MonPersonnage = unserialize($_SESSION['MonPersonnage']); //Recupere mon objet stockee en session

        $methode = $allPostPutVars['action']; //LA METHODE PEUT ETRE "EQUIPER" OU "DESEQUIPER"
        $MonPersonnage->$methode($allPostPutVars['type_objet'], $allPostPutVars['id_objet']);

        $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session
        $data = array(
            'success' => 1,
        );
        return $response->withJson($data);
    }
}
