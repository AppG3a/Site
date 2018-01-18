<?php $css = "../../design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>	
    
    <div class="content">

        <div class="sub_content">
        	<form method="post" action="roter.php?action=add_sensor_bis">
        		<div id="rooms">
    				<label for="room">Pièce de la maison : </label>
    				<select name="room" id="room">
    		            <?php 
                        while ($room = $rooms -> fetch())
                        {
                        ?>
                        	<option value="<?= $room["nom"] ?>"><?= $room["nom"] ?></option>
                    	<?php 
                        }
                        $rooms -> closeCursor();
                    	?>    				
    				</select>
    				<br/>
				</div>
        	</form>
        </div>
        
        <div class="right_nav">
        	<a href="roter.php?action=see_sensors">Retour</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>

<script src="../../model/ajax/ajax.js"></script>
<script src="../../view/customer/js/add_sensor_bis_view.js"></script>

