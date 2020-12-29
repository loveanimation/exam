<?php
     include('./public.php');
     $id=$_GET['id'];
     $title=$_GET['title'];
     $A=$_GET['A'];
     $B=$_GET['B'];
     $C=$_GET['C'];
     $D=$_GET['D'];
     $rights=$_GET['rights'];
     $select=$_GET['type'];
     $sql="update item_pool set titles='$title',types='$select',A='$A',B='$B',C='$C',D='$D',rights='$rights' where id='$id'";
     $res=$conn->query($sql);
     if($res){
         echo 'ok';
     }else{
         echo 'no';
     }
?>