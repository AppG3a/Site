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


?>
