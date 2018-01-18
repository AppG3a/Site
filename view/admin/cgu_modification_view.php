<?php $css = "../../design/admin/home_view.css"; ?>
<?php $title = "Conditions générales d'utilisation"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>

    
    <div class="content">

		<div class="sub_content">
			<script src="../../view/admin/js/editor.js" type="text/javascript"></script>
			<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
			
            <form method="post" action="roter.php?action=cgu_modification">
            	<fieldset>
            		<legend>Modifier les Conditions Générales d'Utilisation</legend>
            			<p class="editor">
                        	<textarea name="cgu" rows="20" cols="110"><?= $cgu["texte"] ?></textarea><br/>
    					</p>
            	</fieldset>
            	
            	<p>
            		<input type="submit" value="Valider les modifications">
            	</p>
            </form>
        </div>

		<div class="right_nav">
			<a href="roter.php?action=see_cgu">Retour</a>
		</div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>