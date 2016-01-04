<?php

class VoteimgAction extends WapAction
{
	public $token;
	public $action_id;
	public $voter;
	public $todaytime;
	public $now;
	public $action;

	public function _initialize()
	{
		parent::_initialize();
		
		$this->token = $this->_request('token', 'trim');
		$this->action_id = $this->_request('id', 'intval');
		$this->todaytime = strtotime(date('Y-m-d 00:00:00', time()));
		$this->now = time();
		$this->voter = M('voteimg_users')->where(array('vote_id' => $this->action_id, 'token' => $this->token, 'wecha_id' => $this->wecha_id))->find();
		$this->action = M('voteimg')->where(array('id' => $this->action_id, 'token' => $this->token, 'display' => 1))->find();
	}

	public function index()
	{
		if (empty($this->action_id) || empty($this->token)) {
			$this->error('非法操作');
			exit();
		}

		$this->notice($this->action_id, $this->token);
		$action_info = M('voteimg')->where(array('id' => $this->action_id, 'token' => $this->token, 'display' => 1))->find();

		if (!empty($action_info)) {
			$this->assign('action_info', $action_info);
		}
		else {
			$this->error('活动不存在');
			exit();
		}

		$this->add_users();
		$type = trim($this->_request('type'));
		$where_index = 'token = \'' . $this->token . '\' AND vote_id = ' . $this->action_id . ' AND check_pass = 1';
		if (($type == 'new') || ($type == '')) {
			$order = 'upload_time desc';
		}
		else {
			$order = 'upload_time asc';
		}

		$key_word = trim($this->_request('key_word'));

		if (!empty($key_word)) {
			C('TOKEN_ON', false);

			if (is_numeric($key_word)) {
				$where_index .= ' AND baby_id = ' . (int) $key_word;
			}
			else {
				$where_index .= ' AND vote_title like \'%' . $key_word . '%\'';
			}
		}

		$list = M('voteimg_item')->where($where_index)->order($order)->limit(0, 10)->select();

		foreach ($list as $key => $val) {
			if (strpos($val['vote_img'], ';') !== false) {
				$vote_img = explode(';', $val['vote_img']);
				$list[$key]['vote_img'] = end($vote_img);
			}
			else {
				$list[$key]['vote_img'] = $val['vote_img'];
			}

			if ((strpos($val['jump_url'], '{siteUrl}') !== false) || (strpos($val['jump_url'], '{wechat_id}') !== false)) {
				$list[$key]['jump_url'] = str_replace(array('{siteUrl}', '{wechat_id}'), array($this->siteUrl, $this->wecha_id), $val['jump_url']);
			}
			else {
				$list[$key]['jump_url'] = $val['jump_url'];
			}
		}

		$where = array('token' => $this->token, 'vote_id' => $this->action_id);
		$banner = M('voteimg_banner')->where($where)->order('banner_rank asc')->field('img_url,external_links')->select();
		$this->assign('banner', $banner);
		$stat = M('voteimg_stat')->where(array('token' => $this->token, 'vote_id' => $this->action_id))->find();

		if ($stat) {
			$name = explode(',', $stat['stat_name']);
			$this->assign('hide', $stat['hide']);
			$this->assign('name', $name);
		}

		$menu = M('voteimg_menus')->where(array('token' => $this->token, 'vote_id' => $this->action_id, 'type' => 2))->select();
		$custom_menu = M('voteimg_menus')->where(array('token' => $this->token, 'vote_id' => $this->action_id, 'hide' => 1, 'type' => 1))->select();

		foreach ($custom_menu as $key => $val) {
			if (!empty($val['menu_link'])) {
				$custom_menu[$key]['menu_link'] = str_replace(array('{siteUrl}', '{wechat_id}'), array(C('site_url'), $this->wecha_id), $val['menu_link']);
			}
		}

		$this->assign('menu', $menu);
		$this->assign('custom_menu', $custom_menu);
		$custom_bottom = M('voteimg_bottom')->where(array('token' => $this->token, 'vote_id' => $this->action_id, 'type' => 1, 'hide' => 1))->order('bottom_rank desc')->select();

		foreach ($custom_bottom as $key => $val) {
			if (!empty($val['bottom_link'])) {
				$custom_bottom[$key]['bottom_link'] = str_replace(array('{siteUrl}', '{wechat_id}'), array(C('site_url'), $this->wecha_id), $val['bottom_link']);
			}
		}

		$bottom = M('voteimg_bottom')->where(array('token' => $this->token, 'vote_id' => $this->action_id, 'type' => 2))->select();
		$bottom_hide = M('voteimg_bottom')->where(array('token' => $this->token, 'vote_id' => $this->action_id, 'type' => 2, 'hide' => 2))->count();
		$left_count = (4 - count($custom_bottom)) + $bottom_hide;

		if ($left_count == 3) {
			$bottom[3]['hide'] = 2;
		}
		else if ($left_count == 2) {
			$bottom[3]['hide'] = 2;
			$bottom[2]['hide'] = 2;
		}
		else if ($left_count == 1) {
			$bottom[3]['hide'] = 2;
			$bottom[2]['hide'] = 2;
			$bottom[1]['hide'] = 2;
		}

		$this->assign('bottom', $bottom);
		$this->assign('custom_bottom', $custom_bottom);
		$this->assign('alllist', $list);
		$this->assign('id', $this->action_id);
		$this->assign('token', $this->token);
		$this->assign('key_word', $key_word);
		$this->assign('type', $type);
		$this->assign('imgUrl', $action_info['reply_pic']);
		$this->display();
	}

