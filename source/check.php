<?php
session_start();
$_SESSION["filename_sha256"]= $_GET['sha256'];
$_SESSION["filename"] = FILE_PATH . $_SESSION["filename_sha256"] . '/' . $_GET['filename'];

$dir = FILE_PATH . $_SESSION["filename_sha256"];

$res = array(
'file_exists'=>false,
'type_error' =>false, 
'last_analysis_url'=>"/appautoanalyse/index.php?do=result",
'remote_addr'=>IP(),
'last_analysis_date'=>'',
'upload_url'=>"/appautoanalyse/index.php?do=fileupload",
'reanalyse_url'=>"/appautoanalyse/index.php?do=analyse",
'empty_file'=>false,
'first_analysis_date'=>''
);

if (substr(strrchr($_GET['filename'], '.'), 1) != 'apk'){
	$res['type_error'] = true;
}
if (file_exists($dir)){
	$res['file_exists'] = true;
}

/*
 * query database for date
 * */

echo JsonEncode($res);

?>