<?php ob_start(); ?>	
<?php $css = "../../design/admin/customer_profile_selection_bis_view.css"; ?>
<?php $title = "Fiche client"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">

    <?php include("bloc_nav_view.php")?>
        
    <div class="content">

        <div class="sub_content">
        
        	<div id="buttons"></div>
        	<div id="customer"></div>
        	<div id="restore"></div>
            <table></table>         
            <div id="page"></div>  
            
        </div>

    </div>    
    
</div>

<script src="../../model/ajax/ajax.js"></script>
<script src="../../view/admin/js/customer_profile_selection_view.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require("../../view/admin/template.php"); ?>

