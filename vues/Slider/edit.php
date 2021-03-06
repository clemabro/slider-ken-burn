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
                        echo'<div id='.$donnee->getIdImage().' class="mySlides">';
                        echo'<div class="numbertext">'.$index.'/'.count($donneesImages).'</div>';
                        echo'<img  class="imgcropper" src="'.$donnee->getChemin().'" >';
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
        <hr/>

        <?php
            if(!empty($donneesImages)) {
                foreach ($donneesImages as $donnee) {
                    echo'<div class="infosImage" id="div'.$donnee->getIdImage().'" class="form-group">';
                    echo'<label class ="col-md-3 text-center ">Largeur Source</label>';
                    echo'<label id="sourceHeight" class ="col-md-3 text-center  ">Hauteur Source</label>';
                    echo'<label class ="col-md-3 text-center ">Largeur Destination</label>';
                    echo'<label id="sourceHeight" class ="col-md-3 text-center ">Hauteur Destination</label><br>';
                    echo'<input type="text" id="SourceWidth'.$donnee->getIdImage().'" class="col-md-3 text-center" placeholder="" value="">';
                    echo'<input type="text" id="SourceHeight'.$donnee->getIdImage().'" class="col-md-3 text-center" placeholder="" value="">';
                    echo'<input type="text" id="DestinationWidth'.$donnee->getIdImage().'" class="col-md-3 text-center " placeholder="" value="">';
                    echo'<input type="text" id="DestinationHeight'.$donnee->getIdImage().'" class="col-md-3 text-center" placeholder="" value="">';
                    echo'</div>';
                 }
            }
        ?>


        <script type="text/javascript">
            // import 'cropperjs/dist/cropper.css';

            const images = $('.imgcropper');


            images.each(function(){
                const cropper = new Cropper(this, {
                    aspectRatio: 16 / 9,
                    minContainerWidth : 1000,
                    minContainerHeight : 500,
                    zoomable : false,
                    crop(event) {
                        var id = this.id;

                        console.log('#div'+id);
                        $('#SourceWidth'+id).attr('value',parseInt(event.detail.width));
                        $('#SourceHeight'+id).attr('value',parseInt(event.detail.height));
                        console.log(event.detail.width);
                        console.log(event.detail.height);
                    },
                });
            });
        </script>
        <script src="vues/js/slide/edit.js"></script>
    </body>
</html>