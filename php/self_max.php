<?php
    include('./config.php');
    $codes=$_GET['codes'];
    $sql="select * from user_pool where codes='$codes'";
    $res=$mysql->query($sql);
    echo $res->num_rows;
?>