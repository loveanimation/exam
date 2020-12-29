<?php
    include('./config.php');
    $codes=$_GET['codes'];
    $title_num=$_GET['title_num'];   // 题号
    $sql="select * from user_pool where codes='$codes' and title_num_self='$title_num'";
    $arr=$mysql->query($sql)->fetch_assoc();
    @$result=$arr['results'];  //  自己题的答案
    if($result==''){
        echo 'empty';
    }else{
        echo $result;
    }
?>