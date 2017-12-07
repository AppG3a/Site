<?php $title = "Harvey"; ?>

<?php ob_start(); ?>

<h1>Bienvenue</h1>

<a href="index.php?action=see_profile">Profil</a><br/>
<a href="index.php?action=see_contact">Contacter le support</a>

<?php $content = ob_get_clean(); ?>

<?php require("view/customer/template.php"); ?>