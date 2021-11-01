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


$app->post('/home',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':home');
$app->post('/var_dump',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':var_dump');

$app->post('/initialisation_caracteristique',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':initialisation_caracteristique');
$app->post('/instanciation_class_personnage',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':instanciation_class_personnage');
$app->post('/add_langage_additionnel',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_langage_additionnel');
$app->post('/add_competence_additionnel',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_competence_additionnel');
$app->post('/add_carac_additionnel',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_carac_additionnel');
$app->post('/add_habilite_speciale',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':add_habilite_speciale');

$app->post('/home2',\App\Controllers\PagesController::class.':home');


$app->run();
