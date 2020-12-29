<?php
    include('./php/public.php');
    if(!isset($_GET['user'])){
        echo "<script>window.location.href='index.php'</script>";
    }
    $user=$_GET['user'];
    $pass=$_GET['pass'];
    $sql="select * from admins where user='$user' and pass='$pass'";
    $res=$conn->query($sql);
    if($res->num_rows==0){
        echo "<script>window.location.href='index.php'</script>";
    }else{
        session_start();
        $_SESSION['user']=$user;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/public.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="./js/axios.js"></script>
    <script src="./js/jquery-1.12.2.js"></script>
</head>
<body>
    <div class="header">
        <div class="header_l">
            <img src="./images/logo.png" alt="">
            <span class="header——title">智慧树考试后台管理系统</span>
        </div>
        <div class="header_r">
            <span class="fa fa-user-circle-o"></span>
            <span ><?php echo $_SESSION['user'] ?></span>
            <span>
                <a href="./php/tuichu.php" >退出</a>
            </span>
        </div>
    </div>
    <div class="content">
        <div class="content_l">
            <li>后台管理系统</li>
            <li>
                <span class="fa fa-key">&nbsp;</span>
                <a href="./reset_pass.php" target="iframe">考生信息管理</a>
            </li>
            <li>
                <span class="fa fa-sort-numeric-desc">&nbsp;</span>
                <a href="./update_tit_max.php" target="iframe">系统设置</a>
            </li>
            <li>
                <span class="fa fa-plus-circle">&nbsp;</span>
                <a href="add_title.php"  target="iframe">添加试题</a>
            </li>
            <li>
                <span class="fa fa-edit">&nbsp;</span>
                <a href="edit_title.php"  target="iframe">修改试题</a>
            </li>
            <li>
                <span class="fa fa-download">&nbsp;</span>
                <a href="./import_excel/import_test.php"  target="iframe">导入试题</a>
            </li>
            <li>
                <span class="fa fa-search">&nbsp;</span>
                <a href="./grades.php"  target="iframe">成绩统计</a>
            </li>
            <li>
                <span class="fa fa-refresh">&nbsp;</span>
                <a href="./resset_act.php"  target="iframe">重置考试</a>
            </li>
        </div>
        <div class="content_r">
            <div class="content_r_top">
                <iframe class="iframe" name="iframe" src="./reset_pass.php" frameborder="1"></iframe>
            </div>
            <div class="content_r_foot" >
                copyright@2018-2021年 智慧树开发团队  15613699215
            </div>
        </div>
    </div>
    <script>
       
       $(".content li").on('click',function(){
            $(this).addClass('active').siblings().removeClass('active');
       })
       $("content li:first-child").on('click',()=>{})
    </script>
</body>
</html>