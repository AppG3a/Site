<?php $css = "../../design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Contact"; ?>


    
    <?php ob_start(); ?>
    <?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <div class="content">

		<div class="sub_content">
            <h1>Numéro Domisep</h1>
            
            <p><?= $phone_number ?></p>
        </div>
        
        
        <!-- <div class="back_button"> -->
        <div class="right_nav">
        	<a href="roter.php?action=see_phone_number_modification">Modifier le numéro</a>
            <a href="roter.php">Revenir à la page d'accueil</a>
        </div>

    </div>  
    </div>

<?php include("bloc_footer_view.php")?>  
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
