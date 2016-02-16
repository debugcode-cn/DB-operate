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
 * 2:
 */
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
<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>学生选课界面</title>
</head>
<body>
<form action="./core/do_for_select.php" method="post">
<?php
foreach($results as $one){
    //这里还可以把展现方式设计完善一下

    $courseId=$one['courseid'];
    $name=$one['coursename'];
    echo '<hr/>',PHP_EOL;
    echo $elo=<<<EOF
<label for={$name}>选择本课</label>
<input type="radio" id={$name} name={$courseId}/>
EOF;
    print_r($one);
}

?>
    <br/>
    <input type="submit" value="提交" style="margin-top:50px;border: 2px solid green;">
</form>

</body>
</html>

