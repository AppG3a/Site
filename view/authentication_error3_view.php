<?php $css = "design/authentication_view.css?<?php echo time(); ?"; ?>
<?php $title = "Harvey"; ?>

<?php ob_start(); ?>

<h1>Harvey</h1>

<p><strong>UN DES CHAMPS N'EST PAS RENSEIGNE</strong></p>
<form method="post" action="index.php?action=connexion">
	<p class="champ">
		<label for="pseudo">Pseudo</label><br/><input type="text" name="pseudo" id="pseudo"><br/>
    	<label for="mot_de_passe">Mot de passe</label><br/><input type="password" name="mot_de_passe" id="mot_de_passe"><br/>
	</p>
	<p>
		<input type="submit" value="Connexion" class="submit_button">
	</p>
</form>

<h2>*Catalogue*</h2>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>