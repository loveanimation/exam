<?php
    include('./config.php');
    $card=$_GET['card'];
    $sql="select * from users where codes='$card'";
    $res=$mysql->query($sql);
    $arr=$res->fetch_array();
    $arr1=array("name"=>$arr['names']);
    $grade=$arr['grades'];
    if($grade==''){
        array_push($arr1,array('flag'=>true));
        echo json_encode($arr1);
    }else{
        array_push($arr1,array('flag'=>false));
        echo json_encode($arr1);
    }
?>