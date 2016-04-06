<?php 
session_start();
$filename = $_SESSION["filename"];
$sha256 = $_SESSION["filename_sha256"];
//unset($_SESSION["filename_sha256"]);
//unset($_SESSION["filename"]);
$_SESSION = array();
/*
 * end session
 * */
session_destroy();

/*
 * init smarty
 * */
$smarty = InitSmarty();
/*
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
*/

/*
if (!isset($_SESSION["filename"])){
	$smarty->display('error.tpl');
	return;
}
*/


/*
 * Get File Attributions
 * */
$submittime = GetCurrentTime();
$filesize = GetFileSize($filename);


/*
 * Get APK information
 * */
$apkinfo = new ApkInfo;
$apkinfo->SetAaptFilePath($filename);
if (!$apkinfo->Aaptexcute($filename)){
	$smarty->display('error.tpl');
	return;
}
if (!$apkinfo->Certexec($filename)){
	$smarty->display('error.tpl');
	return ;
}
$packagename = $apkinfo->GetPackName();
if (empty($packagename)){
	$packagename[1] = '';
}
$sdkversion = $apkinfo->GetSDKVersion();
if (empty($sdkversion)){
	$sdkversion[1] = '';
}
$vername = $apkinfo->GetVersionName();
if (empty($vername)){
	$vername[1] = '';
}
$certinfo = $apkinfo->GetCertInfo();
if (empty($certinfo)){
	$certinfo[0] = '';
}
/*
 * static analysis
 * */
$analyse = new Analysis;
$ret = $analyse->staticanalyse($filename);
//if(!$ret){
if(empty($ret)){
	$smarty->display('error.tpl');
	return;
}
foreach ($ret as $key => $value){
//	$ret[$key] = trim($value);
	if (strstr($value,"PERMISSIONS:")!=''){
		$perm_st = $key;
		break;
	}
}
$risk_arr = array_slice($ret,1,3);
$perm_arr = array_slice($ret,$perm_st+1);
preg_match('/VALUE (\d*\.\d*)/i', $ret[5],$match);
if ((int)$match[1]<=60){
	$level = '<font color="#00EC00">Low</font>';
}
elseif ((int)$match[1]>=80){
	$level = '<font color="red">High</font>';
}
else {
	$level = '<font color="#FF5809">Medium</font>';
}

/*
 * dynamic analysis
 * */

/*
 * Display
 * */
$smarty->assign("Level",$level);
$smarty->assign("CertInfo",$certinfo[0]);
$smarty->assign("PackName",$packagename[1]);
$smarty->assign("VerionInfo",$vername[1]);
$smarty->assign("SdkVersion",$sdkversion[1]);
$smarty->assign("Risk",$risk_arr);
$smarty->assign("RiskValue",$ret[5]);
$smarty->assign("Perm",$perm_arr);
$smarty->assign("FileName",basename($filename));
$smarty->assign("SHA256",$sha256);
$smarty->assign("FileSize",$filesize);
$smarty->assign("FisrtTime",$submittime);
$smarty->assign("LastTime",$submittime);
$smarty->display('result.tpl');
?>