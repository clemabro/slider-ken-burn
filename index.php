<?php

$request = $_SERVER['REQUEST_URI'];
$dossierActuel = basename(__DIR__);

switch ($request) {
    case '/'.$dossierActuel.'/':
        require __DIR__.'/vues/connexion.php';
        break;
    case '/'.$dossierActuel:
        require __DIR__.'/vues/connexion.php';
        break;
    default:
        http_response_code(404);
        require __DIR__.'/vues/404.php';
        break;
}