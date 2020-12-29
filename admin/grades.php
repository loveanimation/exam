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
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        table{
            width:800px;
            margin:20px auto;
        }
        td{
            text-align:center;
        }
        tr{
            height:40px;
        }
        tr>td:nth-child(1){
            width:50px;
        }
        .export{
            width:800px;
            margin:auto;
            text-align:center
        }
        .export a{
            background:#999;
            padding: 5px;
            border-radius:10px;
            
        }
    </style>
</head>
<body>
    <table border="1" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>用户名</td>
            <td>身份证号</td>
            <td>成绩</td>
        </tr>
        <?php 
            include("./php/public.php");
            $res=$conn->query("select * from users");
            if($res->num_rows>0){
            while($arr=$res->fetch_assoc()){

           
        ?>
        <tr>
            <td><?php echo $arr['id']; ?></td>
            <td><?php echo $arr['names']; ?></td>
            <td><?php echo "'".$arr['codes']; ?></td>
            <td><?php if($arr['grades']){
                echo $arr['grades'];
            }else{
                echo "无成绩";
            } ?></td>
        </tr>
        <?php }}else{
           
         ?>
         <tr>
             <td colspan="4" >没有数据</td>
         </tr>
         <?php } ?>
    </table>
    <div class="export"><a> <i class="fa fa-cloud-download"></i> 导出为exeal</a></div>
    <script>
        var html=`<html>
                <head><meta charset="utf-8"></meta></head>
                <body>
                ${document.getElementsByTagName('table')[0].outerHTML}
                </body>
            </html>`
        var blob=new Blob([html],{type:'application/vnd.ms-excel'});
        var a=document.getElementsByTagName('a')[0];
        a.href=URL.createObjectURL(blob);
        a.download="学生成绩表.xls";
    </script>
</body>
</html>
<?php
    }else{
        echo "<script>window.location.href='index.php'</script>";
    }
?>