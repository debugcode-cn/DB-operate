<?php
require_once 'connectmysqli.php';
if(!$conn){
    die('数据库连接错误');
}
echo "<pre/>";
echo "<title>浏览课程</title>";
//输出中的页数totalitems
$totalsql='select count(*) from courses';
$totalitems=$conn->query($totalsql);

$page=isset($_GET['page'])? $_GET['page']:0;
$start=$page*2;
$number=3;
$pagenumber=ceil(($totalitems/$number))+((($totalitems%$number)==0) ? 0:1);
echo $pagenumber;

$sql="select * from courses limit ".$start.",".$number;
//echo $page,$sql;
$connque=$conn->query($sql);
$oneline=$connque->fetch_assoc();
//一条记录obj类型
//var_dump($oneline);
//while($pagenumber>);
?>
<hr style="width: 80%;color: darkgreen"/>
<div id="list-courses" style="margin: 20px 10%;border:1px solid green;">
<div>id----------><?php echo $oneline['id'];?></div>
<div>courseid----------><?php echo $oneline['courseid'];?></div>
<div>coursename----------><?php echo $oneline['coursename'];?></div>
<div>coursedesc----------><?php echo $oneline['coursedesc'];?></div>
<div>stuid----------><?php echo $oneline['stuid'];?></div>
</div>
<?php
//在这里判断边界问题
//考虑去掉哪个的问题。
echo "<a href=browercourse.php?page=".($page-1).">上一页</a>"."    ";
echo "<a href=browercourse.php?page=".($page+1).">下一页</a>总页数：",$pagenumber;
?>
<!--<script style="text/javascript">-->
<!--    function pre(){-->
<!--        alert("重新加载本页");-->
<!--       window.location.reload(true);-->
<!--    }-->
<!--</script>-->
<!--<input type="button" value="上一页" onclick="pre()"/>-->
<!--<input type="button" value="下一页" onclick="nex()"/>-->