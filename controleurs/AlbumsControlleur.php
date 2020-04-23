<?php


function albums()
{
    $donneesSlider = array();
    $identifiantsEnvoyes = array();
    $cheminsImage = array();
    $donneesREL = getRelUserImageSliderManager()->getRelUserImageSliderByLogin('EtoileNocturne');

    if(!empty($donneesREL)) {
        foreach ($donneesREL as $relationI)
        {
            if (!array_key_exists($relationI->getIdSlider(),$identifiantsEnvoyes))
            {
                array_push($donneesSlider,getSliderManager()->getSliderById($relationI->getIdSlider()));
                $cheminsImage[strval($relationI->getIdSlider())] = getImageManager()->getImageById($relationI->getIdImage())->getChemin();
                array_push($identifiantsEnvoyes,$relationI->getIdSlider());

            }

        }
    }
    require __DIR__.'/../vues/Albums/albums.php';
}



?>