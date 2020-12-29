<?php
    session_start();
    unset($_SESSION['user']);
    // session_unset();
    echo "<script>window.location.href='../index.php'</script>"
?>