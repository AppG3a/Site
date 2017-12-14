<?php
require("model.php");

function seePieceCapteurPage()
{
    require("view/piece_capteur_view.php");
}

function seePiece()
{
    $pieces = getPieces();
    require("view/piece_view.php");
}

function addCapteur()
{
    $nom = htmlspecialchars($_POST["nom"]);
    $description = htmlspecialchars($_POST["description"]);
    addCapteurDb($nom, $description);
    echo 'Le capteur a été ajouté';
    echo"<a href='view/capteur_view.php'> Retour </a>";
}

function seeCapteur()
{
    $capteurs = getCapteurs();
    require("view/capteur_view.php");
}

function addPiece()
{
    $nom = htmlspecialchars($_POST["nom"]);
    addPieceDb($nom);
    echo 'La pièce a été ajoutée';
    echo"<a href='view/piece_view.php'> Retour </a>";
}
?>
