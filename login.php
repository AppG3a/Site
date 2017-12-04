<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("error");
    }

    include('cennect.php');
    $name = $_POST['pseudo'];
    $passowrd = $_POST['password'];

    if ($name && $passowrd){
             $sql = "select * from utilisateurs where pseudo = '$name' and mot_de_passe='$passowrd'";
             $result = $con->query($sql);
             $rows=mysqli_num_rows($result);
             if($rows){//0 false 1 true
                   header("refresh:0;url=welcome.html");
                   exit;
             }else{
                echo "Le nom d'utilisateur ou le mot de passe est incorrect";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                    </script>

                ";
             

    }else{
                echo "Le formulaire est incomplet";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

                       
    }

    mysqli_close();
?>
