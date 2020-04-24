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
<link rel="stylesheet" href="vues/lib/notiflix/notiflix-2.1.3.min.css">
<script src="vues/lib/notiflix/notiflix-2.1.3.min.js"></script>
<script src="vues/js/album/album.js"></script>
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
            <form id="viewSliderForm" action="viewSlider" method="POST">
                <input id="idSlider" name="idSlider" type="hidden" value="">
            </form>

            <div class="row">
                <?php
                    if(!empty($donneesSlider)) {
                        foreach($donneesSlider as $donnee)
                        {
                            echo '<div class="col-md-4" id="diapo-'.$donnee->getIdSlider().'"><div class="card mb-4 box-shadow">';
                            echo '<img class="card-img-top" src="'.$cheminsImage[$donnee->getIdSlider()].'" alt="">';
                            echo '<div class="card-body">';
                            echo '<p class="card-text">'.$donnee->getNom().'</p>';
                            echo '<div class="d-flex justify-content-between align-items-center">';
                            echo '<div class="btn-group"><button type="button" href="#" onclick="viewSlider(event,'.$donnee->getIdSlider().')" id="'.$donnee->getIdSlider().'" class="btn btn-sm btn-outline-secondary">Voir</button>';
                            echo '<button type="button" class="btn btn-sm btn-outline-secondary">Editer</button>';
                            echo '<button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteSlider(event, '.$donnee->getIdSlider().', \''.$donnee->getNom().'\')">Supprimer</button></div>';
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