	public function getList()
	{
		$num = $this->_get('num', 'intval');
		$id = $this->_get('id', 'intval');
		$token = $this->_get('token', 'trim');
		$key_word = $this->_get('key_word');
		$type = $this->_get('type', 'trim');
		if (($type == 'new') || ($type == '')) {
			$order = 'upload_time desc';
		}
		else {
			$order = 'upload_time asc';
		}

		$where = 'vote_id = ' . $id . ' AND token = \'' . $token . '\' AND check_pass = 1';

		if (!empty($key_word)) {
			if (is_numeric($key_word)) {
				$where .= ' AND baby_id = ' . $key_word;
			}
			else {
				$where .= ' AND vote_title like \'%' . $key_word . '%\'';
			}
		}

		$item = M('voteimg_item')->where($where)->order($order)->limit(10 + ((int) $num * 4), 4)->select();

		foreach ($item as $key => $val) {
			if (strpos($val['vote_img'], ';') !== false) {
				$vote_img = explode(';', $val['vote_img']);
				$item[$key]['vote_img'] = end($vote_img);
			}
			else {
				$item[$key]['vote_img'] = $val['vote_img'];
			}

			if ($val['jump_url'] != '') {
				if ((strpos($val['jump_url'], '{siteUrl}') !== false) || (strpos($val['jump_url'], '{wechat_id}') !== false)) {
					$item[$key]['jump_url'] = str_replace(array('{siteUrl}', '{wechat_id}'), array($this->siteUrl, $this->wecha_id), $val['jump_url']);
				}
				else {
					$item[$key]['jump_url'] = $val['jump_url'];
				}
			}
			else {
				$item[$key]['jump_url'] = U('Voteimg/popup_view', array('id' => $val['vote_id'], 'token' => $val['token'], 'item_id' => $val['id']));
			}
		}

		if ($item) {
			exit(json_encode(array('status' => 'SUCCESS', 'data' => $item)));
		}
		else {
			exit(json_encode(array('status' => 'FAIL', 'data' => $item)));
		}
	}

