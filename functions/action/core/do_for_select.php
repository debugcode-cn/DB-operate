<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>确认选课结果</title>

    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
    </style>
    <script type="text/javascript">
        function queRen(){
            if(confirm('确定选择这些课程？')){
                window.location.href=document.location.origin;
            }else{
                window.history.back();
                //在这里在将浏览器刷新一遍就可以了
            }
        }
    </script>

</head>

<?php
/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2016/2/15
 * Time: 21:40
 * 接受来自select.php页面的表单请求,并对数据库进行处理
 */
//获得传入本页面的post数据
session_start();
$jsonidname=isset($_SESSION['json_id_name'])? $_SESSION['json_id_name'] : null;

if(!empty($jsonidname) && !empty($_POST)){
    //session 中的json数据
//    echo $jsonidname;

    //表单提交的数据courseId
    $select_arr=$_POST;
//    echo 'post过来的数据数组为<br/>';
//    print_r($select_arr);
    //得到键值，也就是courseId数组
    $keys=array_keys($select_arr);
//    print_r($keys);

    //json数据转化成原来的数据格式(数组,第二个参不能使用默认的形式，
    //默认为false就是将返回值变成对象类型，true表示真正的原来的类型)
    $idname_arr=json_decode($jsonidname,true);
    //courseId=>coursename
//    print_r($idname_arr);
//    echo gettype($idname_arr);

//载入数据库连接变量$pdo
    require_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'connect.php';
//print_r($pdo);


}else{
    //展示请求错误页面，（进入这里可以快速调试一些独立数据）
    echo '非法请求';
//    echo dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'connect.php';
}
?>

<body>
<div>

<!--    <pre>-->
<!--    //这里得到传进来的 挑选好的课程集合-->
<!--    //通过这些集合和用户登陆之后得到的信息的结合，将用户id和课程id以及其他信息当成一条记录插入到-->
<!--    //数据表stu_cou中。作为一条选课结果-->
<!--    </pre>-->

    <div>
        <?php
            if(isset($idname_arr)&& isset($keys) ){
                echo '<br/>所选课程为:<br/>';
                foreach($keys as $id){
                    echo $idname_arr[$id];
                }
        ?>
                <br/>
                <input type="button" onclick="queRen()" value="确定">
                <br/>
        <?php
            }
        //撤销掉本次会话
//            setcookie(session_name(),'',1444,'/','');
//            session_destroy();
        ?>

    </div>
</div>

</body>
</html>
