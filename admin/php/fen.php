<?php
    include('./public.php');
    $num=$_GET['num'];
    $sql="update systems set total_score='$num'";
    $res=$conn->query($sql);
    if($res){
        echo 'ok';
    }
?>