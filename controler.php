<?php

function seeConnexionPage()
{
    require("view_connexion_page.php");
}

function getvalue(){
    $name = $_POST['pseudo'];
    $password = $_POST['password'];
    return $name;
    return $password;
}


?>
