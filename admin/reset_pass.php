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
    <link rel="stylesheet" href="./css/rest_pass.css">
    <script src="./js/jquery-1.12.2.js"></script>
    <!-- 重置密码 -->
</head>
<body>
    <div class="reset_view">
        <form action="#" method="post" onsubmit="return formCheck()">
            <li>
                <label>用户名:</label>
                <input type="text" name="names" id="names" placeholder="请输入用户名">
            </li>
            <li>
                <label>身份证号:</label>
                <input type="text" name="codes" id="codes" placeholder="请输入身份证号">
            </li>
            <li>
                <input type="submit" value="查询" name="submit" id="btn" >
            </li>
        </form>
    </div>
    <table border="1" cellspacing="0">
        <tr>
            <th>编号</th>
            <th>用户名</th>
            <th>身份证号</th>
            <th>重置密码</th>
            <th>删除用户</th>
        </tr>
        <?php
                include('./php/public.php');
                if(isset($_POST['submit'])){
                    $names=$_POST['names'];
                    $codes=$_POST['codes'];
                    if($codes==''){
                        $sql="select * from users where names='$names'";
                    } 
                    if($names==''){
                        $sql="select * from users where codes='$codes'";
                    }
                    if($names!='' && $codes!=''){
                        $sql="select * from users where codes='$codes' and names='$names'";
                    }
                    // echo $sql;
                    $res=$conn->query($sql);
                    if($res->num_rows>0){
                    while($arr=$res->fetch_array()){
               
            ?>
        <tr>
            <td><?php echo $arr['id'] ?></td>
            <td><?php echo $arr['names'] ?></td>
            <td><?php echo $arr['codes'] ?></td>
            <td><button style="border-radios:10px;width:50px;"><a href="./php/res_action.php?id=<?php echo $arr['codes']; ?>">重置</a></button></td>
            <td><button style="border-radios:10px;width:50px;"><a href="./php/del_action.php?id=<?php echo $arr['codes']; ?>">删除</a></button></td>
            
        </tr>
        <?php
                    } 
                    }else{
                        echo '<tr><td colspan="5">无此数据</td></tr>';
                    }
            
            }   
        ?>
    </table>

    <script>
        function formCheck(){
            var names=$("#names").val();
            var codes=$("#codes").val();
            if(names=='' && codes==''){
                alert('睁大狗眼填好');
                return false;
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