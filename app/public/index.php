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
$app->post('/instanciation_class_personnage',App\Controllers\Personnage\CreationPersonnage\CreationPersonnageController::class.':instanciation_class_personnage');

$app->post('/home2',\App\Controllers\PagesController::class.':home');


$app->run();
