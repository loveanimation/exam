<?php
    // 倒计时模块
    include('./config.php');
    date_default_timezone_set('prc');
    $card=$_GET['card'];
    $sql="select * from users where codes='$card'";
    $res=$mysql->query($sql);
    if($res->num_rows>0){   // 注册过的用户
        $arr=$res->fetch_array();
        $names=$arr['names'];
        $sql="select * from user_times where codes='$card'";
        $data=$mysql->query($sql);
        // 读取考试时间表
        $sql="select * from times";
        $test_data=$mysql->query($sql)->fetch_array();
        // print_r($test_data);
        $h=$test_data['h'];
        $f=$test_data['i'];
        $s=$test_data['s'];
        if(!$data->num_rows>0){   // 未开始考试的用户
            $lastTime=strtotime(date('Y-m-d H:i:s',strtotime("+$h hour +$f minute+$s second")));
            $sql="insert into user_times(names,codes,times) values('$names','$card','$lastTime')";
            $res=$mysql->query($sql);
            if($res){
                echo 'ok';
            }else{
                echo 'no';
            }
        }else{
            echo 'yet';
        }
    }else{
        echo 'reg';
    }
?>