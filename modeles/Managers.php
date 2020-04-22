<?php

/*
    Import des fichers
*/
require_once __DIR__.'/connexionBdd.php';
require_once __DIR__.'/ImageManager.php';
require_once __DIR__.'/RelUserImageSliderManager.php';
require_once __DIR__.'/SliderManager.php';
require_once __DIR__.'/UserManager.php';

/*
    Instance des managers
*/
function getImageManager() {
    return new ImageManager(connexionBdd());
}

function getRelUserImageSliderManager() {
    return new RelUserImageSliderManager(connexionBdd());
}

function getSliderManager() {
    return new SliderManager(connexionBdd());
}

function getUserManager() {
    return new UserManager(connexionBdd());
}
?>