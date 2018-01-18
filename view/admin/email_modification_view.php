<?php $css = "../../design/admin/home_view.css"; ?>
<?php $title = "Contact"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">

		<div class="sub_content">
            <h1>Adresse mail Domisep</h1>
            
            <form method="post" action="roter.php?action=email_modification">
            	<p>
            		<label for="email">Adresse email</label> : <input type="email" name="email" id="email" required>
            	</p>
        		<p>
            		<input type="submit" value="Changer l'adresse mail">
            	</p>
            </form>
        </div>
        
        <div class="right_nav">
        	<a href="roter.php?action=see_contact">Retour</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>