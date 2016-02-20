<?php
/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2016/1/29
 * Time: 11:55
 */
/*
 * 提交的为注册（post方式提交注册信息,get方式提交操作，操作记为$action）
 * 提交的为登陆（post方式提交登陆信息,get方式提交操作，操作记为$action）
 * 提交的为退出（get方式提交操作，操作记为$action）
 * */

$username= isset($_POST['username']) ? $_POST['username'] : null;
$password= isset($_POST['password']) ? $_POST['username'] : null;
$action=isset($_GET['action'])? $_GET['action'] : null;

//用户名密码不为空
if(!is_null($username) && !is_null($password) && !is_null($action)){
//实例化一个单例数据库
    require_once 'myDb.class.php';
    $onepdb=myDb::getInstance();
//        默认选择loginDemo数据库进行连接
    $pdocon=$onepdb->getDbConnect();

//    动作为注册
    if('regist' === $action){
        //这里不应该就这么简单的操作啊 2016-2-20
        $name=$username;
        $pass=md5($password);
//        数据库插入操作
        $sql='insert into user VALUES (null,?,?)';
        $st=$pdocon->prepare($sql);
        $st->bindParam(1,$name,PDO::PARAM_STR,20);
        $st->bindParam(2,$pass,PDO::PARAM_STR,60);
        $st->execute();
        if(!$st){
            echo "\nPDO::errorInfo():\n";
            print_r($pdocon->errorInfo());
        }else{
            $st->execute();
        }
    }
    if('login' === $action){
        $name=$username;
        $pass=md5($password);
        //数据库表查询来验证登陆信息是或合法
//        $sql = "SELECT username,password FROM user where username =".$name;
        $sql="SELECT `username`, `password` FROM `user` where username =?";
//        echo $sql;
        $st=$pdocon->prepare($sql);
        $st->bindParam(1,$name,PDO::PARAM_STR);
        if(!empty($st)){
//            echo 'ok';
            $st->execute();//false true;
            $arrinfo=$st->fetch(PDO::FETCH_ASSOC);
//            print_r($arrinfo);die();
            $db_pass=$arrinfo['password'];
            if($pass === $db_pass){

//                  用户信息填写正确，获取用户信息，页面展现
                $sql="SELECT theword from userinfo where username = ?";
//                echo 'password is ok';
                $st_info=$pdocon->prepare($sql);
                $st_info->bindParam(1,$name,PDO::FETCH_ASSOC);
                if($st_info){
                    $st_info->execute();
                    $infoarr=$st_info->fetch(PDO::FETCH_ASSOC);//用户信息数组
//                    print_r($infoarr);
                    $info_name=$name;
                    $info_word=$infoarr['theword'];
                    $userInfoArr=[
                        $info_name,$info_word
                    ];
//                  显式调用 session_start()来开启会话机制
                    session_start();
                    $_SESSION['login_status']='in';
                    $_SESSION['login_info']=$userInfoArr;
//                  显式调用 session_write_close() 来保存会话数据。
                    session_write_close();
//                    print_r($_SESSION);
//                  转入登陆成功后的首页
//                    header("Location:./html/index.php");
                }
            }else{
                die('密码错误');
            }
        }else{
            //向客户端输出没有此用户的信息
            die('用户不存在');
//            echo "\nPDO::er++++rorInfo():\n";
//            print_r($pdocon->errorInfo());
        }
    }
}else if('exit' == $action){

    if(isset($_COOKIE['PHPSESSID'])){
        setcookie(session_name(),'',time()-4200);
        session_destroy();
    }
    echo 'exit_ok';
}