<?php
    include('./public.php');
    $codes=$_GET['id'];
   $pass=md5(123456);
   $sql="update users set pass='$pass' where codes='$codes'";
   $res=$conn->query($sql);
   if($res){
    echo "<script>alert('修改成功,密码为:123456'); window.location.href='../reset_pass.php'  </script>";
   }
?>