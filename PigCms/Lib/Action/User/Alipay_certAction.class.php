<?php

class Alipay_certAction extends UserAction
{
	public $token;

	public function __initialize()
	{
		parent::_initialize();
		$this->canUseFunction('Alipay_cert');
		$this->token = session('token') ? session('token') : session('wp_token');
	}

	public function index()
	{
		$cert = M('wxcert')->where(array('token' => $this->token))->find();

		if (!empty($cert)) {
			$this->assign('cert', $cert);
		}

		$this->display();
	}

	public function localupload()
	{
		$upload = new UploadFile();
		$upload->allowExts = array('pem');
		$firstLetter = substr($this->token, 0, 1);
		$upload->savePath = './uploads/' . $firstLetter . '/' . $this->token . '/';
		if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads') || !is_dir($_SERVER['DOCUMENT_ROOT'] . '/uploads')) {
			mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads', 511);
		}

		$firstLetterDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $firstLetter;
		if (!file_exists($firstLetterDir) || !is_dir($firstLetterDir)) {
			mkdir($firstLetterDir, 511);
		}

		if (!file_exists($firstLetterDir . '/' . $this->token) || !is_dir($firstLetterDir . '/' . $this->token)) {
			mkdir($firstLetterDir . '/' . $this->token, 511);
		}

		if (!file_exists($upload->savePath) || !is_dir($upload->savePath)) {
			mkdir($upload->savePath, 511);
		}

		if (!$upload->upload()) {
			$error = 1;
			$msg = $upload->getErrorMsg();
			$this->error($msg);
			exit();
		}
		else {
			$error = 0;
			$info = $upload->getUploadFileInfo();
			$this->siteUrl = $this->siteUrl ? $this->siteUrl : C('site_url');
			$msg = $this->siteUrl . substr($upload->savePath, 1) . $info[0]['savename'];
			$this->addCert($info[0]['key'], $msg);
		}
	}

	public function addCert($type = 'apiclient_cert', $url = '')
	{
		$data = array();

		if (!in_array($type, array('apiclient_cert', 'apiclient_key', 'rootca'))) {
			$this->error('name出错');
			exit();
		}

		$data[$type] = $url;
		$data['uploadtime'] = time();
		$data['token'] = $this->token;
		$cert = M('wxcert')->where(array('token' => $this->token))->find();

		if (empty($cert)) {
			$insert = M('wxcert')->add($data);

			if ($insert) {
				$this->success('上传成功', U('Alipay_cert/index', array('token' => $this->token)));
				exit();
			}
			else {
				$this->error('上传失败');
				exit();
			}
		}
		else {
			$update = M('wxcert')->where(array('token' => $this->token))->save($data);

			if ($update) {
				$this->success('更新成功', U('Alipay_cert/index', array('token' => $this->token)));
				exit();
			}
			else {
				$this->error('更新失败');
				exit();
			}
		}
	}
}

?>
