<?php

session_start();

$_SESSION["id"] = 1;
    
    //on appelle le controler
    require("controler.php");
    
    
    if (isset($_GET["action"]))
    {
        if ($_GET["action"] == "see_sensors")
        {
            seeSensors();
        }
              
        elseif ($_GET["action"] == "sensor_update")
        {
            sensorsUpdate();
        }
        
        
        else
        {
            echo "En travaux";
        }
    }
    
    
