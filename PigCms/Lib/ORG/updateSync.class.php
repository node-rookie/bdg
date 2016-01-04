<?php

/**
* 升级同步处理
*/
class updateSync extends BackAction {
	static private $functionLibrary_url = 'http://up.dpigcms.cn/oa/admin.php?m=server&c=sys_file&a=funLib&domain=';
	static private $functions_url = 'http://up.dpigcms.cn/oa/admin.php?m=server&c=sys_file&a=funModules&domain=';
	static private $function_version_file = 'http://up.dpigcms.cn/oa/admin.php?m=server&c=sys_file&a=versionFiles&domain=';
	
	static private function _init() {
		if (C('server_topdomain') == 'weihubao.com') {
			$url = parse_url(C('site_url'));
			//self::$functionLibrary_url .= $url['host'];
			//self::$functions_url .= $url['host'];
			//self::$function_version_file .= $url['host'];
		} else {
			//self::$functionLibrary_url .= C('server_topdomain');
			//self::$functions_url .= C('server_topdomain');
			//self::$function_version_file .= C('server_topdomain'); 
		}
	}
	
	static private function sync_function_library() {
		$rt = self::curl_get_data(self::$functionLibrary_url);
		if($rt){
			$rt = explode(',', $rt);
			file_put_contents(RUNTIME_PATH.'function_library.php', "<?php \nreturn " . stripslashes(var_export($rt, true)) . ";", LOCK_EX);
		}

	}

	static private function sync_function_list() {
		//if(C('server_topdomain')!='pigcms.cn'){
         if(C('server_topdomain') != C('server_topdomain')){
			$rt = json_decode(self::curl_get_data(self::$functions_url),true);
			
			if($rt){
				
				$db_model = M('Function');
				$current_functions = $db_model->field('funname')->where("funname != ''")->select();
			

				foreach ($rt as $value) {
					if ($value['status']) {
						$funname_arr[] = $value['funname'];
					}
				}
				foreach ($current_functions as $v) {
					$current_funname_arr[] = $v['funname'];
				}
			

			
				// 多出的删除，不足的增加
	
				$less = array_diff($funname_arr, $current_funname_arr);
				foreach ($rt as $rk => $rv) {
					if ($rv['status'] == 1 && in_array($rv['funname'], $less)){
						//添加上 允许升级 并且 少于标准库 的功能
						unset($rt["$rk"]['id']);
						$db_model->add($rt["$rk"]);
	
					//}else if( $rv['status'] == 0){
						//删除不能升级的功能
				//		$delete_data = $rt["$rk"]['funname'];
				//		$db_model->where(array('funname'=>$delete_data))->delete();
					}
				}
			}
		}
	}
	
	static	private function sync_function_version_file() {
		//if(C('server_topdomain') != 'pigcms.cn'){
		if(C('server_topdomain') != C('server_topdomain')){
			$versionFile = (Array) json_decode(self::curl_get_data(self::$function_version_file), true);
			foreach ($versionFile as $file) {
				$filename = '.'.$file;				
				if (is_file($filename)) {
					$status = @unlink($filename) ? 'SUCCESS' : 'ERROR';
					//$log = date('Y-m-d H:i:s').' '.$filename.' - DELETE STATUS : '.$status."\n";
					//file_put_contents(RUNTIME_PATH.'Logs/version_file.log', $log, FILE_APPEND);
				}
			}
		}
	}

	//升级完成后回调函数
	public function finished_callback()	{
		if (!C('PIGCMS_STAFF')) {
			self::_init();
			//默认把Weixin功能分配给每个套餐
			self::group_functions_add_Weixin();
			self::sync_function_library();
			self::sync_function_list();
			self::sync_function_version_file();
		}

	}

	public function group_functions_add_Weixin() {
		$user_group = M('User_group')->field('id,func')->select();
		$flag = 0;
		if ($user_group) {
		
			foreach ($user_group as $value) {
				if(in_array('Weixin', explode(',', $value['func']))){
					$flag++;
					break;
				}

			}

			if ($flag == 0) {
				foreach ($user_group as $v) {
					M('User_group')->where(array('id'=>$v['id']))->setField('func',$v['func'].',Weixin');
				}
			}
		}

	}

	private function curl_get_data($url) {
		$ch = curl_init();
		$timeout = 10; // set to zero for no timeout
		curl_setopt ($ch, CURLOPT_URL,$url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$return = curl_exec($ch);
		curl_close($ch);
		return $return;
	}

}