	public function vote()
	{
		$vote_id = $this->_get('vote_id', 'intval');
		$token = $this->_get('token', 'trim');
		$id = $this->_get('id', 'intval');

		if (!$this->notice($vote_id, $token)) {
			exit('请先关注、注册');
		}

		if (empty($this->wecha_id)) {
			exit('wecha_id获取失败');
		}

		$item_bytime = M('voteimg_users')->where('vote_id = ' . $vote_id . ' and token = \'' . $token . '\' and wecha_id = \'' . $this->wecha_id . '\' and vote_time < ' . $this->todaytime)->find();

		if ($item_bytime) {
			M('voteimg_users')->where('vote_id = ' . $vote_id . ' and token = \'' . $token . '\' and wecha_id = \'' . $this->wecha_id . '\' and vote_time < ' . $this->todaytime)->save(array('votenum_day' => 0, 'vote_time' => $this->todaytime));
		}

		$wecha_id = M('voteimg_item')->where(array('id' => $id, 'vote_id' => $vote_id, 'token' => $token, 'check_pass' => 1))->getField('wecha_id');
		if (!empty($wecha_id) && ($this->wecha_id == $wecha_id)) {
			exit('自己不能给自己投票');
		}

		$where = array('vote_id' => $vote_id, 'token' => $token, 'wecha_id' => $this->wecha_id);
		$vote_user = M('voteimg_users')->where($where)->find();
		$voteimg = M('voteimg')->where(array('id' => $vote_id, 'token' => $token))->find();

		if (time() < $voteimg['start_time']) {
			exit('投票活动还未开始');
		}

		if ($voteimg['end_time'] < time()) {
			exit('投票活动已经结束');
		}

		if ($voteimg['limit_vote_day'] <= $vote_user['votenum_day']) {
			exit('超过今日投票数限制');
		}

		if ($voteimg['limit_vote'] <= $vote_user['votenum']) {
			exit('超过总投票数限制');
		}

		$u = array();
		$u['item_id'] = trim($vote_user['item_id'] . ',' . $id, ',');
		$u['votenum'] = array('exp', 'votenum+1');
		$u['votenum_day'] = array('exp', 'votenum_day+1');
		$update_user = M('voteimg_users')->where($where)->save($u);
		$d = array();
		$d['vote_count'] = array('exp', 'vote_count+1');
		$update_item = M('voteimg_item')->where(array('vote_id' => $vote_id, 'token' => $token, 'id' => $id))->save($d);
		if ($update_user && $update_item) {
			exit('done');
		}
		else {
			exit('投票失败');
		}
	}

	public function add_users()
	{
		if ($this->wecha_id) {
			$data = array('vote_id' => (int) $this->action_id, 'item_id' => '', 'wecha_id' => $this->wecha_id, 'nick_name' => !empty($this->fans['wechaname']) ? $this->fans['wechaname'] : 'anonymous', 'votenum' => 0, 'votenum_day' => 0, 'vote_time' => time(), 'token' => $this->token);

			if (empty($this->voter)) {
				$user_id = M('voteimg_users')->add($data);
				$_SESSION['user_id'] = $user_id;
			}
		}
	}

