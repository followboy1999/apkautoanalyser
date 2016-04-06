<?php 
class ApkInfo{
	private $aaptfile='';
	private $certfile='';
	
	public function SetAaptFilePath($filename){
		$this->aaptfile = dirname($filename) . "/aapt.txt";	
		$this->certfile = dirname($filename) . "/cert.txt"; 
	}
	public function GetSDKVersion(){
		$data = file_get_contents($this->aaptfile);
		preg_match('/sdkVersion:\'(.*?)\'/i', $data, $match);
		return $match;
	}
	public function GetPackName(){
		$data = file_get_contents($this->aaptfile);
		preg_match('/package: name=\'(.*?)\'/i', $data, $match);
		return $match;
	}
	public function GetVersionName(){
		$data = file_get_contents($this->aaptfile);
		preg_match('/versionName=\'(.*?)\'/i', $data, $match);
		return $match;
	}
	/*
	 * 
	 * */
	public function Aaptexcute($filename){
		$aapt_shell = "c:\windows\system32\cmd.exe /c " . TOOLPATH . "aapt.exe d badging " . $filename . ">" . $this->aaptfile;
		exec($aapt_shell,$out,$ret);
		if ($ret){
			return false;
		}
		return true;
	}
	public function Certexec($filename){
		$cert_shell = "c:\windows\system32\cmd.exe /c jarsigner.exe -verify -verbose -certs " . $filename . ">" . $this->certfile;
		exec($cert_shell,$out,$ret);
		if ($ret){
			return false;
		}
		return true;
	}
	public function GetCertInfo(){
		$data = file_get_contents($this->certfile);
		preg_match('/cn=(.*)/i', $data,$match);
		return $match;
	}
}
?>