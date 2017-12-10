<?php
header("Content-Type: text/html; charset=utf-8");


require("controler.php");

require("model.php");


if(!isset($_POST["submit"])){
    seeConnexionPage();
    }else{
    
        $name = $_POST['pseudo'];
        $password = $_POST['password'];
        if ($name && $password){
            
            $bdd = connexionbdd();
            $sql = "select * from utilisateurs where pseudo = '$name' and mot_de_passe='$password'";
            $result = $bdd->query($sql);
            $rows=mysqli_num_rows($result);
            if($rows){ 
                echo "welcome";
            }else{
            echo "Le nom d'utilisateur ou le mot de passe est incorrect";
            echo "
                    <script>
                            setTimeout(function(){window.location.href='view_connexion_page.php';},5000);
                    </script>
            
                "; }
       }else{
          echo "Le formulaire incomplet";
          echo "
                      <script>
                            setTimeout(function(){window.location.href='view_connexion_page.php';},5000);
                      </script>";}
          }


mysqli_close();

?>
