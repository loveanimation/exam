<?php
    include('./config.php');
    $user=$_GET['user'];
    $card=$_GET['card'];
    $pwd=md5($_GET['pwd']);
    $sql="insert into users(names,pass,codes) values('$user','$pwd','$card')";
    $res=$mysql->query($sql);
    if($res){
        echo 'ok';
    }else{
        echo 'no';
    }
?>