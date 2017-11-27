<?php $title = "Fiche client - Admin"; ?>

<?php ob_start(); ?>

<h1>Voir une fiche client</h1>

<form method="post" action="index.php?action=see_customer_profile">
	<fieldset>
		<legend>Sélectionner le numéro du client</legend>
			<p>
				<label for="customer_id">ID client</label> : <input type="number" name="customer_id" id="customer_id" value="<?= $customer_id ?>"><br/>
			</p>
	</fieldset>
	<p>
		<input type="submit" value="Voir la fiche">
	</p>
</form>

<p>
	Nom : <?= $profile["nom"] ?><br/>
	Prénom : <?= $profile["prenom"] ?><br/>
	Adresse : <?= $profile["adresse"] ?><br/>
	Mail : <?= $profile["mail"] ?><br/>
	Pseudo : <?= $profile["pseudo"] ?><br/>
</p>

<a href="index.php">Revenir à la page d'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>