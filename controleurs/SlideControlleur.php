<?php
require_once 'modeles/entites/Slider.php';
require_once 'modeles/entites/Image.php';


function creationDiapo()
{
    $title = "Création Slides";
    require 'vues/Slider/create.php';
}

function uploadImage() {
    var_dump($_POST);
    $idSlider = $_POST['idSlider'];

    if($idSlider == 0){
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
    $imageFileType = pathinfo($_FILES["image"]["tmp_name"],PATHINFO_EXTENSION);

    if (!file_exists($target_dir)){
        mkdir($target_dir, 777);
    }
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file.'.'.$imageFileType);

    var_dump($target_file.'.'.$imageFileType);

    if (file_exists($target_file)) {
        header('HTTP/1.1 500 Internal Server Error');
        $uploadOk = 0;
    }

    $image = new Image(array(
        'chemin' => $target_file.$imageFileType,
        'hauteur_destination'=>0.0
    ));

    $newImage = getImageManager()->createImage($image);

    var_dump($newImage);
    $relUsImSlMa = new RelUserImageSlider(array(
        'login' => $_SESSION['login'],
        'idSlider' => $idSlider,
        'idImage' => $newImage->getIdImage()
    ));
    var_dump($relUsImSlMa);
    getRelUserImageSliderManager()->createRelUserImageSlider($relUsImSlMa);

    header('Content-Type: application/json;charset=utf-8');
    echo json_encode(array(
        'idSlider' => $idSlider
    ));

}

function viewSlider()
{
    var_dump($_POST);
    $title = "Ma Collection";
    require 'vues/Slider/view.php';
}