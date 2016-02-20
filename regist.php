<!Doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>sessionForLogin</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        body{
            border: 1px solid red;
            background-color: rgba(100,20,10,0.8);
        }
        .regist-div{
            margin: 200px auto;
            width: 200px;
            height: 200px;

            border-radius: 20px;
            /*border: 1px solid red;*/
            padding-top: 20px;
            padding-left: 20px;
            padding-right: 20px;
            background-color: white;
            box-shadow: -10px 10px 80px;
        }

    </style>
    <script type="text/javascript">
        function cancle(){
            window.location.href=document.location.origin;
        }
    </script>
</head>

<body>
<div class="regist-div">
    <form action="./session_login/session_go.php?action=regist" method="post">
        <label for="un">用户名:</label><br/>
        <input type="text" name="username" id="un">
        <!--    <input type="radio" name="name" value="man">男<br/>-->
        <!--    <input type="radio" name="name" value="woman">女-->
        <br>
        <label for="pw">密码:</label><br/>
        <input type="password" id="pw" name="password">
        <!--    <input type="submit" value="登陆" name="login">-->
        <input type="submit" value="注册" name="regist">
    </form>
    <input type="button" value="取消" onclick="cancle()">
</div>
</body>
</html>