<?php

require_once __DIR__.'/controleurs/ConnexionControlleur.php';
require_once __DIR__.'/controleurs/AlbumsControlleur.php';

$request = $_SERVER['REQUEST_URI'];
$dossierActuel = basename(__DIR__);

switch ($request) {
    case '/'.$dossierActuel.'/':
        connexion();
        break;
    case '/'.$dossierActuel.'/Albums':
        albums();
        break;
    default:
        http_response_code(404);
        require __DIR__.'/vues/404.php';
        break;
}