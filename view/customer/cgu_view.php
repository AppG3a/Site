<?php ob_start(); ?>
<?php $css = "../../design/customer/home_view.css"; ?>
<?php $title = "Conditions générales d'utilisation"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>
    
    <div class="content">

		<div class="sub_content">
		
            <p>
            	<?= $cgu["texte"] ?>
            </p>
            
        </div>
        
        <div class="right_nav">
        
			<a href="roter.php">Revenir à la page d'accueil</a>
			
		</div>

    </div>  
 
</div>

<?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
