<?php ob_start(); ?>	
<?php $css = "../../design/customer/home_view.css"; ?>
<?php $title = "Mes capteurs"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>    
    
    <div class="content">

        <div class="sub_content">
        
        	<form method="post" action="roter.php?action=add_sensor">
        	
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
    				</select><br/>
    				
				</div>
				
        	</form>
        	
        </div>
        
        <div class="right_nav">
        
        	<a href="roter.php?action=see_sensors">Retour</a>
        	
        </div>

    </div> 
       
</div>

<script src="../../model/ajax/ajax.js"></script>
<script src="../../view/customer/js/add_sensor_view.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require("../../view/customer/template.php"); ?>





