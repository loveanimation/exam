<?php
    include('./public.php');
    $num=$_GET['num'];
    $sql="update systems set max_num='$num'";
    $res=$conn->query($sql);
    if($res){
        echo 'ok';
    }
?>