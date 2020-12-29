<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台登录系统</title>
    <link rel="stylesheet" href="./css/public.css">
    <link rel="stylesheet" href="./css/reg.css">
    <script src="./js/jquery-1.12.2.js"></script>
    <script src="./js/axios.js"></script>
</head>

<body>
    <div class="test_box">
        <div class="content">
            <div>智慧树远程考试后台管理系统</div>
            <div>Welcome to you envoy！</div>
            <div class="user_info">
                <div>
                    <label>用户名：</label>
                    <input type="text" class="user_info_input" id="user" placeholder="请输入用户名">
                </div>
                <div>
                    <label>密码：</label>
                    <input type="password" class="user_info_input" id="pass" placeholder="请输入密码">
                </div>
                <div>
                    <label>
                        <input type="button" class="user_info_but" value="登录" onclick="user_check()">
                    </label>
                </div>
            </div>
        </div>
    </div>

    <script>
        function user_check() {

            var user = $("#user").val()
            var pass = $("#pass").val()

            if (user == '') {
                alert('用户名不能为空')
                $('#user').focus()
                return false
            }
            if (pass == '') {
                alert('密码不能为空')
                $('#pass').focus()
                return false
            }
            const url = "http://localhost/exam/admin/php/user.php?user=" + user + "&pass=" + pass
            axios.get(url).then(res => {
                console.log(res.data)
                if (res.data == 'ok') {
                    window.location.href = 'main.php?user='+user+"&pass="+pass;
                } else {
                    alert('账户或密码不正确')
                }
            })

        }
    </script>
</body>

</html>