<?php
    include('./config.php');
    $card=$_GET['card'];
    $sql="select * from users where codes='$card'";
    $res=$mysql->query($sql)->num_rows;  
    if($res==0){
        echo 'ok';
    }else{
        echo 'no';
    }
?>