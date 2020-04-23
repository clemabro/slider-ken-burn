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
<script src="vues/lib/main.min.js"></script>
<link rel="stylesheet" href="vues/lib/main.min.css">
<div class="loader"></div>
<?php
include_once 'vues/ressources/navBar.php';
?>
    <div class="text-center container">
       <h1 class="text-center">Création Diaporama</h1>
       <hr/>
       <form id="image" action="upload.php" method="post" enctype="multipart/form-data">
           <div class="form-group">
               <input type="text" name="username" id="username" tabindex="1" required class="text-center form-control" placeholder="Nom du Slide" value="">
           </div>
            Select image to upload:
           <div class="form-group">
                <input type="file" id="inputPicture"  name="image" multiple="multiple" />
           </div>
           <input type="hidden" id="identifiantSlider" value="0"></form>
       </form>
    </div>
    <script type="text/javascript" src="vues/Slider/ajaxImageUpload.js"></script>
</body>

<?php
require_once 'vues/ressources/footer.php';
?>
