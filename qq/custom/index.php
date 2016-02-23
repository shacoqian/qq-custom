<?php

/**
 * 好屋社区 - 物业管理后台入口文件
 */
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
define('YII_ENABLE_ERROR_HANDLER', True);
define('YII_ENABLE_EXCEPTION_HANDLER', True);

defined('YII_DEBUG') or define('YII_DEBUG', TRUE);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);

//设置继承目录
Yii::setPathOfAlias('base', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../base');

$app = Yii::createWebApplication($config);

 //设置项目根目录
Yii::setPathOfAlias('webroot', dirname(__FILE__));

//设置runtime目录
$app->setRuntimePath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'runtime');

//run
$app->run();