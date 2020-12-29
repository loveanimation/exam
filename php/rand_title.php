<?php
    include('./config.php');
    $codes=$_GET['codes']; 
    $title=$_GET['title_id']; 
    $s="select * from user_pool where title_num_self='$title' and codes='$codes'";
    $r=$mysql->query($s); 
    $l=$r->num_rows;     // 查询题库中是否有此题
    if($l>0){    // 有证明已经答过了
       $a=$r->fetch_array(MYSQLI_ASSOC);
       $id=$a['title_num'];    // 总题库id'
       $s2="select * from item_pool where id='$id'";
       $r2=$mysql->query($s2);
       $a2=$r2->fetch_assoc();   // 关联数组
       array_pop($a2);   // 删除答案
       $a2['title_len']=$title;
       echo json_encode($a2);
       // print_r($a2);
    }else{    // 没做过
        $sql="select * from item_pool"; 
        $topic=$mysql->query($sql);      // 查询题库
        $counts=$topic->num_rows;
        $num=rand(1,$counts);   //  随机值
        // 查询自己的题库中是否考过此题
        $falg=$mysql->query("select * from user_pool where title_num='$num' and codes='$codes'")->num_rows;
        if($falg==0){  // 没做过
            $sql="select * from item_pool where id='$num'";
            $arr=$mysql->query($sql)->fetch_assoc();
            array_pop($arr);   // 删除答案
            // print_r($arr);
            // 记录用户做过的题
            $sql4="select * from users where codes='$codes'";
            $res4=$mysql->query($sql4);
            $arr4=$res4->fetch_assoc();
            $names=$arr4['names'];
            // 自己题号
            $sql5="select * from user_pool where codes='$codes'";
            $topic=$mysql->query($sql5)->num_rows+1;      // 当前自己题号
            // 入答题库
            $sql6="insert into user_pool(names,codes,title_num_self,title_num) values('$names','$codes','$topic','$num')";
            $res6=$mysql->query($sql6);
            $arr['title_len']=$topic;
            echo json_encode($arr);
        }else{   // 随机的题做过
            $sql1="select * from user_pool where codes='$codes'";
            $res1=$mysql->query($sql1);
            $title_len=$res1->num_rows;
            if($counts > $title_len){   // 题库题数大于做过题数
                echo 'no';   // 前端接受到no,再次发出请求,说明此题已有
            }else{
                echo 'end';
            }
        }
    }
?>