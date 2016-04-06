<?php
include('init.php');

$do=Val('do','get',0);
$dos=array('index','analyse','fileupload','check','result','reanalyse');

if(!in_array($do,$dos)) $do='index';
include(ROOT_PATH.'/source/'.$do.'.php');
?>