<?php


function albums()
{

    $donneesSlider = array();
    $identifiantsEnvoyes = array();
    $cheminsImage = array();
    $donneesREL = getRelUserImageSliderManager()->getRelUserImageSliderByLogin($_SESSION['login']);

    if(!empty($donneesREL)) {
        foreach ($donneesREL as $relationI)
        {
            if (!in_array($relationI->getIdSlider(),$identifiantsEnvoyes))
            {
                array_push($donneesSlider,getSliderManager()->getSliderById($relationI->getIdSlider()));
                $cheminsImage[strval($relationI->getIdSlider())] = getImageManager()->getImageById($relationI->getIdImage())->getChemin();
                array_push($identifiantsEnvoyes,$relationI->getIdSlider());

            }

        }
    }

    $title = "Ma Collection";
    require __DIR__.'/../vues/Albums/albums.php';
}
?>