<?php
    require_once 'vues/ressources/header.php';
?>
<link rel="stylesheet" href="vues/css/slide/view.css">

<?php
    include_once 'vues/ressources/navBar.php';
?>
<div class="text-center container">
    <h1 class="text-center"><?php echo $slider->getNom(); ?></h1>
    <small class="text-muted"><?php echo $slider->getDateCreation()->format('d/m/Y'); ?></small>
    <hr/>
</div>
<div class="slideshow-container">

  <?php
    if(!empty($imgs))
    {
        foreach($imgs as $img)
        {
            echo '<div class="mySlides">';
            echo '<div class="numbertext">'.(key($imgs)+1).' / '.(count($imgs)+1).'</div>';
            echo '<img src="'.$img->getChemin().'" style="width:100%">';
            echo '<div class="text">'.$img->getTitre().'</div>';
            echo '</div>';
        }
    }
  ?>
  <div class="mySlides">
    <div class="numbertext">2 / 2</div>
    <img src="vues/img/Cocacio/5ea28fcee095e.jpg" style="width:100%">
    <div class="text">Caption 2</div>
  </div>
</div>
<br>
<script src="vues/js/slide/view.js"></script>