	public function apply()
	{
		if (IS_POST) {
			if (empty($_POST['vote_id']) || empty($_POST['token'])) {
				$this->error('非法操作');
				exit();
			}

			if (!$this->notice($_POST['vote_id'], $_POST['token'])) {
				$this->error('请先关注、注册');
				exit();
			}

			if (empty($_POST['inputimg'])) {
				$this->error('请上传图片');
				exit();
			}

			if (5 < count($_POST['inputimg'])) {
				foreach ($_POST['inputimg'] as $img) {
					$this->del_upload($img);
				}

				$this->error('最多上传5张');
				exit();
			}

			$exist = M('voteimg_item')->where(array('vote_id' => $_POST['vote_id'], 'token' => $_POST['token'], 'wecha_id' => $this->wecha_id))->find();

			if ($exist) {
				foreach ($_POST['inputimg'] as $img) {
					$this->del_upload($img);
				}

				$this->error('已经报过名了,请勿重复报名');
				exit();
			}

			$data = array();
			$data['vote_title'] = $this->_post('vote_title', 'trim');
			$data['introduction'] = $this->_post('introduction', 'trim');
			$data['manifesto'] = $this->_post('manifesto', 'trim');
			$data['contact'] = $this->_post('contact');
			$data['vote_count'] = 0;
			$data['upload_time'] = $this->now;
			$data['check_pass'] = 0;
			$data['upload_type'] = 0;
			$data['token'] = $_POST['token'];
			$data['vote_id'] = $_POST['vote_id'];
			$data['baby_id'] = 0;
			$data['vote_img'] = trim(implode(';', $_POST['inputimg']), ';');
			$data['wecha_id'] = $this->wecha_id;
			$insert = M('voteimg_item')->add($data);

			if ($insert) {
				$this->success('申请报名成功,等待审核', U('Voteimg/index', array('id' => $_POST['vote_id'], 'token' => $_POST['token'])));
				exit();
			}
			else {
				$this->error('申请报名失败');
				exit();
			}
		}

		$voteimg = M('voteimg')->where(array('id' => $this->action_id, 'token' => $this->token))->find();
		$this->assign('voteimg', $voteimg);
		$this->assign('vote_id', $this->action_id);
		$this->assign('token', $this->token);
		$this->display();
	}

	public function popup_view()
	{
		$key_word = $this->_get('key_word');
		$vote_id = $this->_get('id');
		$token = $this->_get('token');
		if (empty($vote_id) || empty($token)) {
			$this->error('非法操作');
			exit();
		}

		$this->notice($vote_id, $token);
		$action_info = M('voteimg')->where(array('id' => $vote_id, 'token' => $token))->find();

		if (!empty($action_info)) {
			$this->assign('action_info', $action_info);
		}
		else {
			$this->error('活动不存在');
			exit();
		}

		$where = 'vote_id = ' . $vote_id . ' AND token = \'' . $token . '\' AND check_pass = 1';

		if (!empty($key_word)) {
			C('TOKEN_ON', false);

			if (is_numeric($key_word)) {
				$where .= ' AND baby_id = ' . (int) $key_word;
			}
			else {
				$where .= ' AND vote_title like \'%' . $key_word . '%\'';
			}
		}
		else {
			$item_id = $this->_get('item_id', 'intval');

			if (!$item_id) {
				exit('加载失败');
			}

			$where = 'id = ' . $item_id;
		}

		$item = M('voteimg_item')->where($where)->find();
		$vote_img = explode(';', $item['vote_img']);
		$this->assign('imgUrl', end($vote_img));
		$this->assign('vote_img', $vote_img);
		$this->assign('item', $item);
		$banner = M('voteimg_banner')->where(array('token' => $token, 'vote_id' => $vote_id))->order('banner_rank asc')->field('img_url,external_links')->select();
		$this->assign('banner', $banner);
		$stat = M('voteimg_stat')->where(array('token' => $token, 'vote_id' => $vote_id))->find();

		if ($stat) {
			$name = explode(',', $stat['stat_name']);
			$this->assign('hide', $stat['hide']);
			$this->assign('name', $name);
		}

		$menu = M('voteimg_menus')->where(array('token' => $token, 'vote_id' => $vote_id, 'type' => 2))->select();
		$custom_menu = M('voteimg_menus')->where(array('token' => $token, 'vote_id' => $vote_id, 'hide' => 1, 'type' => 1))->select();

		foreach ($custom_menu as $key => $val) {
			if (!empty($val['menu_link'])) {
				$custom_menu[$key]['menu_link'] = str_replace(array('{siteUrl}', '{wechat_id}'), array(C('site_url'), $this->wecha_id), $val['menu_link']);
			}
		}

		$this->assign('menu', $menu);
		$this->assign('custom_menu', $custom_menu);
		$custom_bottom = M('voteimg_bottom')->where(array('token' => $token, 'vote_id' => $vote_id, 'type' => 1, 'hide' => 1))->order('bottom_rank desc')->select();

		foreach ($custom_bottom as $key => $val) {
			if (!empty($val['bottom_link'])) {
				$custom_bottom[$key]['bottom_link'] = str_replace(array('{siteUrl}', '{wechat_id}'), array(C('site_url'), $this->wecha_id), $val['bottom_link']);
			}
		}

		$bottom = M('voteimg_bottom')->where(array('token' => $token, 'vote_id' => $vote_id, 'type' => 2))->select();
		$bottom_hide = M('voteimg_bottom')->where(array('token' => $token, 'vote_id' => $vote_id, 'type' => 2, 'hide' => 2))->count();
		$left_count = (4 - count($custom_bottom)) + $bottom_hide;

		if ($left_count == 3) {
			$bottom[3]['hide'] = 2;
		}
		else if ($left_count == 2) {
			$bottom[3]['hide'] = 2;
			$bottom[2]['hide'] = 2;
		}
		else if ($left_count == 1) {
			$bottom[3]['hide'] = 2;
			$bottom[2]['hide'] = 2;
			$bottom[1]['hide'] = 2;
		}

		$this->assign('bottom', $bottom);
		$this->assign('custom_bottom', $custom_bottom);
		$this->assign('item_id', $item['id']);
		$this->assign('token', $token);
		$this->assign('vote_id', $vote_id);
		$this->assign($this->action);
		$this->display();
	}

