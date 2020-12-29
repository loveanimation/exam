<?php
    include('./config.php');
    $card=$_GET['card'];
    $pwd=md5($_GET['pwd']);
    // echo $card.'<br>'.$pwd;
    $sql="select * from users where codes='$card' and pass='$pwd'";
    $res=$mysql->query($sql);
    if($res->num_rows>0){
        echo 'ok';
    }else{
        echo 'no'; 
    }
?>