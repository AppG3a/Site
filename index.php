<?php
/*index.php
 * quand on accède au site, on va automatiquement sur cette page
 *cette page n'affiche rien, elle permet juste de diriger l'utilisateur au bon endroit
 */

session_start();

$_SESSION["id"] = 2;
$_SESSION["user_type"] = "customer";

$id_test = 1; //variable temporaire : je m'en sers juste pour faire des tests, après on aura les variables de session
$user_type = "admin";

if ($_SESSION["user_type"] == "customer")
{
    //On appelle le controler adapté
    require("controler/customer/controler.php");
    
    //En fonction de la situation, on dit au controler de faire telle ou telle action
    if (isset($_GET["action"]))
    {
        if ($_GET["action"] == "see_profile")
        {
            seeProfile();
        }
        
        elseif ($_GET["action"] == "see_profile_modification")
        {
            seeProfileModification();
        }
        
        elseif ($_GET["action"] == "profile_modification")
        {
            profileModification();
        }
        
        elseif ($_GET["action"] == "password_change")
        {
            passwordChange();
        }
        
        elseif ($_GET["action"] == "see_contact")
        {
            seeContact();
        }
        
        elseif ($_GET["action"] == "send_message")
        {
            sendMessage();
        }
        
        else
        {
            echo "En travaux";
        }
    }
    
    else
    {
        //Ca c'est temporaire, pour le moment je ne m'occupe que du profil donc je peux laisser ça par défaut, après faudra changer ce else
        seeHomePage();
    }
}

elseif ($_SESSION["user_type"] == "admin")
{ 
    //On appelle le controler adapté
    require("controler/admin/controler.php");
    
    //En fonction de la situation, on dit au controler de faire telle ou telle action
    if (isset($_GET["action"]))
    {
        if ($_GET["action"] == "see_profile")
        {
            seeProfile($id_test);
        }
        
        elseif ($_GET["action"] == "see_cgu_modification")
        {
            seeCguModification();
        }
        
        elseif ($_GET["action"] == "cgu_modification")
        {
            cguModification();
        }
        
        elseif ($_GET["action"] == "see_profile_modification")
        {
            seeProfileModification($id_test);
        }
        
        elseif ($_GET["action"] == "profile_modification")
        {
            profileModification($id_test);
        }
        
        elseif ($_GET["action"] == "password_change")
        {
            passwordChange($id_test);
        }
        
        elseif ($_GET["action"] == "see_profile_customer_selection")
        {
            seeCustomerProfileSelection();
        }
        
        elseif ($_GET["action"] == "see_customer_profile")
        {
            seeCustomerProfile();
        }
        
        else
        {
            echo "En travaux";
        }
    }
    
    else
    {
        //Ca c'est temporaire, pour le moment je ne m'occupe que du profil donc je peux laisser ça par défaut, après faudra changer ce else
        seeProfile($id_test);
    }
}

else 
{
    echo "... T'es qui ?";
}


