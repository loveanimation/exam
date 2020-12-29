<?php
    // 考试时间
    include("./config.php");
    date_default_timezone_set("prc");
    $codes=$_GET['codes'];
    $sql="select * from user_times where codes='$codes'";
    $res=$mysql->query($sql);
    if($res->num_rows>0){
        $arr=$res->fetch_array();
        $time=strtotime(date('Y-m-d H:i:s',strtotime('now')));   // 现在时间戳
        $lastTime=$arr['times'];      // 考试结束结束时间戳
        $h=floor(($lastTime-$time)/3600);   
        $i=floor(($lastTime-$time)%3600/60);
        $s=floor(($lastTime-$time)%60);
        if($lastTime>$time){
            // echo $h.'时'.$i.'分'.$s.'秒'.','.$arr['names'];
            echo json_encode(array('时'=>$h,'分'=>$i,'秒'=>$s,'names'=>$arr['names']));
        }else{
            echo 'exit';
        }
    }
?>