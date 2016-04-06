<?php
 /**
 * analyse Application
 * @package analyse-application
 */


$smarty = InitSmarty();
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
$smarty->display('index.tpl');

?>