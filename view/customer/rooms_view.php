<?php $css = "design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes pièces"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">

		<div class="sub_content">
            <h1>Mes pièces</h1>
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
            <a href="index.php?action=see_add_room">Ajouter une pièce</a>
            <a href="index.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>