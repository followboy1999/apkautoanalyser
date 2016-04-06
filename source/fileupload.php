<?php
session_start();
$path = FILE_PATH . $_SESSION["filename_sha256"];

$smarty = InitSmarty();
/*
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
*/
/*
if (!isset($_SESSION["filename_sha256"])){
	$smarty->display('error.tpl');
	return;
}
*/
/*
$_SESSION["filename"] = FILE_PATH . $_SESSION["filename_sha256"] . '/' . $_FILES["file"]["name"];
*/
if ($_FILES["file"]["error"] > 0){
    echo "error";
//    echo '{"upload": false}';
}
else
{
	mkdir($path);
	$path = $path . "/";
	move_uploaded_file($_FILES["file"]["tmp_name"],$path . $_FILES["file"]["name"]);
	echo "success";
//	echo "Stored in: " . $path ."/". $_FILES["file"]["name"];

	/*
	echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	echo "Type: " . $_FILES["file"]["type"] . "<br />";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	
	echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	*/
}
?>