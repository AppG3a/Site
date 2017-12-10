<?php $css = "design/admin/account_access_view.css?<?php echo time(); ?"; ?>
<?php $title = "Harvey"; ?>


<div class="center">
    
    <?php ob_start(); ?>
    
    <div class="content">
        
        <a href="index.php">Accéder à mon espace administrateur</a>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>
</div>