<?php $css = "../../design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Modifier mon profil"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
            <form method="post" action="roter.php?action=profile_modification">
            	<fieldset>
            		<legend>Informations personnelles</legend>
            			<p>
            				<label for="nom">Nom</label> : <input type="text" name="nom" id="nom" value="<?= $profile["nom"] ?>"><br/>
                        	<label for="prenom">Prénom</label> : <input type="text" name="prenom" id="prenom" value="<?= $profile["prenom"] ?>"><br/>
                        	<label for="adresse">Adresse</label> :<br/><textarea name="adresse" id="adresse"><?= $profile["adresse"] ?></textarea><br/>
                        	<label for="mail">Mail</label> : <input type="text" name="mail" id="mail" value="<?= $profile["mail"] ?>"><br/>
                        	<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value="<?= $profile["pseudo"] ?>"><br/>
            			</p>
            	</fieldset>
            	<p>
            		<input type="submit" value="Valider les modifications">
            	</p>
            </form>
            
            <form method="post" action="roter.php?action=password_change">
            	<fieldset>
            		<legend>Mot de passe</legend>
            			<p>
                            <label for="mot_de_passe">Ancien mot de passe</label> : <input type="password" name="mot_de_passe" id="mot_de_passe"><br/>
                            <label for="new_password_1">Nouveau mot de passe</label> : <input type="password" name="new_password_1" id="new_password_1"><br/>
                            <label for="new_password_2">Confirmer le mot de passe</label> : <input type="password" name="new_password_2" id="new_password_2"><br/>
            			</p>
            			<p><strong>UN DES CHAMPS DE MODIFICATION DU MOT DE PASSE EST VIDE</strong></p>
            	</fieldset>
            	<p>
            		<input type="submit" value="Changer le mot de passe">
            	</p>
            </form>
        </div>
        
    	<div class="right_nav">
        	<a href="roter.php?action=see_profile">Revenir au profil</a>
    	</div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>