<?php

//账户名、密码要能使用某个数据库
define('user','root');
define('pass','123wlz');
//采用pdo连接方式,会放在单例模式中创建连接
define('dsn','mysql:host=localhost;dbname=stumanager');