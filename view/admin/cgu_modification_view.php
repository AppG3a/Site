<?php $title = "Modifier Les Conditions Générales"; ?>

<?php ob_start(); ?>

<h1>Modifier les conditions générales</h1>

<form method="post" action="../../index.php?action=cgu_modification">
	<fieldset>
		<legend>Conditions Générales D'Utilisation</legend>
			<p>
				<label for="nom">Titre</label> : <input type="text" name="titre" id="titre" value="<?= $conditionsgenerales["titre"] ?>"><br/>
            	<label for="prenom">Conditions</label> : <textarea name="cgtext" id="cgtext" rows="10" cols="50" placeholder="<?= $conditionsgenerales["conditionsg"] ?>"></textarea>
            	<br />
            
            		</p>
	</fieldset>
	<p>
		<input type="submit" value="Valider les modifications">
	</p>
</form>


<a href="../../index.php?action=see_cgu">Revenir aux CGU</a>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>
