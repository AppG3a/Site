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
                require("view/authentication_view.php");
                echo "<strong>Mot de passe incorrect</strong>";
                //return 0;
            }
        }
        
        else
        {
            require("view/authentication_view.php");
            echo "<strong>Pseudo incorrect</strong>";
            //return 0;
        }
    }
    
    else
    {
        require("view/authentication_view.php");
        echo "<strong>Un des champs n'est pas renseigné</strong>";
        //return 0;
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