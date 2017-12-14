<?php
require("model/model.php");

function seeAuthenticationPage()
{
    require("view/authentication_view.php");
}

function checkAuthentication()
{
    //On vérifie que les deux champs sont remplis
    if (!empty($_POST["pseudo"]) && !empty($_POST["mot_de_passe"]))
    {
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $password = htmlspecialchars($_POST["mot_de_passe"]);
        
        $db_content = getPassword($pseudo);
        
        if (isset($db_content["mot_de_passe"]))
        {
            if ($db_content["mot_de_passe"] == $password)
            {
                return $db_content;
            }
            
            else
            {
                require("view/authentication_error1_view.php");
            }
        }
        
        else
        {
            require("view/authentication_error2_view.php");
        }
    }
    
    else
    {
        require("view/authentication_error3_view.php");
    }
    
}

function openAdmin()
{
    require("view/admin/account_access_view.php");
}

function openCustomer()
{
    require("view/customer/account_access_view.php");
}