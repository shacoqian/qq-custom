<?php

//配置文件
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => '好屋中国 - 物业管理后台',
	//'sourceLanguage' => 'en',
   // 'language' => 'zh_cn',
    'defaultController' => 'index/index',

	// 预加载组件
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'base.components.*',
		'base.models.*',
	),

	'modules'=> include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'modules.php',

	'components'=> include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'components.php',
	
	'params'=> include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'params.php',
);