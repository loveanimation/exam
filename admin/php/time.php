<?php
    include("./public.php");
    $res=$conn->query("select * from times");
    echo json_encode($res->fetch_assoc());
?>