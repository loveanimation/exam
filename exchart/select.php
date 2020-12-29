<?php
    include('./config.php');
    $sql="select * from blogs";
    $res=$mysql->query($sql);
    $arr=[];
    while($arr1=$res->fetch_array(MYSQLI_ASSOC)){
        array_push($arr,$arr1);
    }
    echo json_encode($arr);
?>