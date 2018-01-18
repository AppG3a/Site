<?php
require("model/model.php");

function seeAuthenticationPage()
{
    $pictures = getPictures();
    require("view/authentication_view.php");
}

function seeCgu()
{
    $cgu = getCgu();
    require("view/cgu_view.php");
}

function checkAuthentication()
{
    //On vérifie que les deux champs sont remplis
    if (!empty($_POST["mail"]) && !empty($_POST["mot_de_passe"]))
    {
        //$pseudo = htmlspecialchars($_POST["pseudo"]);
        $mail = htmlspecialchars($_POST["mail"]);
        $password = htmlspecialchars($_POST["mot_de_passe"]);
        
        //$db_content = getPassword($pseudo);
        $db_content = getPassword($mail);
        
        if (isset($db_content["mot_de_passe"]))
        {
            if ($db_content["mot_de_passe"] == $password)
            {
                return $db_content;
            }
            
            else
            {
                $pictures = getPictures();
                require("view/authentication_error1_view.php");
            }
        }
        
        else
        {
            $pictures = getPictures();
            require("view/authentication_error2_view.php");
        }
    }
    
    else
    {
        $pictures = getPictures();
        require("view/authentication_error3_view.php");
    }
}

function seeForgottenPassword()
{
    require("view/forgotten_password_view.php");
}

function openAdmin()
{
    //require("view/admin/account_access_view.php");
    //header("Location: view/admin/account_access_view.php");
    header("Location: roter/admin/roter.php");
}

function openCustomer()
{
    //require("view/customer/account_access_view.php");
    //header("Location: view/customer/account_access_view.php");
    header("Location: roter/customer/roter.php");
}