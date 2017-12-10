<?php 

require("controler.php");

if (isset($_GET["action"]))
{
    if ($_GET["action"] == "see_piece")
    {
        seePiece();
    }
    
    else 
    {
        echo "En travaux";
    }
}

else
{
    seePieceCapteurPage();
}

?>