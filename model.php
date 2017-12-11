<?php

function connexionbdd(){
    $server="localhost";
    $db_username="root";
    $db_password="root";
    $con = mysqli_connect($server,$db_username,$db_password);
    if(!$con){
        die("can't connect".mysqli_error());
    }
    $con->select_db('site_app');
    return $con;
}



function getprofile(){
    $bdd = connexionbdd();
    $sql = "select * from utilisateurs where pseudo = '$name' and mot_de_passe='$password'";
    $result = $con->query($sql);
    $rows=mysqli_num_rows($result);
    return $rows;
}
?>
