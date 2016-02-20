
<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>学生选课界面</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2016/2/15
 * Time: 19:26
 *
 * 课程具有年级属性
 * 根据年级展现不同的课程
 *
 * 选课方式，通过提交按钮提交请求
 *
 * 问题:
 * 1:前端需要更好的用户体验
 * 2:这里的判断标志是在优化的时候添加上去的，现在不需要修改，按照这个逻辑也可以使用,
 *          0：场景为进行提交选课表单,其他：其他
 *
 * 用到向其他页面共享数据的方法，添加session元素,
 */

$ajaxFlag=isset($_GET['flag'])? $_GET['flag'] : 0;
$transdata=null;

if($ajaxFlag===0){

require_once '../connect.php';
echo PHP_EOL;
echo '<h2 style="text-align: center;">可选课程如下</h2>',PHP_EOL;
$coursename='';//默认查询条件设置为数据结构
if(!empty($coursename)){
    $sql="select courseid,coursename,coursedesc from courses where coursename=?";
    $state=$pdo->prepare($sql);
    $state->bindParam(1,$coursename,PDO::PARAM_STR);
}else{
    //没有查询条件的限制，就是查询全部
    $sql="select courseid,coursename,coursedesc from courses";
    $state=$pdo->prepare($sql);
}
$state->execute();
$results=$state->fetchAll(PDO::FETCH_ASSOC);
//print_r($results);
?>
<div>
    <form action="./core/do_for_select.php" method="post">
<?php
    //存放id name键值对
    $idtoname_arr=array();

    foreach($results as $one){
        //这里还可以把展现方式设计完善一下

        $courseId=$one['courseid'];
        $name=$one['coursename'];
        echo '<hr/>',PHP_EOL;
        echo $elo=<<<EOF
    <label for={$name}>选择本课</label>
    <input type="checkbox" id={$name} name="{$courseId}">
EOF;
        echo '课程名称:'.$one['coursename'],'    ||    课程描述:'.$one['coursedesc'];
        $idtoname_arr[$courseId]=$name;
    //    上面heredoc中的字符串，如果$courseId没有添加双引号，那么name后面的字符就会添加到数据数组的
    //    键中。

    }

    //将要传递的信息编码成json格式传送出去
    $json_idname=json_encode($idtoname_arr);
    session_start();
    $_SESSION['json_id_name']=$json_idname;

    ?>
        <br/>
        <input type="submit" value="提交" style="margin-top:50px;border: 2px solid green;">
    </form>
</div>
<?php
}
?>

</body>
</html>
