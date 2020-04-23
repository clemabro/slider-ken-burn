<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Vos Albums</title>
    <!-- Required meta tags always come first -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Font Awesome-->
    <link rel="stylesheet" href="vues/dist/font-awesome/css/font-awesome.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="vues/css/main.min.css">
    <!--[if IE]>
    <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie9.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <link href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-ie8/css/bootstrap-ie8.min.css" rel="stylesheet">
    <![endif]-->
</head>

<body>
<div class="loader"></div>
<header id="header">
    <div class="collapse" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4>About</h4>
                    <p class="text-muted">Album is a contemporary template that's perfect for anyone looking to make a big first impression.
                        With beautiful headline and navigation elements, Album ensures that your content always looks
                        stunning.
                    </p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4" id="contact-info">
                    <h4>Contact</h4>
                    <ul class="list-unstyled">
                        <li>
                            <a href="https://twitter.com/orbitThemes">
                                <i class="fa fa-twitter"></i> Follow on Twitter</a>
                        </li>
                        <li>
                            <a href="https://facebook.com/orbitThemes">
                                <i class="fa fa-facebook"></i> Like on Facebook</a>
                        </li>
                        <li>
                            <a href="mailto:themesorbit@gmail.com?Subject=Hello" target="_top">
                                <i class="fa fa-envelope"></i> Email me</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-light box-shadow">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="#" id="header-logo">
                <img src="https://raw.githubusercontent.com/orbitthemes/Orbit-Themes/master/assets/logo.png" class="img-fluid" alt="Orbit Themes">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
<main id="main" role="main">
    <section class="jumbotron text-center" id="mainBanner">
        <div class="container">
            <h1 class="jumbotron-heading">Vos Albums</h1>
            <p class="lead text-muted">Vous trouverez ci-dessous l'ensemble des diaporamas que vous avez créé</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Créer un nouveau diaporama</a>
                <a href="#" class="btn btn-secondary my-2">Déconnexion</a>
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
<!-- jQuery first, then Bootstrap JS. -->
<script src="vues/dist/jquery/jquery.min.js"></script>
<script src="vues/dist/popper/popper.min.js" integrity=""></script>
<script src="vues/dist/bootstrap/js/bootstrap.min.js"></script>
<script src="vues/js/main.min.js"></script>
</body>

</html>