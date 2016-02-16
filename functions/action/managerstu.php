<!--//这里要设置出现次数，因为不能每次打开这个页面都要弹出这个东东。
通过session设置会话机制，已经实现了仅当第一次通过浏览器打开这个页面的时候，提示
警告框。
-->
<?php
session_start();
//define('managerstupath',dirname(__FILE__));
if(!isset($_SESSION['intomanagerstu']))
{?>
<!-- 设置第一次警告框-->
<script type="text/javascript">
    alert("学生是块宝，认真对待好！");
</script>
<?php
}
//进行真正的业务处理操作
$_SESSION['intomanagerstu']=true;
echo "我是else 部分，session->intomanagerstu已经被设置了";
?>
<!--在这里书写学生管理页面-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生操作</title>
    <style type="text/css">
        /*列表导航*/
        #bodyleft-liststu ol>li{
            display: block;
            margin-left: 30px;
            margin-top:10px;
            margin-right:50px;
            text-align:left;
            color: #9f5c5d;
            background-color: aquamarine;
            border:1px solid green;
        }
        /*课程信息列表*/
        #list-courses{
            /*display:inline;*/
            border:2px solid black;
            margin:10px 5%;
        }

        /*课程列表首行*/
        #list-head div{
            display: inline;
            width:20px;
            height:50px;
            color: #9f5c5d;
            text-align: center;
            padding: 3px 5%;
            border-right:2px dotted red;
        }

    </style>
    <script type="text/javascript">
        function changeshow(){
            var list=document.querySelector('#list-courses');
            alert(list);
        }
    </script>
</head>
<body>
    <div id="bodyleft-liststu">
        <ol>
            <?php
                if(!isset($browerstu)) { ?>
                    <li>
                        <a id="showlist" href="core/browerstu.php?page=0" target="_blank"
                           onclick="changeshow()">查看学生列表
                            （我可以点击哦，列表中含有修改功能按钮，跳转到学生信息修改页面）</a>
                    </li>
                    <?php
                }else{
                    ?>
            <a id="toindex" href="<?php echo '../../../index.php'?>">首页</a>
            <?php
                }
            ?>
            <li>
                <a href="core/addstu.php">添加学生</a>
            </li>
            <li>
                <!--这里指明批量添加参数-->
                <a href="core/addstu.php">批量添加学生</a>
            </li>
            <li>
                <a href="core/delstu.php">删除学生（给出id）</a>
            </li>
            <li>
                <a href="core/modifystu.php">修改学生信息</a>
            </li>
        </ol>
    </div>
    <div id="list-courses">这是学生信息部分
        <div id="list-head">
            <div>id</div><div>stuid</div><div>stuname</div><div>stucourseid</div>
        </div>

    </div>
</body>
</html>



