<?php
/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2016/2/15
 * Time: 19:44
 */

try{
    $conn=new mysqli('localhost','root','123wlz','stumanager');
}catch (Exception $e){
    die("数据库连接错误信息: ".$e->getMessage());
}