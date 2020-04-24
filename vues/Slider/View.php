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
        $counter = 1;
        foreach($imgs as $img)
        {
            echo '<div class="mySlides">';
            echo '<div class="numbertext">'.$counter.' / '.(count($imgs)).'</div>';
            echo '<img src="'.$img->getChemin().'" style="width: 100%;
            height: auto; max-height:800;">';
            echo '<div class="text">'.$img->getTitre().'</div>';
            echo '</div>';
            $counter++;
        }
    }
  ?>
<br>
<script src="vues/js/slide/view.js"></script>