<?php
    include("./public.php");
    $h=$_GET['h'];
    $i=$_GET['i'];
    $s=$_GET['s'];
    $sql="update times set h='$h',i='$i',s='$s'";
    $res=$conn->query($sql);
    if($res){
        echo 'ok';
    }else{
        echo 'no';
    }
?>