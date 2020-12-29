<?php
    include('./config.php');
    $codes=$_GET['codes']; 
    $title=$_GET['title_id'];   // 当前题号
    $max=$mysql->query("select * from systems")->fetch_array()['max_num'];   // 考试的题数
    $data=['max'=>$max];     // 定义要返回的数组
    $sql="select * from user_pool where codes='$codes'";
    $res=$mysql->query($sql);    // 查询用户在考试表中的数据
    if($res->num_rows>0){
        fan();
        echo json_encode($data);
    }else if($res->num_rows==0){
        echo '0';
    }
    function fan(){
        global $mysql; 
        global $codes;
        global $data;
        $sql="select * from item_pool"; 
        $topic=$mysql->query($sql);      // 查询题库
        $num=rand(1,$topic->num_rows);
        $falg=$mysql->query("select * from user_pool where title_num='$num' and codes='$codes'")->num_rows;
        // echo $topic->fetch_array()[$num];
        if($falg==0){       // 等于0证明没有考过这道题
            while($arr=$topic->fetch_array(MYSQLI_ASSOC)){
                // print_r($arr);
                if($arr['id']==$num){
                    unset($arr['rights']);
                    array_push($data,$arr);
                }
            }
        }else{      // 不等于零证明这个题考过需要换题
            fan();
        }
    }
?>