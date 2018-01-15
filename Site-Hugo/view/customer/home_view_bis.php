<?php $css = "design/customer/home_view_bis.css?<?php echo time(); ?"; ?>
<?php $title = "Harvey"; ?>


<?php ob_start(); ?>

<div class="content">

    <h1>Bienvenue</h1>
    
    <a href="index.php?action=see_profile">Profil</a><br/>
    <a href="index.php?action=see_contact">Contacter le support</a>

</div>    
<?php $content = ob_get_clean(); ?>

<?php require("view/customer/template_bis.php"); ?>