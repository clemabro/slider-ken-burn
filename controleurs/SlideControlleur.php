<?php
require_once 'modeles/entites/Slider.php';
require_once 'modeles/entites/Image.php';


function creationDiapo()
{
    $title = "Création Slides";
    require 'vues/Slider/create.php';
}

function uploadImage()
{
    $idSlider = $_POST['idSlider'];

    if ($idSlider == 0) {
        $slider = new Slider(array(
            'nom' => "",
            'dateCreation' => date("Y/m/d"),
            'dateMaj' => date("Y/m/d")
        ));
        $newSlider = getSliderManager()->createSlider($slider);
        $idSlider = $newSlider->getIdSlider();
    }


    $target_dir = 'vues/img/' . $_SESSION['login'] . '/';
    $target_file = $target_dir . uniqid();
    $imageFileType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);


    if (!file_exists($target_dir)) {
        mkdir($target_dir, 777);
    }

    $etat = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file . '.' . $imageFileType);

    if ($etat == true) {

        if (file_exists($target_file)) {
            header('HTTP/1.1 500 Internal Server Error');
            $uploadOk = 0;
        }
        $image = new Image(array(
            'chemin' => $target_file.'.'.$imageFileType,
            'hauteur_destination'=>0.0
        ));

        $newImage = getImageManager()->createImage($image);


        $relUsImSlMa = new RelUserImageSlider(array(
            'login' => $_SESSION['login'],
            'idSlider' => $idSlider,
            'idImage' => $newImage->getIdImage()
        ));

        getRelUserImageSliderManager()->createRelUserImageSlider($relUsImSlMa);
    }
    header('Content-Type: application/json;charset=utf-8');
    echo json_encode(array(
        'idSlider' => $idSlider,
        'nomImage' => $_FILES["image"]["name"],
        'etat' => $etat
    ));

}

function viewSlider()
{
    if(!isset($_POST['idSlider']))
    {
        header('Location: albums');
    } 
    else 
    {
        $title = "Ma Collection";
        $slider = getSliderManager()->getSliderById($_POST['idSlider']);
        $rels = getRelUserImageSliderManager()->getRelUserImageSliderByLoginAndSlider($_SESSION['login'], $_POST['idSlider']);
        $imgs = array();

        foreach ($rels as $rel)
        {
            array_push($imgs, getImageManager()->getImageById($rel->getIdImage()));
        }
        
        require 'vues/Slider/view.php';
    }
}