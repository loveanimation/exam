<?php
    include("./public.php");
    if($_GET['test']==1){
        $sql="truncate table item_pool";
    }
    if($_GET['test']==2){
        $sql="truncate table user_times";
    }
    if($_GET['test']==3){
        $sql="truncate table users";
    }
    if($_GET['test']==4){
        $sql="truncate table user_pool";
    }
    $res=$conn->query($sql);
    if($res){
        echo 'ok';
    }
    
?>