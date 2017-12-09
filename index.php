<?php
/*index.php
 * quand on accède au site, on va automatiquement sur cette page
 *cette page n'affiche rien, elle permet juste de diriger l'utilisateur au bon endroit
 */

session_start();

$_SESSION["id"] = 1;
$_SESSION["user_type"] = "customer";


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
        
        elseif ($_GET["action"] == "see_help")
        {
            seeHelp();
        }
        
        elseif ($_GET["action"] == "see_cgu")
        {
            seeCgu();
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
        
        elseif ($_GET["action"] == "see_customer_profile_selection")
        {
            seeCustomerProfileSelection();
        }
        
        elseif ($_GET["action"] == "see_customer_profile")
        {
            seeCustomerProfile();
        }
        
        elseif ($_GET["action"] == "see_customer_profile_creation")
        {
            seeCustomerProfileCreation();
        }
        
        elseif ($_GET["action"] == "customer_profile_creation")
        {
            customerProfileCreation();
        }
        
        elseif ($_GET["action"] == "see_breakdown_history")
        {
            seeBreakdownHistory();
        }
        
        elseif ($_GET["action"] == "see_contact")
        {
            seeContact();
        }
        
        elseif ($_GET["action"] == "see_phone_number_modification")
        {
            seePhoneNumberModification();
        }
        
        elseif ($_GET["action"] == "phone_number_modification")
        {
            phoneNumberModification();
        }
        
        elseif ($_GET["action"] == "see_cgu")
        {
            seeCgu();
        }
        
        elseif ($_GET["action"] == "see_cgu_modification")
        {
            seeCguModification();
        }
        
        elseif($_GET["action"] == "cgu_modification")
        {
            cguModification();
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

else 
{
    echo "... T'es qui ?";
}


