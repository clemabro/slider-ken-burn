<?php

/*
    Import des fichers
*/
require_once __DIR__.'/connexionBdd.php';
require_once __DIR__.'/ImageManager.php';
require_once __DIR__.'/RelUserImageSliderManager.php';
require_once __DIR__.'/SliderManger.php';
require_once __DIR__.'/UserManger.php';

/*
    Instance des managers
*/
function getImageManager() {
    return new ImageManager(connexionBdd());
}

function getRelUserImageSliderManager() {
    return new RelUserImageSliderManage(connexionBdd());
}

function getSliderManager() {
    return new SliderManager(connexionBdd());
}

function getUserManager() {
    return new UserManager(connexionBdd());
}
?>