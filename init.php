<?php
/**
 * init.php
 * ----------------------------------------------------------------
 * 
 */
define('ROOT_PATH',dirname(__FILE__));

include(ROOT_PATH.'/config.php');

define('FILE_PATH',$config['filepath']);
define('TOOL_APK',$config['tool_apk']);
define('ANDROGUARD',$config['androguard_tool']);
define('TOOLPATH',$config['toolpath']);

define('MYSQL_HOST',$config['dbHost']);
define('MYSQL_USER',$config['dbUser']);
define('MYSQL_PASS',$config['dbPwd']);
define('MYSQL_DB',$config['database']);


include(ROOT_PATH.'/source/function.php');
include(ROOT_PATH.'/source/class/analysis.class.php');
include (ROOT_PATH.'/source/class/apkinfo.class.php');

unset($config); 
?>