<?php $css = "../../design/admin/customer_profile_selection_bis_view.css?<?php echo time(); ?"; ?>
<?php $title = "Historique des pannes"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>	
    
    <div class="content">

        <div class="sub_content">
        	<div id="buttons"></div>
        	<div id="breakdown"></div>
        	<div id="restore"></div> 
            <table></table>    
            <div id="page"></div>      
        </div>
        
        <div class="right_nav">
        	<a href="roter.php">Revenir à la page d'accueil</a>
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>

<script src="../../js/ajax.js"></script>
<script src="../../js/breakdown_history_bis_view.js"></script>