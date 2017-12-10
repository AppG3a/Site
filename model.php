<?php

function connexionbdd(){
    $server="localhost:3306";//主机
    $db_username="root";//你的数据库用户名
    $db_password="root";//你的数据库密码
    $con = mysqli_connect($server,$db_username,$db_password);//链接数据库
    if(!$con){
        die("can't connect".mysqli_error());//如果链接失败输出错误
    }
    $con->select_db('site_app');//选择数据库（我的是test）
    return $con;
}



function getprofile(){
    $bdd = connexionbdd();
    $sql = "select * from utilisateurs where pseudo = '$name' and mot_de_passe='$password'";//检测数据库是否有对应的username和password的sql
    $result = $con->query($sql);//执行sql
    $rows=mysqli_num_rows($result);
    return $rows;
}
?>
