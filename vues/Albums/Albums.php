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
<main id="main" role="main">
    <section class="jumbotron text-center" id="mainBanner">
        <div class="container">
            <h1 class="jumbotron-heading">Bonjour <?php echo $_SESSION['login']; ?></h1>
            <p class="lead text-muted">Vous trouverez ci-dessous l'ensemble des diaporamas que vous avez créé</p>
            <p>
                <a href="creationDiapo" class="btn btn-primary my-2">Créer un nouveau diaporama</a>
                
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="collection-heading">
                    <span>Ma Collection</span>
                </div>
            </div>

            <div class="row">
                <?php
                    if(!empty($donneesSlider)) {
                        foreach($donneesSlider as $donnee)
                        {
                            echo '<div class="col-md-4"><div class="card mb-4 box-shadow">';
                            echo '<img class="card-img-top" src="'.$cheminsImage[$donnee->getIdSlider()].'" alt="">';
                            echo '<div class="card-body">';
                            echo '<p class="card-text">'.$donnee->getNom().'</p>';
                            echo '<div class="d-flex justify-content-between align-items-center">';
                            echo '<div class="btn-group"><button type="button" id="'.$donnee->getIdSlider().'" class="btn btn-sm btn-outline-secondary">View</button>';
                            echo ' <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></div>';
                            $result = $donnee->getDateCreation()->format('d/m/Y');
                            echo '<small class="text-muted">'.$result.'</small>';
                            echo '</div></div></div></div>';
                        }
                    } else {
                        echo '<div class="container text-center">
                        <p class="lead text-muted">Vous n\'avez aucun diaporama</p>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-primary scrollUp">
        <i class="fa fa-arrow-circle-o-up"></i>
    </a>
</main>
<!-- Footer -->
<?php
    require_once 'vues/ressources/footer.php';
?>
</body>
</html>