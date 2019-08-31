<?php ob_start(); ?>
<?php $css = "../../design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes pièces"; ?>
	
	<?php include("bloc_header_view.php")?>
	<div class="center">
	<?php include("bloc_nav_view.php")?>
        <div class="content">
        		<div id="sub_content">
    
                <?php 
                while ($room = $rooms -> fetch())
                {
                ?>
                	<p><?= $room["nom"] ?></p>
            	<?php 
                }
                $rooms -> closeCursor();
            	?>
                
            </div>
            
            <div class="right_nav">
                <a href="roter.php?action=see_add_room">Ajouter une pièce</a>
                <a href="roter.php">Revenir à la page d'accueil</a>
            </div>
            
    
        </div>  
    </div> 
    <?php include("bloc_footer_view.php")?> 
   <?php $content = ob_get_clean(); ?>
     

<?php require("../../view/customer/template.php"); ?>


