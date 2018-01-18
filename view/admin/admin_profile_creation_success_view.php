<?php $css = "../../design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Créer un compte Admin"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

		<div class="sub_content">
            
            <form method="post" action="roter.php?action=admin_profile_creation">
            	<fieldset>
            		<legend>Nouveau compte administrateur</legend>
                	<p class="left_justify">
                    	<label for="nom">Nom</label><br/><input type="text" name="nom" id="nom" required><br/>
                    	<label for="prenom">Prénom</label><br/><input type="text" name="prenom" id="prenom" required><br/>
                    	<label for="adresse">Adresse</label><br/><textarea name="adresse" id="adresse" required></textarea><br/>
                    	<label for="mail">Mail</label><br/><input type="email" name="mail" id="mail" required><br/>
                    </p>
                </fieldset>
            	<p>
            		<input type="submit" value="Créer le compte">
            	</p>
            	<p><strong>LE COMPTE ADMINISTRATEUR A ETE CREE</strong></p>
            </form>
        </div>

        <div class="right_nav">
        	<a href="roter.php">Revenir à la page d'accueil</a>
    	</div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>