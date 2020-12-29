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
    <link  rel="stylesheet" href="./css/public.css">
    <link  rel="stylesheet" href="./css/add.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="./js/jquery-1.12.2.js"></script>
    <script src="./js/axios.js"></script>
</head>
<body>
    <div id="ms" style="width:800px;height:60px;">
        ID: <input type="text" id="select"><button onclick="num($('#select').val())">查询</button>
    </div>
    <table border="1" cellspacing="0" width="800"  style="margin:0 auto;">
        <tr>
            <td>题目</td>
            <td><input type="text" id="title" placeholder="请输入题目" autocomplete="off" style="width:80%"></td>
        </tr>
        <tr>
            <td>题型</td>
            <td>
                <select name="" id="type">
                    <option value="单选">单选</option>
                    <option value="多选">多选</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>A选项</td>
            <td><input type="text" id="A" placeholder="格式:A、xxxxxx" autocomplete="off"></td>
        </tr>
        <tr>
            <td>B选项</td>
            <td><input type="text" id="B" placeholder="格式:B、xxxxxx" autocomplete="off"></td>
        </tr>
        <tr>
            <td>C选项</td>
            <td><input type="text" id="C" placeholder="格式:C、xxxxxx" autocomplete="off"></td>
        </tr>
        <tr>
            <td>D选项</td>
            <td><input type="text"  id="D" placeholder="格式:D、xxxxxx" autocomplete="off"></td>
        </tr>
        <tr>
            <td>正确答案</td>
            <td><input type="text" id="right" placeholder="格式:单选A-D.多选A,D英文符号分割" autocomplete="off"></td>
        </tr>
        <tr>
            <td colspan="2"><button onclick="add()">提交</button></td>
        </tr>
    </table>

    <script>
        function num(id=1){
            let url="./php/init.php?id="+id;
            axios.get(url).then(res=>{
            //    console.log(res)
            if(res.data=='no'){
                alert('无此数据');
                return;
            }
            $("#title").val(res.data.titles)
            $('#select').val(res.data.id);
            $("#A").val(res.data.A)
            $("#B").val(res.data.B)
            $("#C").val(res.data.C)
            $("#D").val(res.data.D)
            $("#right").val(res.data.rights);
            $("#type").val(res.data.types)
            })
        }
        num();
        function add(){
            var title=$("#title").val();
            if(title==''){
                alert("试题题目不能为空");
                $("#title").select();
                return false;
            }
            var A=$("#A").val();
            if(title==''){
                alert("A答案不能为空");
                $("#title").select();
                return false;
            }
            var B=$("#B").val();
            if(title==''){
                alert("B答案不能为空");
                $("#title").select();
                return false;
            }
            var C=$("#C").val();
            if(title==''){
                alert("C答案不能为空");
                $("#title").select();
                return false;
            }
            var D=$("#D").val();
            if(title==''){
                alert("D答案不能为空");
                $("#title").select();
                return false;
            }
            var rights=$("#right").val();
            if(title==''){
                alert("正确答案不能为空");
                $("#title").select();
                return false;
            }
            type=$("#select").val();
            axios.get(`./php/edit.php?id=${$('#select').val()}&title=${title}&A=${A}&B=${B}&C=${C}&D=${D}&type=${type}&rights=${rights}`).then(res=>{
                // console.log(res)
                if(res.data=='ok'){
                    alert('修改成功')
                }
            })
        }
    </script>
</body>
</html>
<?php
    }else{
        echo "<script>window.location.href='index.php'</script>";
    }
?>