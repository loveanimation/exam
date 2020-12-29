<?php
    include('./public.php');
    $id=$_GET['id'];
    $sql="select * from item_pool where id='$id'";
    $res=$conn->query($sql);
    if($res->num_rows==0){
        echo 'no';
    }else{
        echo json_encode($res->fetch_assoc());
    }
    
    
   
    
?>