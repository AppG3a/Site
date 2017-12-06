<?php $css = "design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Contact"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

        <h1>Numéro Domisep</h1>
        
        <p>Mettre formulaire ici</p>
        
        <div class="back_button">
        	<a href="index.php?action=see_contact">Retour</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>