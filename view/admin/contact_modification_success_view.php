<?php ob_start(); ?>
<?php $css = "../../design/admin/home_view.css"; ?>
<?php $title = "Contact"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>    
    
    <div class="content">

		<div class="sub_content">
		
			<p>
				<strong>
					Les modifications ont été correctement effectuées
				</strong>
			</p>
			
            <h1>Adresse mail Domisep</h1>
            
            <p><?= $email; ?></p>
            
            <h1>Numéro Domisep</h1>
                        
            <p><?= $phone_number; ?></p>
            
        </div>
            
        <div class="right_nav">
        
        	<a href="roter.php?action=see_email_modification">Modifier email</a>
        	<a href="roter.php?action=see_phone_number_modification">Modifier le numéro</a>
            <a href="roter.php">Revenir à la page d'accueil</a>
            
        </div>
        
    </div>    
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>

