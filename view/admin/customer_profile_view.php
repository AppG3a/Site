<?php $css = "design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Fiche client"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

		<div class="sub_content">
            
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
            
            <p class="left_justify">
            	Nom : <?= $profile["nom"] ?><br/>
            	Prénom : <?= $profile["prenom"] ?><br/>
            	Adresse : <?= $profile["adresse"] ?><br/>
            	Mail : <?= $profile["mail"] ?><br/>
            	Pseudo : <?= $profile["pseudo"] ?><br/>
            </p>
        </div>
        
        <div class="right_nav">
        	<a href="index.php">Revenir à la page d'accueil</a>
    	</div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>

