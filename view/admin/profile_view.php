<?php $title = "Mon profil - Admin"; ?>

<?php ob_start(); ?>

<h1>Mon profil administrateur</h1>
<p>
	Nom : <?= $profile["nom"] ?><br/>
	Prénom : <?= $profile["prenom"] ?><br/>
	Adresse : <?= $profile["adresse"] ?><br/>
	Mail : <?= $profile["mail"] ?><br/>
	Pseudo : <?= $profile["pseudo"] ?><br/>
</p>

<a href="index.php?action=see_profile_modification">Modifier mon profil</a><br/>

<a href="index.php?action=see_customer_profile_selection">Voir une fiche client</a><br/>

<a href="index.php?action=see_customer_profile_creation">Créer une fiche client</a><br/>

<?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>