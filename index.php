<?php
 //On demarre la session
 session_start();
require  __DIR__.'./modeles/Managers.php';
require_once __DIR__.'/controleurs/ConnexionControlleur.php';
require_once __DIR__.'/controleurs/AlbumsControlleur.php';
require_once __DIR__ . '/controleurs/SlideControlleur.php';

$request = $_SERVER['REQUEST_URI'];
$dossierActuel = basename(__DIR__);

// Routage
switch ($request) {
    case '/'.$dossierActuel.'/':
        header('Location: connexion');
        break;
    case '/'.$dossierActuel:
        header('Location: connexion');
        break;
    case '/'.$dossierActuel.'/connexion':
        connexion();
        break;
    case '/'.$dossierActuel.'/albums':
        albums();
        break;
    case '/'.$dossierActuel.'/editionDiapo':
        edit();
        break;
    case '/'.$dossierActuel.'/creationDiapo':
        creationDiapo();
        break;
    case '/'.$dossierActuel.'/modifierSlider':
        modifierSlider();
        break;
    case '/'.$dossierActuel.'/isExistUser':
        isExistUser();
        break;
    case '/'.$dossierActuel.'/inscription':
        inscription();
        break;
    case '/'.$dossierActuel.'/connexionUser':
        connexionUser();
        break;
    case '/'.$dossierActuel.'/deconnexion':
        deconnexion();
        break;
    case '/'.$dossierActuel.'/ajoutImage':
        uploadImage();
        break;
    case '/'.$dossierActuel.'/viewSlider':
        viewSlider();
        break;
    case '/'.$dossierActuel.'/supprimerDiapo':
        supprimerSlider();
        break;
    default:
        http_response_code(404);
        $title = "404";
        require __DIR__.'/vues/404.php';
        break;
}