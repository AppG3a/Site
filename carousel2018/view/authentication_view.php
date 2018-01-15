<?php $css = "design/authentication_view.css?<?php echo time(); ?"; ?>
<?php $title = "Harvey"; ?>

<?php ob_start(); ?>

<!-- <h1>Harvey</h1> -->

<img src="design/picture/logo_harvey_2.png" alt="Logo d'Harvey" class="logo"/>

<form method="post" action="index.php?action=connexion">
	<p class="champ">
		<label for="pseudo">Pseudo</label><br/><input type="text" name="pseudo" id="pseudo"><br/>
    	<label for="mot_de_passe">Mot de passe</label><br/><input type="password" name="mot_de_passe" id="mot_de_passe"><br/>
	</p>
	<p>
		<input type="submit" value="Connexion" class="submit_button">
	</p>
</form>
<br/><br/>

<h2>Produits Domisep</h2>

<!-- Début du carousel en JS -->

<link rel="stylesheet" href="design/carousel.css">
<div id="container">
        <div id="list" style="left:-404px;">
          <a href="#"><img src="design/picture/montre_2.jpg" alt="1"></a>
           <a href="#"> <img src="design/picture/montre_2.jpg" alt="1"></a>
            <a href="#"><img src="design/picture/camera_2.jpg" alt="1"></a>
           <a href="#"> <img src="design/picture/capteur_2.jpg" alt="2"></a>
           <a href="#"> <img src="design/picture/montre_2.jpg" alt="3"></a>
           <a href="#"> <img src="design/picture/montre_2.jpg" alt="4"></a>
           <a href="#"> <img src="design/picture/montre_2.jpg" alt="5"></a>
            <a href="#"><img src="design/picture/camera_2.jpg" alt="5"></a>
           <a href="#"> <img src="design/picture/capteur_2.jpg" alt="5"></a>
           
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
    <script type="text/javascript" src="js/carousel.js">
    </script>
    
<!-- Fin du carousel en JS -->

<a href="#" title="Boutique Domisep">Consulter l'offre de produits Domisep</a>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>