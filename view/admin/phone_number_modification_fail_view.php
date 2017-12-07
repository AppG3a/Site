<?php $css = "design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Contact"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

        <h1>Numéro Domisep</h1>
        
        <form method="post" action="index.php?action=phone_number_modification">
        	<p>
        	<label for="phone_number">Numéro</label> : <input type="text" name="phone_number" id="phone_number">
        	</p>
    		<p>
        		<input type="submit" value="Changer le numéro">
        	</p>
        </form>
        <p>LE NUMERO RENSEIGNE N'EST PAS VALIDE</p>
        
        <div class="back_button">
        	<a href="index.php?action=see_contact">Retour</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>