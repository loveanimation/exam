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
    <script src="./js/axios.js"></script>
    <!-- 重置密码 -->
</head>
<body>
    <?php
        include('./php/public.php');
        $sql="select * from systems";
        $res=$conn->query($sql);
        
        $arr=$res->fetch_array();

    ?>
    <div class="reset_view">
        <form action="#" method="post" name="form1"  onsubmit="return formCheck()">
            <li>
                <label>总题数:</label>
                <input type="text" name="names" id="names" placeholder="请输入总题数" value="<?php echo $arr['max_num'] ?>">
            </li>
            <li>
                <input type="submit" value="修改" name="submit2">
            </li>
        </form>
        <form action="#" method="post"  name="form1"   onsubmit="return formCheck2()">
            <li>
                <label>总分:</label>
                <input type="text" name="codes" id="codes" placeholder="总分"  value="<?php echo $arr['total_score'] ?>">
            </li>
            <li>
                <input type="submit" value="修改" name="submit2"  >
            </li>
        </form><br>
        <li class="end" style="border:1px solid #000" border="1">
            考试时间修改:<input type="number" name="" id="hour" onchange="changeTime()">时,<input type="number" id="fen" onchange="changeTime()">分,<input type="number" id="s"  onchange="changeTime()">秒
           
        </li>
    </div>
   
    <script>
        function formCheck(){
            var names=$("#names").val();
            if(names==''){
                alert('睁大狗眼填好');
                return false;
            }
            let url="./php/title_num.php?num="+names;
            axios.get(url).then(res=>{
                // console.log(res)
                if(res.data='ok'){
                    alert('题数修改成功')
                }
            })
            return false;
        }
        function formCheck2(){
            var names=$("#codes").val();
            if(names==''){
                alert('睁大狗眼填好');
                return false;
            }
            let url="./php/fen.php?num="+names;
            axios.get(url).then(res=>{
                if(res.data='ok'){
                    alert('分数修改成功')
                }
            })
            return false
        }
        function changeTime(){
            let h=$("#hour").val();
            let f=$("#fen").val();
            let s=$("#s").val();
            if(f>59||s>59){
                alert('填写正确时间');
                return
            }
            axios.get(`./php/update_time.php?h=${h}&i=${f}&s=${s}`).then(res=>{
                if(res.data=='ok'){
                    alert('修改成功');
                }
            })
        }
        function time(){   // 初始化时间
            axios.get('./php/time.php').then(res=>{
                // console.log(res)
                let h=$("#hour").val(res.data.h);
                let f=$("#fen").val(res.data.i);
                let s=$("#s").val(res.data.s);
            })
        }
        time();
    </script>
  
</body>
</html>
<?php
    }else{
        echo "<script>window.location.href='index.php'</script>";
    }
?>