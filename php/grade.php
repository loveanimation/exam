<?php
    include('./config.php');
    date_default_timezone_set("prc");
    $time=strtotime(date('Y-m-d H:i:s',strtotime('now')));
    $card=$_GET['card'];
    $sum=0;
    $msg=[]; // 要返回的信息
    $names="";
    $sql="select * from users where codes='$card'";
    $names=$mysql->query($sql)->fetch_array()['names'];
    $sql="select * from user_pool where codes='$card'";  // 查询的是提交答案的库然后进行计算
    $res=$mysql->query($sql);
    while($arr=$res->fetch_array()){
        $sum+=$arr['grades'];
    }
    $msg['names']=$names;
    $msg['grades']=$sum;
    if($res){
        echo json_encode($msg);   // 查询成绩就是交卷,让时间戳变为现在的让其不能进行考试
        $sql="update users set grades='$sum' where codes='$card'";
        $res=$mysql->query($sql);
        $sql="update user_times set times='$time' where codes='$card'";
        $mysql->query($sql);
    }else{
        echo '';
    }
?>