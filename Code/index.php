<?php 

require("controler.php");

if (isset($_GET["action"]))
{
    if ($_GET["action"] == "see_piece")
    {
        seePiece();
    }
    elseif ($_GET["action"] == "add_piece")
    {     
        addPiece();
    }
    elseif ($_GET["action"] == "see_capteur")
   {
        seeCapteur();
    }
    elseif ($_GET["action"] == "add_capteur")
    {
        addCapteur();
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