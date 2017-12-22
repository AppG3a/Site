<?php $css = "design/customer/account_access_view.css?<?php echo time(); ?"; ?>
<?php $title = "Harvey"; ?>


<div class="center">
    
    <?php ob_start(); ?>
    
    <div class="content">
        
        <a href="index.php">Accéder à mon espace utilisateur</a>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/customer/template.php"); ?>
</div>