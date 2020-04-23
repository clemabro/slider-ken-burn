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
       <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
           <div>
                <input type="file" name="fileToUpload" id="fileToUpload">
           </div>
            <input type="submit" value="Upload Image" name="submit">
       </form>
            <input type="file" id="imageUploadForm"  name="image" multiple="multiple" />
        </div>
    </div>

</body>

<?php
require_once 'vues/ressources/footer.php';
?>
