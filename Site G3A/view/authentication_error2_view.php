<?php $css = "design/authentication_view.css?<?php echo time(); ?"; ?>
<?php $title = "Harvey"; ?>

<?php ob_start(); ?>

<!-- <h1>Harvey</h1> -->
<img src="design/picture/logo_harvey_2.png" alt="Logo d'Harvey" class="logo"/>
<p><strong>PSEUDO INCORRECT</strong></p>
<form method="post" action="index.php?action=connexion">
	<p class="champ">
		<label for="pseudo">Pseudo</label><br/><input type="text" name="pseudo" id="pseudo"><br/>
    	<label for="mot_de_passe">Mot de passe</label><br/><input type="password" name="mot_de_passe" id="mot_de_passe"><br/>
	</p>
	<p>
		<input type="submit" value="Connexion" class="submit_button">
	</p>
</form>

<h2>Produits Domisep</h2>

<div class="catalogue">
    <img src="design/picture/camera_2.jpg" alt="Caméra"/>
    <img src="design/picture/capteur_2.jpg" alt="Capteur"/>
    <img src="design/picture/montre_2.jpg" alt="Montre"/>
</div>

<a href="#" title="Boutique Domisep">Consulter l'offre de produits Domisep</a>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>