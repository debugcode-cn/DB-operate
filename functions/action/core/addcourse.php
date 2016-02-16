<?php
//echo "<pre/>";
//var_dump($result);
//echo 1+$result[0];

//exit;
//$into=1;
//下面的判断当然是在表单提交时进行可合法的数据的验证了的，这点可以通关过js 验证数据的合法性
//下面就当数据提交过来的已经是判断好的合法的了。
if(isset($_POST['insertcourse'])&&isset($_POST['coursename'])) {
//    if($_POST['coursename'])

    //得到最大的课程id
    require_once 'connectmysqli.php';
    $conn->set_charset('utf8');//设置数据库编码方式
    $conquery = $conn->query("select max(courseid) from courses");
    $result = $conquery->fetch_row();
    $maxresult = 1 + $result[0];
    $name = $_POST['coursename'];
    $desc = $_POST['coursedesc'];
//    var_dump($name);通过这句可以看到name 的值为字符串类型
    $sqlinsert = "INSERT courses values(null,$maxresult, '$name' ,'$desc',null)";
    echo $sqlinsert;
    if ($conn->query($sqlinsert)) {

        echo "添加成功";

        //跳转到上一个页面。
        echo "<script>window.location.href='../managercourse.php';</script>";
    }else{
        echo '添加失败';
        exit;
    }
}
?>
<div style="margin: 20px 20%">
    <form action="" method="post">
        课程名:<input type="text"  name="coursename"/>
        课程描述:<textarea style="width:100px;" name="coursedesc"></textarea>
        提交:<input type="submit" value="提交" name="insertcourse"/>
    </form>
</div>

