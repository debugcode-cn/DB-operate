<?php
header('content-type:text/html;charset=uft-8');

require_once '/../configure/config.php';

class ConnectDb{
    private  static $dbInstance=null;

    //构造方法的私有化
    private function  __construct(){

    }
    private function __clone(){

    }
    public static function getInstance(){
        if(is_null(self::$dbInstance)){
            try{
                self::$dbInstance=new PDO(dsn,user,pass);
                echo "数据库单例连接成功";

            }catch (PDOException $e) {
                die("数据库连接失败" . $e->getMessage());
            }
//header('Location:http://localhost/stumanagerOS/functions/stuOp.php');

        }else{
            return null;
        }
        return self::$dbInstance;
    }
}

//获得单个pdo实例
$pdo=ConnectDb::getInstance();

