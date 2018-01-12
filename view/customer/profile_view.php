<?php $css = "../../design/customer/profile_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mon profil"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
			<a href="#" title="Changer la photo de profil"><img src="../../design/picture/profil_2.png" alt="Photo profil" class="profile_picture"/></a>
            <p class="left_justify">
            	<!-- Pseudo : <?= $profile["pseudo"] ?><br/> -->
            	<?= $profile["prenom"] ?> <?= $profile["nom"] ?><br/>
				<?= $profile["adresse"] ?><br/>
				<?= $profile["mail"] ?><br/>            	
            </p>
        </div>
        
        <!-- <div class="back_button"> -->
        <div class="right_nav">
            <a href="roter.php?action=see_profile_modification">Modifier mon profil</a>
            <a href="roter.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>