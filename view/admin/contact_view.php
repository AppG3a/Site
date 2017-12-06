<?php $css = "design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Contact"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

        <h1>Numéro Domisep</h1>
        
        <p><?= $phone_number ?></p>
        
        <div class="back_button">
        	<a href="index.php?action=see_phone_number_modification">Modifier le numéro de contact Domisep</a>
            <a href="index.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>