	public function share()
	{
		$item_id = $this->_get('item_id');
		$vote_id = $this->_get('id');
		$token = $this->_get('token');
		$this->notice($vote_id, $token);
		if (empty($item_id) || empty($vote_id) || empty($token)) {
			$this->error('非法操作');
			exit();
		}

		$this->add_users();
		$where = array('id' => $item_id, 'vote_id' => $vote_id, 'token' => $token);
		$item = M('voteimg_item')->where($where)->find();

		if (strpos($item['vote_img'], ';') !== false) {
			$vote_img = explode(';', $item['vote_img']);
			$item['vote_img'] = end($vote_img);
		}
		else {
			$item['vote_img'] = $item['vote_img'];
		}

		$this->assign('item', $item);
		$this->assign('token', $token);
		$this->assign('vote_id', $vote_id);
		$this->assign('item_id', $item_id);
		$this->display();
	}

	public function vote_record()
	{
		if (empty($this->action_id) || empty($this->token)) {
			$this->assign('vote_record', '');
		}

		$type = $this->_get('type', 'trim');

		if ($type == 'ranking') {
			$ranking = M('voteimg_item')->where(array('vote_id' => $this->action_id, 'token' => $this->token, 'check_pass' => 1))->order('vote_count desc')->select();

			if ($ranking) {
				$this->assign('vote_record', $ranking);
			}
			else {
				$this->assign('vote_record', '');
			}

			$this->display();
			return false;
		}

		$item_id = M('voteimg_users')->where(array('vote_id' => $this->action_id, 'token' => $this->token, 'wecha_id' => $this->wecha_id))->getField('item_id');

		if (!empty($item_id)) {
			$item_ids = explode(',', $item_id);
			$item_ids = array_unique($item_ids);
			$vote_record = array();

			foreach ($item_ids as $k => $id) {
				$record = M('voteimg_item')->where(array('id' => $id))->field('vote_title,vote_count')->find();
				$vote_record[$k]['vote_count'] = $record['vote_count'];
				$vote_record[$k]['vote_title'] = $record['vote_title'];
			}

			rsort($vote_record);
			$this->assign('vote_record', $vote_record);
		}
		else {
			$this->assign('vote_record', '');
		}

		$this->display();
	}

