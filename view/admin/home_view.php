<?php $title = "Harvey"; ?>

<?php ob_start(); ?>

<h1>Compte administrateur</h1>

<a href="index.php?action=see_profile">Profil</a><br/>
<a href="index.php?action=see_customer_profile_selection">Voir une fiche client</a><br/>
<a href="index.php?action=see_customer_profile_creation">Créer un compte client</a>

<?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>