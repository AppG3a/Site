<?php
require("model.php");

function seePieceCapteurPage()
{
    require("view/piece_capteur_view.php");
}

function seePiece()
{
    $pieces = getPieces();
    require("view/piece_view2.php");
}

function test()
{
    $nom = htmlspecialchar($_POST["nom"]);
}

?>