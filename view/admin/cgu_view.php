<?php $css = "design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Conditions générales d'utilisation"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

        <p>
        	<?= $cgu["texte"] ?>
        </p>
		<a href="index.php?action=see_cgu_modification">Modifier les conditions générales d'utilisation</a>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>