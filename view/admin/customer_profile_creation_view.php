<?php $title = "Ajout client - Admin"; ?>

<?php ob_start(); ?>

<h1>Créer un compte client</h1>

<form method="post" action="index.php?action=customer_profile_creation">
	<label for="nom">Nom</label> : <input type="text" name="nom" id="nom"><br/>
	<label for="prenom">Prénom</label> : <input type="text" name="prenom" id="prenom"><br/>
	<label for="adresse">Adresse</label> :<br/><textarea name="adresse" id="adresse"></textarea><br/>
	<label for="mail">Mail</label> : <input type="text" name="mail" id="mail"><br/>
	<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo"><br/>
    <label for="new_password_1">Mot de passe</label> : <input type="password" name="mot_de_passe" id="mot_de_passe"><br/>
	<p>
		<input type="submit" value="Créer le compte">
	</p>
</form>

<a href="index.php">Revenir à la page d'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>