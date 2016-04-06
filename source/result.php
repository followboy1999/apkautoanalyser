<?php

$smarty = InitSmarty();
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

session_start();
if (!isset($_SESSION["filename_sha256"])){
	$smarty->display('error.tpl');
	return;
}

$smarty->display('result.tpl');
session_destroy();

?>