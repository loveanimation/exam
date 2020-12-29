<?php
    // 判断结果正确的php
    include('./config.php');
    $codes=$_GET['codes'];
    $title_num=$_GET['title_num'];  // 题号
    $res=$_GET['res'];   // 答案
    $max_num=$_GET['max_num'];    // 最大题数
    $sql="select * from user_pool where codes='$codes' and title_num_self='$title_num'";
    $r=$mysql->query($sql);
    $arr=$r->fetch_assoc();
    if($arr['results']==''){
        echo '提交答案';
    }else{
        echo '修改答案';
    }
    // 答案入库
    if($res!='' && $res!='undefined'){
        $sql="update user_pool set results='$res' where codes='$codes' and title_num_self='$title_num'";
        $mysql->query($sql);
    }
    // 核对答案正确性
    $id=$arr['title_num'];    // 总题库的id
    $fs=0;    //分
    $sql2="select * from item_pool where id='$id'";
    $arr2=$mysql->query($sql2)->fetch_assoc();
    $rights=$arr2['rights'];  
    // 查询总分
    $score=$mysql->query("select * from systems")->fetch_assoc()['total_score'];
    $every=$score/$max_num;   // 每题分数
    if($rights ==$res){
        // 得分了
        $sql="update user_pool set grades='$every' where codes='$codes' and title_num_self='$title_num'";
        $mysql->query($sql);
    }else{
        // 不得分
        $sql="update user_pool set grades='$fs' where codes='$codes' and title_num_self='$title_num'";
        $mysql->query($sql);
    }    
?>