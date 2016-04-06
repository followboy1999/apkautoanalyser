<?php
/**
	DBConnect 
	@param 	$configFile		string	
	@return $db				object	
 */
function DBConnect($configFile=''){
	if(!file_exists($configFile)) $configFile=ROOT_PATH.'/config.php';
	require($configFile);
	require_once(ROOT_PATH.'/source/class/DB.class.php');
	$db=BlueDB::DB($config['dbType']);
	$db->Connect($config['dbHost'],$config['dbUser'],$config['dbPwd'],$config['database'],$config['charset'],$config['tbPrefix']);
	return $db;
}

function InitSmarty(){
	require_once(ROOT_PATH.'/libs/Smarty.class.php');
	$smarty=new Smarty;
	$smarty->template_dir = ROOT_PATH.'/source/templates/';
	$c_dir = ROOT_PATH."/source/templates_c/";
	if(!is_dir($c_dir)) @mkdir($c_dir);
	$smarty->compile_dir = $c_dir;
	return $smarty;
}


function IP(){
	return $_SERVER['REMOTE_ADDR'];
}

/* StripStr��*/
function StripStr($str){
	if(get_magic_quotes_gpc()) $str=stripslashes($str);
	return addslashes(htmlspecialchars($str,ENT_QUOTES));
}

/* http referer */
function HTTP_REFERER(){
	return htmlspecialchars($_SERVER['HTTP_REFERER']);
}

/**
	Val 
	@param 	$name		string			
	@param 	$method		string			(GET/POST/COOKIE/REQUEST)
	@param 	$type		string/int		('string'/0=>string,'int'/1=>int,/2=>
	@param 	$isArray	int				0=>
	@return $value		string/int	
*/
function Val($name,$method='GET',$type=0,$isArray=0){
	if($name=='' || !is_string($name)) return '';
	$method=strtoupper($method);
	switch($method){
		case 'GET':
			$value=$_GET[$name];
			break;
		case 'POST':
			$value=$_POST[$name];
			break;
		case 'COOKIE':
			$value=$_COOKIE[$name];
			break;
		case 'REQUEST':
			$value=$_REQUEST[$name];
			break;
		case 'SERVER':
			$value=$_SERVER[$name];
			break;
		default:break;
	}
	$isArray=intval($isArray);
	switch($type){
		case 0:
		case 'string':
			$value=($isArray==0) ? StripStr($value) : array_map('StripStr',(array)$value);
			break;
		case 1:
		case 'int':
			$value=($isArray==0) ? intval($value) : array_map('intval',(array)$value);
			break;
		case 2:
		default:break;
	}
	return $value;
}
/* json_enocde */
function JsonEncode($value){
	return json_encode($value);
}

function GetCurrentTime(){
	return date('Y-m-d H:i:s',time());
}

function GetFileSize($filename){
	return filesize($filename)/1000;
}
?>