<?php
    include('./config.php');
    $name=$_GET['names'];
    $pwd=$_GET['pwd'];
    $sql="insert into info(names,pwd) values('$name','$pwd')";
    $res=$mysql->query($sql);
    if($res){
        echo 'ok';
    }else{
        echo 'no';
    }
?>