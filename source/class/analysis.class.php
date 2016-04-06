<?php 
/*
 * analysis class
 * include static and dynamic analysis method
 * */
class Analysis{
	public function staticanalyse($filename){
		$risk_arr = array();
		$perm_arr = array();
		$ret_arr = array();
//		$decompile_cmd = "c:\windows\system32\cmd.exe /c java -jar " . TOOL_APK ." d -f " . $filename . " " . dirname($filename) . "/decompile";
		$androapkinfo = "c:\windows\system32\cmd.exe /c python " . ANDROGUARD . "androapkinfo.py -i " . $filename;
		$androrisk = "c:\windows\system32\cmd.exe /c python " . ANDROGUARD . "androrisk.py -m -i " . $filename;
		/*
		 * decompile
		 * */
//		exec($decompile_cmd,$out,$ret);
		exec($androrisk,$out,$ret);
		if($ret){
			return $ret_arr;
		}
		$risk_arr = array_slice($out, 1);
		
		exec($androapkinfo,$out,$ret);
		if ($ret){
			return $ret_arr;
		}
		foreach ($out as $key => $value){
			$val = trim($value);
			if (strstr($value,"PERMISSIONS:")!=''){
				$perm_start = $key;
				continue;
			}
			if (strstr($value,"MAIN ACTIVITY:")!=''){
				$perm_stop = $key;
				break;
			}	
			if (strstr($value,"dangerous")!=''){
				$rep = preg_replace('/dangerous/i', '<font color="red">dangerous</font>', $val);
				$out[$key] = $rep;
			}		
		}
		$perm_arr = array_slice($out, $perm_start,$perm_stop-$perm_start);
		$ret_arr = array_merge($risk_arr,$perm_arr);
		
		return $ret_arr;
		
	}
	public function dynamicanalyse($filename){
		
	}
}
?>