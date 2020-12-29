<?php
    include('./config.php');
    $id=$_GET['id'];
    $text=$_GET['text'];
    $res=$mysql->query("update blogs set text='$text' where id='$id'");
    if($res){
        echo 'ok';
    }
?>