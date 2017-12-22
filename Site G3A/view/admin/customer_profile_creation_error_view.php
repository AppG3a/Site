<?php $css = "design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Créer un compte Admin"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

		<div class="sub_content">
            
            <form method="post" action="index.php?action=customer_profile_creation">
            	<p class="left_justify">
                	<label for="nom">Nom</label><br/><input type="text" name="nom" id="nom"><br/>
                	<label for="prenom">Prénom</label><br/><input type="text" name="prenom" id="prenom"><br/>
                	<label for="adresse">Adresse</label><br/><textarea name="adresse" id="adresse"></textarea><br/>
                	<label for="mail">Mail</label><br/><input type="text" name="mail" id="mail"><br/>
                	<label for="pseudo">Pseudo</label><br/><input type="text" name="pseudo" id="pseudo"><br/>
                    <label for="new_password_1">Mot de passe</label><br/><input type="password" name="mot_de_passe" id="mot_de_passe"><br/>
                </p>
            	<p>
            		<input type="submit" value="Créer le compte">
            	</p>
            	<p><strong>UN DES CHAMPS DE CREATION DE COMPTE EST VIDE</strong></p>
            </form>
        </div>

        <div class="right_nav">
        	<a href="index.php">Revenir à la page d'accueil</a>
    	</div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>