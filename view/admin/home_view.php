<?php $css = "../../design/admin/home_view.css"; ?>
<?php $title = "Harvey"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

		<div class="sub_content">
            <h1>Compte administrateur</h1>
            
            <p>*Nouveaux messages*</p>
        </div>
        <!-- <a href="index.php?action=see_profile">Profil</a><br/>
        <a href="index.php?action=see_customer_profile_selection">Voir une fiche client</a><br/>
        <a href="index.php?action=see_customer_profile_creation">Créer un compte client</a><br/>
        <a href="index.php?action=see_breakdown_history">Voir l'historique des pannes</a> -->

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>