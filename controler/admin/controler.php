<?php

//On appelle le model
require("model/admin/model.php");

function seeCgu()
//Affiche la page de profil de l'utilisateur qui a l'id donné
{
    $conditionsgenerales = getCgu();
    require("view/admin/cgu_view.php");
}

function seeCguModification()
//Affiche la page de modification de profil de l'utilisateur qui a l'id donné
{
    //$title = htmlspecialchars($_POST["titre"]);
    updateCgu();
    
    $conditionsgenerales = getCgu();
    require("view/admin/cgu_modification_view.php");
}

function CguModification()
//Fais les modifications du profil demandées puis affiche la page de profil de l'utilisateur qui a l'id donné
{
    cguUpdate();
    seeGgu();
}

