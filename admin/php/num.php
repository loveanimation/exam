<?php
    include("./public.php");
    $sql="select * from item_pool";
    $res=$conn->query($sql);
    echo $res->num_rows;
?>