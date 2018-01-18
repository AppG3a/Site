<?php $css = "design/authentication/authentication_view.css?<?php echo time(); ?"; ?>
<?php $title = "Harvey"; ?>

<?php ob_start(); ?>

<!-- <h1>Harvey</h1> -->
<img src="design/picture/logo_harvey_2.png" alt="Logo d'Harvey" class="logo"/>
<p><strong>MOT DE PASSE INCORRECT</strong></p>
<form method="post" action="index.php?action=connexion">
	<p class="champ">
		<!-- <label for="pseudo">Pseudo</label><br/><input type="text" name="pseudo" id="pseudo"><br/> -->
		<label for="mail">Email</label><br/><input type="email" name="mail" id="mail" required><br/>
    	<label for="mot_de_passe">Mot de passe</label><br/><input type="password" name="mot_de_passe" id="mot_de_passe" required><br/>
	</p>
	<p>
		<input type="submit" value="Connexion" class="submit_button">
	</p>
</form>
<a href="index.php?action=see_cgu" target="_blank">Conditions générales d'utilisation</a>
<a href="index.php?action=see_forgotten_password">Mot de passe oublié ?</a>
<br/>

<h2>Produits Domisep</h2>

<!-- Début du carousel en JS -->

<div id="container">
    <div id="list" style="left:-404px;">
		<?php 
		while ($picture = $pictures -> fetch())
		{
		?>
			<a href="#"><img src="<?= $picture["lien"]; ?>" alt="<?= $picture["id"]; ?>"></a>
		<?php 
		}
		$pictures -> closeCursor();
		?>
    </div>
    <div id="buttons">
        <span data-index="1" class="on"></span>
        <span data-index="2"></span>
        <span data-index="3"></span>
        <span data-index="4"></span>
        <span data-index="5"></span>
    </div>
    <a href="javascript:void(0);" class="arrow" id="prev">&lt;</a>
    <a href="javascript:void(0);" class="arrow" id="next">&gt;</a>
</div>
<script type="text/javascript" src="view/authentication/js/carousel.js"></script>
    
<!-- Fin du carousel en JS -->

<a href="#" title="Boutique Domisep">Consulter l'offre de produits Domisep</a>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>