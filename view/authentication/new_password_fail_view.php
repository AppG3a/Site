<?php ob_start(); ?>
<?php $css = "design/authentication/authentication_view.css"; ?>
<?php $title = "Harvey"; ?>

<img src="design/picture/logo_harvey_2.png" alt="Logo d'Harvey" class="logo"/>

<p>
	<strong>
        L'adresse électronique indiquée ne correspond à aucun utilisateur
	</strong>
</p>

<form method="post" action="index.php?action=send_new_password">
	<p class="champ">
		<label for="mail">Email</label><br/><input type="email" name="mail" id="mail" required><br/>
	</p>
	<p>
		<input type="submit" value="Confirmer" class="submit_button">
	</p>
</form>

<a href="index.php">Retour</a>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>