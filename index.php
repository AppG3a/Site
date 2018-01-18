<?php
/* Quand on accède au site, on va automatiquement sur cette page
 * Cette index gère tout ce qui concerne l'authentification
 */

require("controler/controler.php");

if (isset($_GET["action"]))
{
    $action = htmlspecialchars($_GET["action"]);
    
    // Chaque valeur de $action correspond à une action particulière
    switch($action)
    {
        // Gestion de la connexion
        case "connexion":
            $db_content = checkAuthentication();
            
            session_start();
            
            // Initialisation de toutes les variables de session
            // Variables concernant l'utilisateur :
            $_SESSION["id"] = $db_content["id"];
            $_SESSION["user_type"] = $db_content["categorie_utilisateur"];
            $_SESSION["first_name"] = $db_content["prenom"];
            $_SESSION["email"] = $db_content["mail"];
            
            // Variables utiles pour l'affichage de messages spécifiques (messages contextuels affichés avec Javascript)
            $_SESSION["welcome"] = 1;
            $_SESSION["sensor_modification"] = 0;
            
            // Redirection vers la bonne page en fonction du type d'utilisateur (client ou administrateur)
            if ($_SESSION["user_type"] == "admin")
            {
                openAdmin();
            }           
            elseif ($_SESSION["user_type"] == "customer")
            {
                openCustomer();
            }
            
            break;
            
        // Affichage de la page "Mot de passe oublié"
        case "see_forgotten_password":
            seeForgottenPassword();
            break;
         
        // Envoi d'un nouveau mot de passe
        case "send_new_password":
            sendNewPassword();
            break;
            
        // Affichage des Conditions Générales d'Utilisation
        case "see_cgu":
            seeCgu();
            break;
            
        // Affichage du formulaire de connexion
        default:
            seeAuthenticationPage();
            break;
    }
}
else
{
    seeAuthenticationPage();
}

