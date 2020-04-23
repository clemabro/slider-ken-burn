<?php
 //On demarre la session
 session_start();

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
            <h1 class="jumbotron-heading">Vos Albums</h1>
            <p class="lead text-muted">Vous trouverez ci-dessous l'ensemble des diaporamas que vous avez créé</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Créer un nouveau diaporama</a>
                
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
                ?>
            </div>
        </div>
    </div>
    <a href="#" class="btn btn-primary scrollUp">
        <i class="fa fa-arrow-circle-o-up"></i>
    </a>
</main>
<!-- Footer -->
<footer id="footer">
    <p class="copyright">Made with
        <i class="fa fa-heart"></i> By
        <a target="_blank" title="Orbit Themes" href="http://www.orbitthemes.com">Orbit Themes</a> &copy;
        <span id="currentYear"></span> All Rights Reserved.
    </p>
    <div class="social">
        <a traget="_blank" href="https://facebook.com/orbitthemes" title="facebook">
            <i class="fa fa-facebook"></i>
        </a>
        <a traget="_blank" href="https://twitter.com/orbitthemes" title="twitter">
            <i class="fa fa-twitter"></i>
        </a>
        <a traget="_blank" href="https://plus.google.com/+orbitthemes" title="Google+" target="_blank">
            <i class="fa fa-google-plus"></i>
        </a>
        <a traget="_blank" href="https://github.com/orbitthemes" title="github" target="_blank">
            <i class="fa fa-github"></i>
        </a>
        <a traget="_blank" href="https://www.behance.net/orbitthemes" title="Behance" target="_blank">
            <i class="fa fa-behance"></i>
        </a>
        <a traget="_blank" href="https://dribbble.com/orbitthemes" title="Dribbble" target="_blank">
            <i class="fa fa-dribbble"></i>
        </a>
        <a traget="_blank" href="https://www.pinterest.com/orbitThemes/" title="Pinterest" target="_blank">
            <i class="fa fa-pinterest"></i>
        </a>
        <a traget="_blank" href="https://www.reddit.com/user/orbitthemes" title="Reddit" target="_blank">
            <i class="fa fa-reddit"></i>
        </a>
        <a traget="_blank" href="https://orbitthemes.com/blog/" title="RSS" target="_blank">
            <i class="fa fa-rss"></i>
        </a>
    </div>
</footer>
</body>
</html>