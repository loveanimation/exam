<?php
    include('./config.php');
    $name=$_GET['names'];
    $sql="select * from info where names='$name'";
    $res=$mysql->query($sql);
    
    if($res->num_rows==0){
        echo 'ok';
    }else{
        echo 'no';
    }
?>