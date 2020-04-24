<html>
    <head>
        <link  href="vues/lib/cropper/cropper.css" rel="stylesheet">
        <script src="vues/lib/cropper/cropper.js"></script>
    </head>
    <body>

        <div class="slideshow-container">

            <?php
                if(!empty($donneesImages)) {
                    $index = 1;
                    var_dump($donneesImages);
                    foreach($donneesImages as $donnee){

                        echo'<div class="mySlides fade">';
                        echo'<div class="numbertext">'.$index.'/'.count($donneesImages).'</div>';
                        echo'<img id="image" src="'.$donnee->getChemin().'" style="width:100%">';
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
                    echo '<span class="dot" onclick="currentSlide(' . $index . ')"></span>';
                    $index++;
                }
            }

            ?>
        </div>
    </body>
    <script type="text/javascript">
        // import 'cropperjs/dist/cropper.css';

        const image = document.getElementById('image');
        const cropper = new Cropper(image, {
            aspectRatio: 16 / 9,
            crop(event) {
                console.log(event.detail.width);
                console.log(event.detail.height);
            },
        });</script>
</html>