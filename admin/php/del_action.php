<?php
    include('./public.php');
    $codes=$_GET['id'];
    $sql="delete from users where codes='$codes'";
    $res=$conn->query($sql);
    $sql="delete from user_times where codes='$codes'";
    $res=$conn->query($sql);
    $sql="delete from user_pool where codes='$codes'";
    $res=$conn->query($sql);
    if($res){
        echo "<script>alert('删除成功'); window.location.href='../reset_pass.php'  </script>";
    }
?>