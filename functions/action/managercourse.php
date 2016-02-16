<div id="course-list">
    <ul>
        <li>
            <a href="core/browercourse.php?page=0" target="_blank">
                浏览课程信息
            </a>
        </li>
        <li>
            <a href="core/addcourse.php" target="_blank">
                添加课程信息
            </a>
        </li>
        <li>
            <a href="core/delcourse.php" target="_blank">
                删除课程信息
            </a>
        </li>
        <li>
            <a href="core/modifycourse.php" target="_blank">
                修改课程信息
            </a>
        </li>
    </ul>
</div>


<?php

//对于session的使用这个session变量的值和各个方面都有关，服务端会持久存在，所以但是用这等变量进行作为判断条件的话要注意之前的值的情况，
//避免在进行后续调试的时候对后面的结果产生影响。

session_start();
//define('managerstupath',dirname(__FILE__));
if(!isset($_SESSION['intomanagercourse']))
{ ?>
    <!-- 设置第一次警告框-->
    <script type="text/javascript">
        alert("课程管理重地，请谨慎操作");
    </script>
<?php
}
//进行真正的业务处理操作
$_SESSION['intomanagercourse']=true;
//echo "我是else 部分，session->intomanagerstu已经被设置了";
?>
<!--再次进入不弹出警告窗口，而进行课程浏览页面的导航-->



