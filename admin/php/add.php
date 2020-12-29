<?php
    include('./public.php');
    $title=$_GET['title'];
    $A=$_GET['A'];
    $B=$_GET['B'];
    $C=$_GET['C'];
    $D=$_GET['D'];
    $rights=$_GET['rights'];
    $select=$_GET['type'];
    $sql="insert into item_pool(titles,types,A,B,C,D,rights) values('$title','$select','$A','$B','$C','$D','$rights')";
    $res=$conn->query($sql);
    if($res){
        echo 'ok';
    }else{
        echo 'no';
    }
?>