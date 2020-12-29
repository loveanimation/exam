<?php
    session_start();
    if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/public.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        .box{
            width:300px;
            margin:40px auto;
        }
        .box button{
            width:150px;
            margin:10px 0;
        }
    </style>
    <script src="./js/jquery-1.12.2.js"></script>
</head>
<body>
    <div class="box">
        <button onclick="reset_test(1)" class="fa fa-refresh"> 重置题库</button>
        <button onclick="reset_test(2)" class="fa fa-clock-o"> 重置时间</button>
        <button onclick="reset_test(3)" class="fa fa-address-book-o"> 重置考生</button>
        <button onclick="reset_test(4)" class="fa fa-refresh"> 重置答题</button>
    </div>
    <script>
        function reset_test(val){
            var enter=window.confirm("你确定要重置吗");
            if(enter){
                $.get(`./php/rest_title.php?test=${val}`,(res)=>{
                    if(res=='ok'){
                        alert('重置成功!')
                    }
                })
            }
        }
    </script>
</body>
</html>
<?php
    }else{
        echo "<script>window.location.href='index.php'</script>";
    }
?>