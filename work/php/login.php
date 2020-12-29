<?php
    include('./config.php');
    $name=$_GET['user'];
    $pwd=$_GET['pwd'];
    $sql="select * from info where names='$name' and pwd='$pwd'";
    $res=$mysql->query($sql);
    if($res->num_rows>0){
        echo 'ok';
    }else{
        echo 'no'; 
    }
?>