<?php
    include('./public.php');
    $user=$_GET['user'];
    $pass=$_GET['pass'];
    $sql="select * from admins where user='$user' and pass='$pass'";
    $res=$conn->query($sql);
    if($res->num_rows>0){
        echo 'ok';
    }else{
        echo 'no';
    }
?>