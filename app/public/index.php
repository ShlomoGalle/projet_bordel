<?php

require '../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
    ],
]);


$app->add(function ($request, $response, $next) {
    $response = $next($request, $response);
    return $response->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

// POUR FAIRE UN VAR DUMP
$app->post('/var_dump',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':var_dump');


// TOUTES LES FONCTIONS PAR DEFAULT
$app->post('/default',App\Controllers\DefaultFunction::class.':default');

// CONNEXION A SON COMPTE (et deconnexion)
$app->post('/connexion',App\Controllers\Compte\Connexion::class.':connexion');
$app->post('/deconnexion',App\Controllers\Compte\Connexion::class.':deconnexion');

//INSCRIPTION
$app->post('/inscription',App\Controllers\Compte\Inscription::class.':inscription');


// CREATION DE PERSONNAGE
$app->post('/initialisation_caracteristique',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':initialisation_caracteristique');
$app->post('/instanciation_class_personnage',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':instanciation_class_personnage');
$app->post('/add_identite',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_identite');
$app->post('/add_langage_additionnel',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_langage_additionnel');
$app->post('/add_competence_additionnel',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_competence_additionnel');
$app->post('/add_carac_additionnel',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_carac_additionnel');
$app->post('/add_habilite_speciale',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_habilite_speciale');
$app->post('/add_option_finance',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_option_finance');
$app->post('/add_sort_additionnel',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_sort_additionnel');
$app->post('/finir_mon_personnage',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':finir_mon_personnage');

// CARTE
$app->post('/get_info_carte',App\Controllers\Carte\CarteController::class.':get_info_carte');

$app->run();
