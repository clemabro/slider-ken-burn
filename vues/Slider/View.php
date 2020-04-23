<?php
    require_once 'vues/ressources/header.php';
?>
<?php
    include_once 'vues/ressources/navBar.php';
?>
<div class="text-center container">
       <h1 class="text-center"><?php echo $slider->getNom(); ?></h1>
       <small class="text-muted"><?php echo $slider->getDateCreation()->format('d/m/Y'); ?></small>
       <hr/>
</div>