	public function stat_info()
	{
		if (empty($this->action_id) || empty($this->token)) {
			$return_json = json_encode(array('item_count' => 0, 'voted_count' => 0, 'visit_count' => 0));
		}

		$item_count = M('voteimg_item')->where(array('vote_id' => $this->action_id, 'token' => $this->token, 'check_pass' => 1))->count();
		$voted_count = M('voteimg_item')->where(array('vote_id' => $this->action_id, 'token' => $this->token))->sum('vote_count');
		$visit_count = M('voteimg_users')->where(array('vote_id' => $this->action_id, 'token' => $this->token))->count();
		$return_json = json_encode(array('item_count' => $item_count, 'voted_count' => $voted_count, 'visit_count' => $visit_count));
		exit($return_json);
	}

	public function localupload($token = '')
	{
		$upload = new UploadFile();
		$upload->allowExts = array('gif', 'jpg', 'jpeg', 'bmp', 'png');
		$upload->autoSub = 1;
		$firstLetter = substr($token, 0, 1);
		$upload->savePath = './uploads/' . $firstLetter . '/' . $token . '/';
		if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/uploads') || !is_dir($_SERVER['DOCUMENT_ROOT'] . '/uploads')) {
			mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads', 511);
		}

		$firstLetterDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $firstLetter;
		if (!file_exists($firstLetterDir) || !is_dir($firstLetterDir)) {
			mkdir($firstLetterDir, 511);
		}

		if (!file_exists($firstLetterDir . '/' . $token) || !is_dir($firstLetterDir . '/' . $token)) {
			mkdir($firstLetterDir . '/' . $token, 511);
		}

		if (!file_exists($upload->savePath) || !is_dir($upload->savePath)) {
			mkdir($upload->savePath, 511);
		}

		$upload->hashLevel = 2;

		if ($upload->upload()) {
			$info = $upload->getUploadFileInfo();
			$this->siteUrl = $this->siteUrl ? $this->siteUrl : C('site_url');
			$msg = $this->siteUrl . substr($upload->savePath, 1) . $info[0]['savename'];
			return array('status' => 'SUCCESS', 'img_url' => $msg);
		}
		else {
			$msg = $upload->getErrorMsg();
			return array('status' => 'FAIL', 'error_msg' => $msg);
		}
	}

	private function notice($action_id, $token)
	{
		$voteimg = M('voteimg')->where(array('id' => $action_id, 'token' => $token))->find();

		if (empty($voteimg)) {
			$this->error('非法操作');
			return false;
		}

		if (($voteimg['is_follow'] == 2) && !$this->isSubscribe()) {
			$this->memberNotice('必须先关注才能投票和报名', 1);
			return false;
		}
		else {
			if (($voteimg['is_register'] == 1) && empty($this->fans['tel'])) {
				$this->memberNotice('必须先注册才能投票和报名');
				return false;
			}
		}

		return true;
	}

	public function ajaxImgUpload()
	{
		$filename = trim($_POST['filename']);
		$img = $_POST[$filename];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$imgdata = base64_decode($img);
		$getupload_dir = '/uploads/voteimg/' . date('Ymd');
		$upload_dir = '.' . $getupload_dir;

		if (!is_dir($upload_dir)) {
			mkdir($upload_dir, 511, true);
		}

		$newfilename = 'voteimg_' . date('YmdHis') . '.jpg';
		$save = file_put_contents($upload_dir . '/' . $newfilename, $imgdata);

		if ($save) {
			$this->dexit(array(
	'error' => 0,
	'data'  => array('code' => 1, 'url' => $this->siteUrl . $getupload_dir . '/' . $newfilename, 'msg' => '')
	));
		}
		else {
			$this->dexit(array(
	'error' => 1,
	'data'  => array('code' => 0, 'url' => '', 'msg' => '保存失败！')
	));
		}
	}

	private function dexit($data = '')
	{
		if (is_array($data)) {
			echo json_encode($data);
		}
		else {
			echo $data;
		}

		exit();
	}

	private function del_upload($img_url = '')
	{
		$filename = str_replace(array('http://', $_SERVER['HTTP_HOST']), '', $img_url);
		$filename = getcwd() . $filename;
		if (!empty($filename) && file_exists($filename)) {
			unlink($filename);
		}

		return true;
	}
}

?>
