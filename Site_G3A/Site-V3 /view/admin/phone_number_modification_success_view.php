<?php $css = "../../design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Contact"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

		<div class="sub_content">
            <h1>Numéro Domisep</h1>
            <p><strong>LE NUMERO A BIEN ETE CHANGE</strong></p>
            <p><?= $phone_number ?></p>
        </div>
            
            <!-- <div class="back_button"> -->
            <div class="right_nav">
            	<a href="roter.php?action=see_phone_number_modification">Modifier le numéro de contact Domisep</a>
                <a href="roter.php">Revenir à la page d'accueil</a>
            </div>
    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>