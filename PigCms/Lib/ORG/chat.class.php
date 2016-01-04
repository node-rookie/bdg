<?php
class chat
{	
	public $keyword;
	public $my;
	public function __construct($keyword)
	{
		$this->keyword=$keyword;
		$this->my=C('site_my');
	}
	public function index(){
		$name=$this->keyword;
		if (!(strpos($name,'你是') === FALSE)){
			return '咳咳，我是只能微信机器人';
		}
		if($name=="你叫什么"||$name=="你是谁"){
			return '咳咳，我是聪明与智慧并存的美女,人家刚交男朋友,你不可追我啦';
		}elseif($name=='糗事'){
			$name='笑话';
		}
		$str =file_get_contents('http://www.tuling123.com/openapi/api?key='.$this->ltkey.'&info='.urlencode($name));
     $arr = json_decode($str,true);
      return  $arr['text'];
	}
}
?>

