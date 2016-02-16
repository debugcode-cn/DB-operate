<?php

$browerstu=true;
require_once "../managerstu.php";
require_once 'connectmysqli.php';

//获得数据总条数
$totalsql='select count(*) from students';
$totalitems=count((array)$conn->query($totalsql));//转换成数组进行计数
//echo count($totalitems);
//die();
//设置每页遍历的个数
$number=4;
//得到总页数------------------------------此时（$number为2的整数次幂值）下面的求余能换成移位预算就好了
$totalpages=floor($totalitems/$number)+((($totalitems%$number)==0) ? 0:1);
echo $totalpages;
//获得页码值
$page=$_GET['page'];
$start=$page*$number;
if(is_numeric($start))
$sql="select * from students limit ".$start.",".$number;
//echo $sql;
$conque=$conn->query($sql);
echo "<pre/>";

//echo $conque->num_rows;
//$num=0;经过验证下面的while循环执行的次数为记录的条数
echo '<div id="course-list" style="margin: 20px 5%;border:1px solid darkolivegreen;">';
    while(null!=($srcline=$conque->fetch_assoc())){
//        var_dump($srcline);返回的一行资源数组，在下面进行了分解。
        echo "<div class='oneinfo' style='margin-top:4px;height:50px;padding-top: 6px'>";
            foreach($srcline as $key=>$value){
                echo "<div class='cellinfo' style=
                                'margin-left:20px;border-left:3px solid green;margin-right:13%;display: inline;'
                                >".$value."</div>";
            }
//            $data=$srcline['id'].'    ';
//            $data.=$srcline['stuid'].'    ';
//            $data.=$srcline['stuname'].'    ';
//            $data.=$srcline['stucourseid'];
//        echo $data;
//        $num=$num+1;
        echo "哈哈各种操作可以添加到这里了"."</div>";
        echo "<hr style='border: 2px solid green;'/>";
    }
echo "</div>";
//echo $num;

//通过标签改变$start的值。
if($page>0&&$page<$totalpages){
    echo "<a href=browerstu.php?page=".($page-1).">上一页</a>"."    ";
    echo "<a href=browerstu.php?page=".($page+1).">下一页</a>总页数：".$totalpages;
}else{
    echo "<a href=browerstu.php?page=0>首页</a>";
    echo "<a href=browerstu.php?page=".($page+1).">下一页</a>";
}
//结束连接
$conn->close();
