<?php
/* Ce contrôleur contient toutes les fonctions appelées par le fichier "index.php"
 * Toutes ces fonctions sont donc liées à l'authentification
 */

// Appelle le modèle authentification
require("model/model.php");

/**
 * Affiche la page d'authentification
 */
function seeAuthenticationPage()
{
    $pictures = getPictures();
    require("view/authentication/authentication_view.php");
}

/**
 * Vérifie que l'email et le mot de passe donnés par l'utilisateur sont bons
 * Si c'est la cas, la fonction renvoie certaines données de l'utilisateur en question
 * Ces données serviront à définir des variables de session
 * 
 * @return mixed
 */
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

/**
 * Affiche la page qui permet de récupérer un nouveau mot de passe en cas d'oubli
 */
function seeForgottenPassword()
{
    require("view/authentication/forgotten_password_view.php");
}

/**
 * Envoie un nouveau mot de passe à l'utilisateur qui a oublié le sien
 * Le nouveau mot de passe est envoyé par email, après vérification de l'existence d'un compte lié à cet email
 * 
 * Le nouveau mot de passe est généré aléatoirement avec la fonction PHP uniquid()
 * 
 */
function sendNewPassword()
{
    $email = htmlspecialchars($_POST["mail"]);
    $db_content = getPassword($email);
    if (isset($db_content["id"]))
    {
        $new_password = uniqid();
        updatePassword($db_content["id"], $new_password);
        
        // Envoi d'un mail
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

/**
 * Affiche la page qui permet de voir les conditions générales d'utilisation
 */
function seeCgu()
{
    $cgu = getCgu();
    require("view/authentication/cgu_view.php");
}

/**
 * Redirection vers un index secondaire qui gère les comptes administrateurs
 */
function openAdmin()
{
    header("Location: roter/admin/roter.php");
}

/**
 * Redirection vers un index secondaire qui gère les comptes clients
 */
function openCustomer()
{
    header("Location: roter/customer/roter.php");
}