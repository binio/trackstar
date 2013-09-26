<?php
//test test another
define('YII_DEBUG',true);
// change the following paths if necessary
$yii=dirname(__FILE__).'/protected/yii-1.1.12/framework/yii.php';

$config=dirname(__FILE__).'/protected/config/main_local.php';

if(getenv('ENV')=='dev'){$config=dirname(__FILE__).'/protected/config/main.php';}
if(getenv('ENV')=='live'){$config=dirname(__FILE__).'/protected/config/main_prod.php';}

//$yii=dirname(__FILE__).'/../framework/yii.php';
//$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
//echo $yii;
require_once($yii);
Yii::createWebApplication($config)->run();
