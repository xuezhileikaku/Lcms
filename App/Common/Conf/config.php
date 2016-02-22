<?php
return array(
	//'配置项'=>'配置值'
	//开启页面trace
	'SHOW_PAGE_TRACE'=>true,
	//'配置项'=>'配置值'
	'default_module' => 'Home', //默认模块
	'url_model' => '2', //URL模式
	'session_auto_start' => true, //是否开启session
	//数据库配置
        'DB_TYPE' => 'mysql', // 数据库类型
        'DB_HOST' => '127.0.0.1', // 服务器地址
        'DB_NAME' => 'manage', // 数据库名
        'DB_USER' => 'root', // 用户名
        'DB_PWD' => '', // 密码
        'DB_PORT' => 3306, // 端口
        'DB_PREFIX' => 'ma_', // 数据库表前缀
        'DB_CHARSET'=> 'utf8', // 字符集
        'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志

);