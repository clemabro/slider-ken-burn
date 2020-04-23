<?php

function albums()
{
    $donneesSlider = array();
    $identifiantsEnvoyes = array();
    $cheminsImage = array();
    $donneesREL = getRelUserImageSliderManager()->getRelUserImageSliderByLogin('test');
    var_dump($donneesREL);

    if(!empty($donneesREL)) {
        foreach ($donneesREL as $relationI)
        {
            echo 'HELLOOOO';
            var_dump($relationI);
            if (!array_key_exists($relationI->getIdSlider(),$identifiantsEnvoyes))
            {
                array_push($donneesSlider,getSliderManager()->getSliderById($relationI->getIdSlider()));
                //$cheminsImage[strval($relationI->getIdSlider())] = getImageManager()->getImageById($relationI->getIdImage());
                array_push($identifiantsEnvoyes,$relationI->getIdSlider());

            }

        }
    }

    $title = "Vos Albums";
    require __DIR__.'/../vues/Albums/albums.php';
}



?>