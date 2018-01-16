<?php $css = "../../design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Profil"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

		<div class="sub_content">

            <p class="left_justify">
            	Nom : <?= $profile["nom"] ?><br/>
            	Prénom : <?= $profile["prenom"] ?><br/>
            	Adresse : <?= $profile["adresse"] ?><br/>
            	Mail : <?= $profile["mail"] ?><br/>
            	Pseudo : <?= $profile["pseudo"] ?><br/>
            </p>
        </div>
        
        <!-- <div class="back_button"> -->
        <div class="right_nav">
            <a href="roter.php?action=see_profile_modification">Modifier mon profil</a>
            <a href="roter.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>