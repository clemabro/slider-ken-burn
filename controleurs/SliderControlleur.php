<?php
require_once 'modeles/entites/Slider.php';
require_once 'modeles/entites/Image.php';


function creationDiapo()
{
    $title = "Création Slides";
    require 'vues/Slider/create.php';
}

function uploadImage($idSlider) {

    if($idSlider = 0){
        $slider = new Slider(array(
                'nom' => "",
                'dateCreation' => date("Y/m/d"),
                'dateMaj' => date("Y/m/d")
        ));
        $newSlider = getSliderManager()->createSlider($slider);
        $idSlider = $newSlider->getIdSlider();
    }

    $target_dir = 'vues/img/'.$_SESSION['login'].'/';
    $target_file = $target_dir.uniqid();
    $imageFileType = pathinfo($_FILES["imgProfil"]["name"], PATHINFO_EXTENSION);

    if (file_exists($target_file)) {
        header('HTTP/1.1 500 Internal Server Error');
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        header('HTTP/1.1 500 Internal Server Error');
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imgProfil"]["tmp_name"], $target_file.'.'.$imageFileType)) {


        } else {
            header('HTTP/1.1 500 Internal Server Error');
        }
    }


    $image = new Image(array(
        'chemin' => $target_dir.$target_file
    ));

    $newImage = getImageManager()->createImage($image);

    $relUsImSlMa = new RelUserImageSlider(array(
        'idLogin' => $_SESSION['login'],
        'idSlider' => $idSlider,
        'idImage' => $newImage->getIdImage()
    ));
    getRelUserImageSliderManager()->createRelUserImageSlider($relUsImSlMa);

    return $idSlider;

}

function viewSlider()
{
    var_dump($_POST);
    $title = "Ma Collection";
    require 'vues/Slider/view.php';
}