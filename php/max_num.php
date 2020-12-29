<?php
    include('./config.php');
    $max=$mysql->query("select * from systems")->fetch_array()['max_num'];
    echo $max;
?>