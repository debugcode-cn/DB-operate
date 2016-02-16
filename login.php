<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>登陆</title>

    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        body{
            border: 1px solid red;
            background-color: rgba(100,20,10,0.8);
        }
        .login-div{
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
        var hefa=true;
        function judgeid(){
//        alert(this.style.color(red));
            alert("我在这里验证学号是否合法")

//        在这里通过验证改变hefa的值
            if(!hefa){
                alert("学号不合法")
                var xh=document.getElementsByName('xuehao')[0];
                xh.value=null
            }
        }
        function judgepass(){
            alert("我在这里验证密码是否合法")

//        在这里通过验证改变hefa的值
            if(!hefa){
//            这里密码需要从服务器出获得，想到了使用ajax
                alert('密码不合法');
            }
        }
    </script>
</head>

<body>
<div class="login-div">
    <form action="" method="post">
        用户名:<br><input type="text" name="username" value="wlz" onblur="judgeid()">
        <!--    <input type="radio" name="name" value="man">男<br/>-->
        <!--    <input type="radio" name="name" value="woman">女-->
        <br>
        密码:<br><input type="password" name="password" onblur="judgepass()"><br>
        <!--    <input type="submit" value="登陆" name="login">-->
        <input type="submit" value="登陆" name="login">
    </form>
</div>
</body>
</html>

<?php
//<!--在这里验证是否通过了表单合法性验证if($hefa)-->             我觉得这一点到这里就可以认为是真的了，因为在表单提交前一定判断为合法超可以提交。
//所以下面就是简单的数据库操作了，简单了。。。。。。。。。。。。。。。。。。这一点可以不放在这里考虑了。

//如果通过了验证就连接服务器进行密码与账户的正确性验证
//根据学号查询数据库用户表获得对应的密码$remotepass
//根据学号遍历数据库中的账号表（建立一个用户表，我想应该会节省查询时间吧。。）
/*1:验证账号是否存在--------不存在就返回提示不存在信息。（其实这点也可以通过ajax验证存不存在吧。。这可能还要连接数据库）
 * 2：账号存在就进行数据库查询获得$remotepass
 * 3：进行$remotepass与$_post['localpass']比较（这个过程中可能存在值的类型的问题，要注意)
 * 4：如果步骤3判断成功就跳转到个人首页[这个要建立个人首页（通过js中的跳转可以实现了)]
 * 5：如果步骤3判断失败就在页面添加标签提示说密码错误，因为到这里账号已经判断了是存在的（这个先判断了账号是否存在）
 *             这一步没有页面跳转，只有提示动作，但是提示的结果却是深度最大的。
 * 6：当第一次输入错误后进入第二次输入的时期时鼠标焦点进入输入框，这是要清楚错误提示信息，这用到焦点事件（清除表单中没用的提示信息）
 *
 * */
?>