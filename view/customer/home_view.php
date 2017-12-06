<?php $css = "design/customer/home_view.css?<?php echo time(); ?"; ?>
<?php $title = "Harvey"; ?>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
    <?php ob_start(); ?>
    
    <div class="content">
    
        <h1>Bienvenue</h1>
        
        <!-- <a href="index.php?action=see_profile">Profil</a><br/> -->
        <!-- <a href="index.php?action=see_contact">Contacter le support</a> -->
    
    </div>    
    <?php $content = ob_get_clean(); ?>

<?php require("view/customer/template.php"); ?>
</div>

<?php include("bloc_footer_view.php")?>