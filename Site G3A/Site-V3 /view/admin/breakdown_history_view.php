<?php $css = "../../design/admin/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Historique des pannes"; ?>


    
    <?php ob_start(); ?>
    <?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    <div class="content">

		<div class="sub_content">
        <?php 
        while ($breakdown = $breakdowns -> fetch())
        {
        ?>
        	<p class="left_justify_2">
        		<strong>Problème :</strong> <?= htmlspecialchars($breakdown["description"]) ?> (problème relevé le : <?= htmlspecialchars($breakdown["date_panne"]) ?>)<br/>
        		Solution : <?= htmlspecialchars($breakdown["solution"]) ?> (problème résolu le : <?= htmlspecialchars($breakdown["date_solution"]) ?>)<br/>
        		Client concerné : <?= htmlspecialchars($breakdown["id_client"]) ?><br/>
        	</p>
        
        <?php 
        }
        $breakdowns -> closeCursor();
        ?>
        </div>
        
        <div class="right_nav">
        	<a href="roter.php">Revenir à la page d'accueil</a>
		</div>
		
    </div>  
    </div>

<?php include("bloc_footer_view.php")?>  
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
