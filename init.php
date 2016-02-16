<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="学生选课系统" name="keyword"/>
    <title>select courses for students</title>
    <style type="text/css">
        #header{
            width:80%;
            height:100px;
            border: 1px solid green;
            margin-left: 10%;
            margin-right:10%;
        }
        #init input:nth-child(2){
            color:red;
        }
    </style>
    <script type="text/javascript">
        function show(){
            alert("hi index.php");
        }
        function login(){
            window.location.href='login.php';
        }
    </script>
</head>
<body>

<div id="header">
    <div id="action">
        <a href="<?php echo sroot.'/index.php';?>" onclick="show()">首页</a>
        <a href="./functions/action/managerstu.php">学生管理</a>
        <a href="./functions/action/managercourse.php">课程管理</a>
        <a href="./functions/action/select.php">学生去选课</a>
    </div>
    <div id="init">
        <input type="button" name="login" value="登录" onclick="login()"/>
        <input type="button" name="logout" value="退出" onclick="exit()"/>
    </div>
</div>
</body>

