<html>
<?php
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['login']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion');
    exit();
}
include_once 'vues/ressources/header.php';
?>
    <head>
        <link  href="vues/css/slide/edit.css" rel="stylesheet">
    </head>
    <body>

        <div class="slideshow-container">

            <?php
                if(!empty($donneesImages)) {
                    $index = 1;
                    foreach($donneesImages as $donnee){
                        echo'<div class="mySlides">';
                        echo'<div class="numbertext">'.$index.'/'.count($donneesImages).'</div>';
                        echo'<img class="imgcropper" src="'.$donnee->getChemin().'" >';
                        echo'<div class="text">'.$donnee->getTitre().'</div>';
                        echo'</div>';
                        $index++;
                    }
                }
            ?>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <?php

            if(!empty($donneesImages)) {
                $index = 1;
                foreach ($donneesImages as $donnee) {
                    echo '<span class="dot" onclick="currentSlide('.$index.')"></span>';
                    $index++;
                }
            }

            ?>
        </div>

        <script type="text/javascript">
            // import 'cropperjs/dist/cropper.css';

            const images = $('.imgcropper');


            images.each(function(){
                const cropper = new Cropper(this, {
                    aspectRatio: 16 / 9,
                    crop(event) {
                        console.log(event.detail.width);
                        console.log(event.detail.height);
                    },
                });
            });
        </script>
        <script src="vues/js/slide/edit.js"></script>
    </body>

</html>