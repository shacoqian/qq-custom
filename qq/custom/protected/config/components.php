<?php

//组件加载设置
return array(
	'user'=>array(
		'allowAutoLogin' => false,
	),
	
	'urlManager'=>array(
		'urlFormat'=>'path',
		'rules'=> include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'rules.php',
		'showScriptName' => false,
		//'urlSuffix' => '.html',
	),

	'db'=> include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'db.php',
	
//	'errorHandler' => array('errorAction' => 'WuyeError/error'),
//
	//'log' => include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'log.php',

	'cache' => array(
		'class' => 'CFileCache',
		'directoryLevel' => 2
	),
	/*
	//接口请求组件
	'httpRequest' => array(
		'class' => 'application.components.HttpRequest',
		'requestDebug' => false,
		'requestBaseUrl' => 'http://myworld.com/'
	),
	*/		
	//发送邮件
	'mailers' => array(
		'class' => 'application.extensions.mailer.Mailers',
                'username' =>'qianfeng5511@163.com',
                'password' => 'qobushi110',
                'realUserName' => '计划网',
                'server' =>'smtp.163.com',
	),
);
?>