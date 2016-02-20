<?php
/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2016/2/1
 * Time: 12:23
 */
require_once 'session_go.php';

$login_arr_info=isset($_SESSION['login_info']) ? $_SESSION['login_info']: null;

if(!is_null($login_arr_info)){

    //  在这输出用户登陆成功后可以显示的用户信息
    print_r($login_arr_info);
    echo "用户的登陆状态为". $status=isset($_SESSION['login_status']) ? $_SESSION['login_status']:null;

}else{
    echo 'login failure';

    print_r($_SESSION);
}
