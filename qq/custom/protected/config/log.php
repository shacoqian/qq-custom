<?php

//日志信息
return array(
	'class'=>'CLogRouter',
	'routes'=>array(
		//array(
		//	'class'=>'CFileLogRoute',
		//	'levels' => 'trace,info,profile,warning,error', 
		//),
		// uncomment the following to show log messages on web pages
		array(
			'class'=>'CWebLogRoute',
			'levels' => 'trace,info,profile,warning,error', 
		),
	),
);
?>