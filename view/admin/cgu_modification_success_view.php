<?php $css = "../../design/admin/home_view.css"; ?>
<?php $title = "Conditions générales d'utilisation"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">
    
    	<div class="sub_content">
    		<p><strong>LES MODIFICATIONS ONT ETE EFFECTUEES</strong></p>
            <p><?= $cgu["texte"] ?></p>
        </div>
        
        <div class="right_nav">
			<a href="roter.php?action=see_cgu_modification">Modifier les CGU</a>
		</div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>