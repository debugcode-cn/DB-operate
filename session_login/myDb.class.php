<?php

/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2016/1/29
 * Time: 12:36
 */

class myDb {
    private static $instance=null;

    private function __construct(){}

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance=new self();
            return self::$instance;
        }else{
            die('我是单例哦，我已经有了一个');
        }
    }
    private function __clone(){}

    //创建一个实例后掉用这个方法可以创建一个pdo数据库连接,返回值为连接指针,
    //默认连接的数据库为loginDemo，这个可以通过参数转换但是方法只能使用一次,后期如果需要转换数据库需要另外的方法
    public function getDbConnect($dbname='loginDemo'){
        //pdo连接数据库
        $pdo=new PDO('mysql:host=localhost;dbname='.$dbname,'root','123wlz');
        //判断是否连接成功
        if(!$pdo){
            print_r($pdo->errorInfo());
            die();
        }else{
            //下面都是连接成功后的结果
            return $pdo;
        }
    }
}