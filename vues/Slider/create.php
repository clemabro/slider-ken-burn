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

<body>

<div class="loader"></div>
<?php
include_once 'vues/ressources/navBar.php';
?>

    <div class="text-center container">
        <form id="editSliderForm" action="editionDiapo" method="POST">
            <input id="identifiantSlider" name="identifiantSlider" type="hidden" value="0">
        </form>
       <h1 class="text-center">Création Diaporama</h1>
       <hr/>
       <form id="image" action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group col-lg-4 offset-lg-4">
                <input type="text" name="username" id="username" tabindex="1" required class="text-center form-control" placeholder="Nom du Slide" value="">
            </div>
            Sélectionnez une par une les images à importer (Max 2Mo) :
            <div class="form-group">
                <input type="file" id="inputPicture"  name="image" multiple="multiple" />
            </div>
            <div class="form-group col-lg-4 offset-lg-4">
                <button type="submit" name="slider-submit" id="slider-submit" tabindex="4" class="form-control btn btn-login" onclick="pageEdition(event);" value="">
                Passer à L'édition des images <i class="fa fa-chevron-right"></i>    
                </button>
            </div>
       </form>

    </div>
    <script type="text/javascript" src="vues/js/create/create.js"></script>

    <script src="vues/lib/notiflix/notiflix-2.1.3.min.js"></script>
<link rel="stylesheet" href="vues/lib/notiflix/notiflix-2.1.3.min.css">
<script src="vues/lib/main.min.js"></script>
<link rel="stylesheet" href="vues/lib/main.min.css">
<link rel="stylesheet" href="vues/css/create/create.css">
</body>

<?php
require_once 'vues/ressources/footer.php';
?>
