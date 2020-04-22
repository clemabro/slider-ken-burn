<?php

require_once __DIR__.'/controleurs/ConnexionControlleur.php';

$request = $_SERVER['REQUEST_URI'];
$dossierActuel = basename(__DIR__);

switch ($request) {
    case '/'.$dossierActuel.'/':
        connexion();
        break;
    case '/'.$dossierActuel:
        connexion();
        break;
    case '/'.$dossierActuel.'/isExistUser':
        isExistUser();
        break;
    default:
        http_response_code(404);
        require __DIR__.'/vues/404.php';
        break;
}