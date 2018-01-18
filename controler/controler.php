<?php
/* Ce contrôleur contient toutes les fonctions appelées par le fichier "index.php"
 * Toutes ces fonctions sont donc liées à l'authentification
 */

require("model/model.php");

function seeAuthenticationPage()
{
    $pictures = getPictures();
    require("view/authentication/authentication_view.php");
}

function checkAuthentication()
{
    $mail = htmlspecialchars($_POST["mail"]);
    $password = htmlspecialchars($_POST["mot_de_passe"]);
    
    // On essaye de récupérer le mot de passe de la base de donnée qui correspond à l'adresse mail donnée
    $db_content = getPassword($mail);
    
    // Si on récupère effectivement un mot de passe, on vérifie qu'il correspond au mot de passe donné
    if (isset($db_content["mot_de_passe"]))
    {
        if ($db_content["mot_de_passe"] == $password)
        {
            return $db_content;
        }
        else
        {
            $pictures = getPictures();
            require("view/authentication/authentication_error1_view.php"); // Redirige vers la page erreur : "Mauvais mot de passe"
        }
    }
    // Si on ne récupère aucun mot de passe, c'est que l'adresse mail donnée n'est pas bonne
    else
    {
        $pictures = getPictures();
        require("view/authentication/authentication_error2_view.php"); // Redirige vers la page erreur : "Mauvaise adresse mail"
    }
}

function seeForgottenPassword()
{
    require("view/authentication/forgotten_password_view.php");
}

function sendNewPassword()
{
    $email = htmlspecialchars($_POST["mail"]);
    $db_content = getPassword($email);
    if (isset($db_content["id"]))
    {
        $new_password = uniqid();
        updatePassword($db_content["id"], $new_password);
        // Envoyer mail
        $destinataire = $email;
        $subject = "Harvey - Votre mot de passe a été réinitialisé";
        $message = "Vous avez demandé à recevoir un nouveau mot de passe. Voici votre nouveau mot de passe : " . $new_password;
        //mail($destinataire, $subject, $message);
        require("view/authentication/new_password_send_view.php");
    }
    else
    {
        require("view/authentication/new_password_fail_view.php");
    }
}

function seeCgu()
{
    $cgu = getCgu();
    require("view/authentication/cgu_view.php");
}

function openAdmin()
{
    header("Location: roter/admin/roter.php");
}

function openCustomer()
{
    header("Location: roter/customer/roter.php");
}