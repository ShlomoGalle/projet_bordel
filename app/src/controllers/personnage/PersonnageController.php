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

        // var_dump($capacite);
        $_SESSION['MonPersonnage'] = serialize($MonPersonnage); //Stock mon objet en session

        $data = array(
            'success' => 1, 
            'identite' => $identite,
            'caracteristique' => $caracteristique,
            'competence_val' => $competence_val,
            'competence_niveau' => $competence_niveau,
            'capacite' => $capacite,
            // 'liste_de_sort' => ,
            // 'inventaire' => ,
        );
        return $response->withJson($data);
    }

}
