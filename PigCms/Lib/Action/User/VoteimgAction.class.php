<?php

class VoteimgAction extends UserAction
{
	public function _initialize()
	{
		parent::_initialize();
	
		$this->canUseFunction('Voteimg');
	}

	public function index()
	{
		$where = array('token' => session('token'));
		$total = M('voteimg')->where($where)->count();
		$Page = new Page($total, 10);
		$list = M('voteimg')->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('id desc')->select();
		$this->assign('list', $list);
		$this->assign('page', $Page->show());
		$this->assign('token', session('token'));
		$this->display();
	}

	public function add_voteimg()
	{
		if (IS_POST) {
			$action_data = array();
			$action_data['keyword'] = $this->_post('keyword', 'trim');
			$action_data['action_name'] = $this->_post('action_name', 'trim');
			$action_data['action_desc'] = $this->_post('action_desc', 'trim');
			$action_data['join_desc'] = $this->_post('join_desc', 'trim');
			$action_data['flow_desc'] = $this->_post('flow_desc', 'trim');
			$action_data['award_desc'] = $this->_post('award_desc', 'trim');
			$action_data['reply_title'] = $this->_post('reply_title', 'trim');
			$action_data['reply_content'] = $this->_post('reply_content', 'trim');
			$action_data['reply_pic'] = $this->_post('reply_pic', 'trim');
			$action_data['start_time'] = (int) strtotime($_POST['start_time']);
			$action_data['end_time'] = (int) strtotime($_POST['end_time']);
			$action_data['is_follow'] = (int) $_POST['is_follow'];
			$action_data['is_register'] = (int) $_POST['is_register'];
			$action_data['limit_vote'] = (int) $_POST['limit_vote'];
			$action_data['limit_vote_day'] = (int) $_POST['limit_vote_day'];
			$action_data['display'] = (int) $_POST['display'];
			$action_data['phone'] = $_POST['phone'];
			$action_data['token'] = session('token');
			if (isset($_POST['id']) && !empty($_POST['id'])) {
				unset($action_data['token']);
				$update_action = M('voteimg')->where(array('id' => $_POST['id'], 'token' => session('token')))->save($action_data);
				$this->handleKeyword($this->_post('id', 'intval'), 'Voteimg', $this->_post('keyword', 'trim'));

				if ($update_action !== false) {
					$this->success('修改成功', U('Voteimg/index'));
					exit();
				}
				else {
					$this->error('修改失败');
					exit();
				}
			}
			else {
				$vote_id = M('voteimg')->add($action_data);

				if ($vote_id) {
					$this->add_stat($vote_id);
					$this->add_menu($vote_id, array('start_time' => $action_data['start_time'], 'end_time' => $action_data['end_time']));
					$this->bottom_nav($vote_id);
					$this->handleKeyword($vote_id, 'Voteimg', $this->_post('keyword', 'trim'));
					$this->success('投票活动添加成功', U('Voteimg/index'));
					exit();
				}
				else {
					$this->error('投票活动添加失败');
					exit();
				}
			}
		}
		else {
			if (!empty($_GET['token'])) {
				$set = M('voteimg')->where(array('id' => $_GET['id'], 'token' => $_GET['token']))->find();
				$where = array('vote_id' => $_GET['id'], 'token' => $_GET['token'], 'check_pass' => 1, 'upload_type' => 1);
				$total = M('voteimg_item')->where($where)->count();
				$Page = new Page($total, 5);
				$vote_item = M('voteimg_item')->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();
				$this->assign('vo', $set);
				$this->assign('vote_item', $vote_item);
				$this->assign('page', $Page->show());
			}
			else {
				$this->error('非法操作');
			}

			$this->assign('token', $_GET['token']);
			$this->display();
		}
	}

	public function item_list()
	{
		$vote_id = $this->_get('vote_id', 'intval');
		$token = $this->_get('token', 'trim');
		if (empty($vote_id) || empty($token)) {
			$this->error('非法操作');
			exit();
		}

		$where = array('vote_id' => $vote_id, 'token' => $token, 'check_pass' => 1);
		$total = M('voteimg_item')->where($where)->count();
		$Page = new Page($total, 10);
		$list = M('voteimg_item')->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('id desc')->select();

		foreach ($list as $key => $val) {
			if (strpos($val['vote_img'], ';') !== false) {
				$vote_img = explode(';', $val['vote_img']);
				$list[$key]['vote_img'] = end($vote_img);
			}
			else {
				$list[$key]['vote_img'] = $val['vote_img'];
			}
		}

		$this->assign('list', $list);
		$this->assign('page', $Page->show());
		$this->assign('vote_id', $vote_id);
		$this->assign('token', $token);
		$this->display();
	}

	public function add_item()
	{
		if (IS_POST) {
			if (empty($_POST['vote_title'])) {
				$this->error('选项标题不能为空');
				exit();
			}

			if (15 < strlen($_POST['vote_title'])) {
				$this->error('选项标题不超过15个字母');
				exit();
			}

			if (empty($_POST['vote_img'])) {
				$this->error('图片地址不能为空');
				exit();
			}

			if (empty($_POST['introduction'])) {
				$this->error('自我介绍不能为空');
				exit();
			}

			if (empty($_POST['manifesto'])) {
				$this->error('拉票宣言不能为空');
				exit();
			}

			$vote_id = $this->_post('vote_id', 'intval');
			$token = $this->_POST('token', 'trim');
			$baby_id = M('voteimg_item')->where(array('vote_id' => $vote_id, 'token' => $token, 'check_pass' => 1))->max('baby_id');
			$img_data = array();
			$img_data['vote_id'] = $vote_id;
			$img_data['upload_time'] = time();
			$img_data['token'] = $token;
			$img_data['check_pass'] = 1;
			$img_data['upload_type'] = 1;
			$img_data['vote_title'] = trim($_POST['vote_title']);
			$img_data['introduction'] = trim(filter_var($_POST['introduction'], FILTER_SANITIZE_STRING));
			$img_data['manifesto'] = trim($_POST['manifesto']);
			$img_data['vote_count'] = (int) $_POST['vote_count'];
			$img_data['vote_img'] = trim($_POST['vote_img']);
			$img_data['jump_url'] = trim($_POST['jump_url']);
			$img_data['contact'] = trim($_POST['contact']);
			$img_data['baby_id'] = $baby_id + 1;
			$result = M('voteimg_item')->add($img_data);

			if ($result) {
				$this->success('投票选项添加成功', U('Voteimg/item_list', array('vote_id' => $vote_id, 'token' => $token)));
				exit();
			}
			else {
				$this->error('投票选项添加失败');
				exit();
			}
		}

		$vote_id = $this->_get('vote_id', 'intval');
		$token = $this->_get('token', 'trim');
		$this->assign('vote_id', $vote_id);
		$this->assign('token', $token);
		$this->display();
	}

	public function edit_item()
	{
		if (IS_POST) {
			if (empty($_POST['id'])) {
				$this->error('非法操作');
				exit();
			}

			if (empty($_POST['vote_title'])) {
				$this->error('选项标题不能为空');
				exit();
			}

			if (15 < strlen($_POST['vote_title'])) {
				$this->error('选项标题不超过15个字母');
				exit();
			}

			if (empty($_POST['vote_img'])) {
				$this->error('图片地址不能为空');
				exit();
			}

			if (empty($_POST['introduction'])) {
				$this->error('自我介绍不能为空');
				exit();
			}

			if (empty($_POST['manifesto'])) {
				$this->error('拉票宣言不能为空');
				exit();
			}

			$vote_img = array_reverse($_POST['vote_img']);
			$vote_img = implode(';', $vote_img);
			$img_data = array();
			$img_data['vote_title'] = trim($_POST['vote_title']);
			$img_data['introduction'] = trim(filter_var($_POST['introduction'], FILTER_SANITIZE_STRING));
			$img_data['vote_img'] = $vote_img;
			$img_data['jump_url'] = trim($_POST['jump_url']);
			$img_data['manifesto'] = trim($_POST['manifesto']);
			$img_data['vote_count'] = (int) $_POST['vote_count'];
			$img_data['contact'] = $_POST['contact'];
			$img_data['upload_time'] = time();
			$update = M('voteimg_item')->where(array('id' => (int) $_POST['id']))->save($img_data);

			if ($update) {
				$this->success('投票选项修改成功', U('Voteimg/item_list', array('vote_id' => $_POST['vote_id'], 'token' => $_POST['token'])));
				exit();
			}
			else {
				$this->error('投票选项修改失败');
				exit();
			}
		}
		else {
			$id = $this->_get('id', 'intval');
			$token = $this->_get('token', 'trim');
			$item = M('voteimg_item')->where(array('id' => $id, 'token' => $token))->find();
			$vote_img = explode(';', $item['vote_img']);
			$vote_img = array_reverse($vote_img);

			if (empty($item)) {
				$this->error('未找到要修改的选项');
				exit();
			}
			else {
				$this->assign('vote_imgs', $vote_img);
				$this->assign('set', $item);
				$this->assign('id', $id);
				$this->assign('token', $token);
			}

			$this->display();
		}
	}

	public function del_item()
	{
		$id = $this->_get('id', 'intval');
		$voteimg_item = M('voteimg_item')->where(array('id' => $id))->find();

		if ($voteimg_item) {
			M('voteimg_item')->where(array('id' => $id))->delete();
			$this->success('删除成功', U('Voteimg/item_list', array('token' => $voteimg_item['token'], 'vote_id' => $voteimg_item['vote_id'])));
			exit();
		}
		else {
			$this->error('非法操作');
			exit();
		}
	}

	public function action_del()
	{
		$id = $this->_get('id', 'intval');
		$token = $this->_get('token', 'trim');
		$where = array('id' => $id, 'token' => $token);
		$voteimg = M('voteimg')->where($where)->find();

		if ($voteimg) {
			M('voteimg')->where(array('id' => $id))->delete();
			$this->success('删除成功', U('Voteimg/index', array('token' => $token)));
			exit();
		}
		else {
			$this->error('非法操作');
			exit();
		}
	}

	public function clear_votelog()
	{
		$id = (int) $this->_get('id');
		$vote_id = (int) $this->_get('vote_id');
		$token = $this->_get('token', 'trim');
		$where = array('user_id' => $id, 'vote_id' => $vote_id, 'token' => $token);
		$voteimg_users = M('voteimg_users')->where($where)->find();

		if (!empty($voteimg_users['item_id'])) {
			M('voteimg_users')->where($where)->save(array('item_id' => ''));
			$this->success('删除成功', U('Voteimg/vote_log', array('vote_id' => $vote_id, 'token' => $token, 'type' => 'voter')));
			exit();
		}
		else {
			$this->error('非法操作');
			exit();
		}
	}

	public function clear_votecount()
	{
		$id = (int) $this->_get('id');
		$vote_id = (int) $this->_get('vote_id');
		$token = $this->_get('token', 'trim');
		$where = array('id' => $id, 'vote_id' => $vote_id, 'token' => $token);
		$voteimg_item = M('voteimg_item')->where($where)->find();

		if (!empty($voteimg_item)) {
			M('voteimg_item')->where($where)->save(array('vote_count' => 0));
			$this->success('清空成功', U('Voteimg/vote_log', array('vote_id' => $vote_id, 'token' => $token, 'type' => 'baobao')));
			exit();
		}
		else {
			$this->error('非法操作');
			exit();
		}
	}

	public function vote_log()
	{
		$vote_id = $this->_get('vote_id', 'intval');
		$token = $this->_get('token', 'trim');
		$type = $this->_get('type', 'trim');
		if (empty($vote_id) && empty($token)) {
			$this->error('非法操作');
			exit();
		}

		if (($type == 'voter') || ($type == '')) {
			$where = array('vote_id' => $vote_id, 'token' => $token);
			$total = M('voteimg_users')->where($where)->count();
			$page = new Page($total, 10);
			$sql = 'select u.user_id,u.vote_id,u.token,u.item_id,u.nick_name,u.votenum,u.votenum_day,u.vote_time,v.action_name from ' . C('DB_PREFIX') . 'voteimg_users as u,' . C('DB_PREFIX') . 'voteimg as v where u.token = \'' . $token . '\' AND u.vote_id = ' . $vote_id . ' AND v.id = u.vote_id AND u.item_id != \'\' order by vote_time desc limit ' . $page->firstRow . ',' . $page->listRows;
			$vote_logs = M('voteimg_users')->query($sql);
			$this->assign('page', $page->show());
		}
		else if ($type == 'baobao') {
			C('TOKEN_ON', false);
			$key_word = $this->_get('key_word');
			$where = array('vote_id' => $vote_id, 'token' => $token);

			if (!empty($key_word)) {
				if (is_numeric($key_word)) {
					$where['baby_id'] = (int) $key_word;
				}
				else {
					$where['vote_title'] = array('like', '%' . $key_word . '%');
				}

				$this->assign('key_word', $key_word);
			}

			$total = M('voteimg_item')->where($where)->count();
			$page = new Page($total, 10);
			$vote_logs = M('voteimg_item')->where($where)->order('vote_count desc')->limit($page->firstRow . ',' . $page->listRows)->select();

			foreach ($vote_logs as $key => $val) {
				$vote_img = explode(';', $val['vote_img']);
				$vote_logs[$key]['vote_img'] = end($vote_img);
			}

			$this->assign('page', $page->show());
		}

		$this->assign('vote_id', $vote_id);
		$this->assign('token', $token);
		$this->assign('type', $type);
		$this->assign('vote_logs', $vote_logs);
		$this->display();
	}

	public function banner_manage()
	{
		if (IS_POST && !empty($_POST['vote_id']) && !empty($_POST['token'])) {
			$post = array();
			$status = true;
			$banner_db = M('voteimg_banner');

			foreach ((array) $_POST['add']['id'] as $key => $val) {
				if ($_POST['add']['img_url'][$key] != '') {
					$post[$key]['img_url'] = $_POST['add']['img_url'][$key];
					$post[$key]['external_links'] = $_POST['add']['external_links'][$key];
					$post[$key]['banner_rank'] = (int) $_POST['add']['banner_rank'][$key];

					if ($val == 0) {
						$post[$key]['vote_id'] = $_POST['vote_id'];
						$post[$key]['token'] = $_POST['token'];
						$add = $banner_db->add($post[$key]);

						if (!$add) {
							$status = false;
						}
					}
					else {
						$update = $banner_db->where(array('id' => $val))->save($post[$key]);
					}
				}
			}

			if ($status) {
				$this->success('上传成功', U('Voteimg/banner_manage', array('vote_id' => $_POST['vote_id'], 'token' => $_POST['token'])));
				exit();
			}
			else {
				$this->error('上传失败');
				exit();
			}
		}

		if ($_GET['vote_id'] && $_GET['token']) {
			$banner_list = M('voteimg_banner')->where(array('vote_id' => $_GET['vote_id'], 'token' => $_GET['token']))->select();
			$this->assign('banner_list', $banner_list);
		}

		$this->assign('token', $_GET['token']);
		$this->assign('vote_id', $_GET['vote_id']);
		$this->display();
	}

	public function del_banner()
	{
		$banner_id = $this->_get('id', 'intval');
		$vote_id = $this->_get('vote_id', 'intval');
		$token = $this->_get('token', 'trim');

		if (!$banner_id) {
			$this->error('菜单id不能为空');
		}

		$exists = M('voteimg_banner')->where(array('id' => $banner_id))->find();

		if (empty($exists)) {
			$this->error('删除的banner未找到');
		}

		$del = M('voteimg_banner')->where(array('id' => $banner_id))->delete();

		if ($del) {
			$this->success('删除成功', U('Voteimg/banner_manage', array('token' => $token, 'vote_id' => $vote_id)));
			exit();
		}
		else {
			$this->error('删除失败');
			exit();
		}
	}

	public function stat_list()
	{
		if (IS_POST) {
			$data = array();
			$data['stat_name'] = implode(',', $_POST['stat_name']);
			$data['hide'] = $this->_post('stat_hide', 'intval');
			$update = M('voteimg_stat')->where(array('vote_id' => $_POST['vote_id'], 'token' => $_POST['token']))->save($data);

			if ($update) {
				$this->success('修改成功', U('Voteimg/stat_list', array('vote_id' => $_POST['vote_id'], 'token' => $_POST['token'])));
				exit();
			}
			else {
				$this->error('修改失败');
				exit();
			}
		}

		$vote_id = $this->_get('vote_id', 'intval');
		$token = $this->_get('token', 'trim');
		if (!$vote_id && !$token) {
			$this->error('非法操作');
			exit();
		}

		$info = M('voteimg_stat')->where(array('vote_id' => $vote_id, 'token' => $token))->field('stat_name,hide')->find();
		$split = explode(',', $info['stat_name']);
		$this->assign('stat_name', $split);
		$this->assign('hide', $info['hide']);
		$this->assign('token', $_GET['token']);
		$this->assign('vote_id', $_GET['vote_id']);
		$this->assign('list', $list);
		$this->display();
	}

	public function stat_manage()
	{
		if (IS_POST) {
			$data = array();
			$data['stat_name'] = $this->_post('stat_name', 'trim');
			$data['stat_rank'] = $this->_post('stat_rank', 'intval');
			$data['hide'] = $this->_post('hide', 'intval');
			if ($_POST['id'] && $_POST['token']) {
				$exists = M('voteimg_stat')->where(array('id' => $_POST['id'], 'token' => $_POST['token']))->find();

				if (!empty($exists)) {
					$update = M('voteimg_stat')->where(array('id' => $_POST['id'], 'token' => $_POST['token']))->save($data);

					if ($update) {
						$this->success('修改成功', U('Voteimg/stat_list', array('vote_id' => $exists['vote_id'], 'token' => $_POST['token'])));
						exit();
					}
					else {
						$this->error('修改失败');
						exit();
					}
				}
			}
		}

		if ($_GET['id'] && $_GET['token']) {
			$stat = M('voteimg_stat')->where(array('id' => (int) $_GET['id'], 'token' => $_GET['token']))->find();

			if ($stat) {
				$this->assign('stat', $stat);
			}
		}

		$this->assign('token', $_GET['token']);
		$this->assign('vote_id', $_GET['vote_id']);
		$this->assign('id', $_GET['id']);
		$this->display();
	}

	public function menu_list()
	{
		$vote_id = $this->_get('vote_id', 'intval');
		$token = $this->_get('token', 'trim');
		if (!$vote_id && !$token) {
			$this->error('非法操作');
			exit();
		}

		$list = M('voteimg_menus')->where(array('vote_id' => $vote_id, 'token' => $token))->select();
		$this->assign('list', $list);
		$this->assign('token', $_GET['token']);
		$this->assign('vote_id', $_GET['vote_id']);
		$this->display();
	}

	public function menu_add()
	{
		if (IS_POST) {
			$data = array();
			$data['menu_name'] = $this->_post('menu_name', 'trim');
			$data['menu_icon'] = $this->_post('menu_icon', 'trim');
			$data['menu_link'] = $this->_post('menu_link', 'trim');
			$data['hide'] = $this->_post('hide', 'intval');
			$data['vote_id'] = $this->_post('vote_id', 'intval');
			$data['token'] = $this->_post('token', 'trim');

			if (empty($_POST['id'])) {
				$num = M('voteimg_menus')->where(array('vote_id' => $data['vote_id'], 'token' => $data['token'], 'type' => 1))->count();

				if ($num == 4) {
					$this->error('最多添加4个自定义菜单');
					exit();
				}

				$data['type'] = 1;
				$insert = M('voteimg_menus')->add($data);

				if ($insert) {
					$this->success('添加成功', U('Voteimg/menu_list', array('vote_id' => $data['vote_id'], 'token' => $data['token'])));
					exit();
				}
				else {
					$this->error('添加失败');
					exit();
				}
			}
			else {
				$where = array('id' => (int) $_POST['id']);
				$update = M('voteimg_menus')->where($where)->save($data);

				if ($update) {
					$this->success('修改成功', U('Voteimg/menu_list', array('vote_id' => $data['vote_id'], 'token' => $data['token'])));
					exit();
				}
				else {
					$this->error('修改失败');
					exit();
				}
			}
		}
		else if (!empty($_GET['id'])) {
			$menu = M('voteimg_menus')->where(array('id' => (int) $_GET['id']))->find();
			$this->assign('set', $menu);
		}

		$this->assign('token', $_GET['token']);
		$this->assign('vote_id', $_GET['vote_id']);
		$this->display();
	}

	public function menu_del()
	{
		$menu_id = $this->_get('menu_id', 'intval');

		if (!$menu_id) {
			$this->error('菜单id不能为空');
		}

		$exists = M('voteimg_menus')->where(array('id' => $menu_id))->find();

		if (empty($exists)) {
			$this->error('删除的菜单未找到');
		}

		if ($exists['type'] == 2) {
			$this->error('内置菜单不可以删除');
		}

		$del = M('voteimg_menus')->where(array('id' => $menu_id))->delete();

		if ($del) {
			$this->success('删除成功');
			exit();
		}
		else {
			$this->error('删除失败');
			exit();
		}
	}

	public function bottom_list()
	{
		$vote_id = $this->_get('vote_id', 'intval');
		$token = $this->_get('token', 'trim');
		if (!$vote_id && !$token) {
			$this->error('非法操作');
			exit();
		}

		$list = M('voteimg_bottom')->where(array('vote_id' => $vote_id, 'token' => $token))->select();
		$this->assign('list', $list);
		$this->assign('token', $_GET['token']);
		$this->assign('vote_id', $_GET['vote_id']);
		$this->display();
	}

	public function bottom_add()
	{
		if (IS_POST) {
			$data = array();
			$data['bottom_name'] = $this->_post('bottom_name', 'trim');
			$data['bottom_link'] = $this->_post('bottom_link', 'trim');
			$data['bottom_icon'] = $this->_post('bottom_icon', 'trim');
			$data['bottom_rank'] = $this->_post('bottom_rank', 'intval');
			$data['hide'] = $this->_post('hide', 'intval');
			$data['vote_id'] = $this->_post('vote_id', 'intval');
			$data['token'] = $this->_post('token', 'trim');

			if (empty($_POST['id'])) {
				$num = M('voteimg_bottom')->where(array('vote_id' => $data['vote_id'], 'token' => $data['token'], 'type' => 1))->count();

				if ($num == 4) {
					$this->error('最多添加4个自定义导航');
					exit();
				}

				$insert = M('voteimg_bottom')->add($data);

				if ($insert) {
					$this->success('添加成功', U('Voteimg/bottom_list', array('vote_id' => $data['vote_id'], 'token' => $data['token'])));
					exit();
				}
				else {
					$this->error('添加失败');
					exit();
				}
			}
			else {
				$where = array('id' => (int) $_POST['id']);
				$update = M('voteimg_bottom')->where($where)->save($data);

				if ($update) {
					$this->success('修改成功', U('Voteimg/bottom_list', array('vote_id' => $data['vote_id'], 'token' => $data['token'])));
					exit();
				}
				else {
					$this->error('修改失败');
					exit();
				}
			}
		}
		else if ($_GET['id']) {
			$bottom = M('voteimg_bottom')->where(array('id' => $_GET['id']))->find();
			$this->assign('set', $bottom);
		}

		$this->assign('token', $_GET['token']);
		$this->assign('vote_id', $_GET['vote_id']);
		$this->display();
	}

	public function bottom_del()
	{
		$bottom_id = $this->_get('bottom_id', 'intval');

		if (!$bottom_id) {
			$this->error('导航id不能为空');
		}

		$exists = M('voteimg_bottom')->where(array('id' => $bottom_id))->find();

		if (empty($exists)) {
			$this->error('删除的底部导航未找到');
		}

		if ($exists['type'] == 2) {
			$this->error('内置导航不可以删除');
		}

		$del = M('voteimg_bottom')->where(array('id' => $bottom_id))->delete();

		if ($del) {
			$this->success('删除成功');
			exit();
		}
		else {
			$this->error('删除失败');
			exit();
		}
	}

	public function apply_list()
	{
		$where = array('vote_id' => $_GET['vote_id'], 'token' => $_GET['token'], 'upload_type' => 0);
		$total = M('voteimg_item')->where($where)->count();
		$Page = new Page($total, 10);
		$list = M('voteimg_item')->where($where)->order('upload_time desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();

		foreach ($list as $key => $val) {
			$vote_img = explode(';', $val['vote_img']);
			$list[$key]['vote_img'] = end($vote_img);
		}

		$this->assign('list', $list);
		$this->assign('page', $Page->show());
		$this->assign('token', $_GET['token']);
		$this->assign('vote_id', $_GET['vote_id']);
		$this->display();
	}

	public function apply_check()
	{
		if (!empty($_GET['item_id']) || !empty($_GET['vote_id']) || !empty($_GET['token'])) {
			$item = M('voteimg_item')->where(array('id' => $_GET['item_id']))->find();

			if (empty($item)) {
				$this->error('投票选项不存在');
				exit();
			}

			$data = array();
			$msg = '';

			if ($item['check_pass'] == 1) {
				$data['baby_id'] = 0;
				$data['check_pass'] = 0;
				$msg = '不通过审核';
			}
			else if ($item['check_pass'] == 0) {
				$max_babyid = M('voteimg_item')->where(array('vote_id' => $_GET['vote_id'], 'token' => $_GET['token'], 'check_pass' => 1))->max('baby_id');
				$data['check_pass'] = 1;
				$data['baby_id'] = $max_babyid + 1;
				$msg = '通过审核';
			}

			$update = M('voteimg_item')->where(array('id' => $_GET['item_id']))->save($data);

			if ($update) {
				$this->success($msg, U('Voteimg/apply_list', array('vote_id' => $_GET['vote_id'], 'token' => $_GET['token'])));
				exit();
			}
			else {
				$this->error('审核失败');
				exit();
			}
		}
		else {
			$this->error('非法操作');
			exit();
		}
	}

	public function apply_del()
	{
		if (!empty($_GET['item_id']) || !empty($_GET['vote_id']) || !empty($_GET['token'])) {
			$where = array('id' => $_GET['item_id']);
			$exists = M('voteimg_item')->where($where)->find();

			if ($exists) {
				$dalete = M('voteimg_item')->where($where)->limit(1)->delete();

				if ($dalete) {
					$this->success('删除成功', U('Voteimg/apply_list', array('vote_id' => $_GET['vote_id'], 'token' => $_GET['token'])));
					exit();
				}
				else {
					$this->error('删除失败');
					exit();
				}
			}
			else {
				$this->error('删除失败');
				exit();
			}
		}
		else {
			$this->error('非法操作');
			exit();
		}
	}

	public function add_stat($vote_id = 1)
	{
		if (!$vote_id) {
			return false;
		}

		$exists = M('voteimg_stat')->where(array('vote_id' => $vote_id, 'token' => session('token')))->find();

		if ($exists) {
			return false;
		}

		$stat_data = array();
		$add = array('参与选手', '累计投票', '访问量');
		$stat_data['vote_id'] = $vote_id;
		$stat_data['token'] = session('token');
		$stat_data['stat_name'] = implode(',', $add);
		$stat_data['hide'] = 1;
		$stat_data['stat_rank'] = 0;
		$insert = M('voteimg_stat')->add($stat_data);

		if ($insert) {
			return true;
		}

		return false;
	}

	public function add_menu($vote_id = 1, $action_data = '')
	{
		if (!$vote_id) {
			return false;
		}

		$exists = M('voteimg_menus')->where(array('vote_id' => $vote_id, 'token' => session('token')))->find();

		if ($exists) {
			return false;
		}

		$static_img = '/tpl/static/voteimg/img/';
		$menu_data = array(
			array('vote_id' => $vote_id, 'token' => session('token'), 'menu_name' => '萌娃评选', 'menu_icon' => $static_img . 'tubiao_01.png', 'menu_link' => '', 'hide' => 1, 'type' => 2),
			array('vote_id' => $vote_id, 'token' => session('token'), 'menu_name' => '活动日期', 'menu_icon' => $static_img . 'tubiao_02.png', 'menu_link' => '', 'hide' => 1, 'type' => 2),
			array('vote_id' => $vote_id, 'token' => session('token'), 'menu_name' => '活动介绍', 'menu_icon' => $static_img . 'tubiao_03.png', 'menu_link' => '', 'hide' => 1, 'type' => 2),
			array('vote_id' => $vote_id, 'token' => session('token'), 'menu_name' => '我的投票记录', 'menu_icon' => $static_img . 'tubiao_04.png', 'menu_link' => '', 'hide' => 1, 'type' => 2),
			array('vote_id' => $vote_id, 'token' => session('token'), 'menu_name' => '我要报名', 'menu_icon' => $static_img . 'tubiao_05.png', 'menu_link' => '', 'hide' => 1, 'type' => 2)
			);
		$insert = M('voteimg_menus')->addAll($menu_data);

		if ($insert) {
			return true;
		}

		return false;
	}

	public function bottom_nav($vote_id = 1)
	{
		if (!$vote_id) {
			return false;
		}

		$exists = M('voteimg_bottom')->where(array('vote_id' => $vote_id, 'token' => session('token')))->find();

		if ($exists) {
			return false;
		}

		$base_url = '/tpl/static/voteimg/img/';
		$bottom_data = array(
			array('vote_id' => $vote_id, 'token' => session('token'), 'bottom_name' => '电话', 'model' => '', 'action' => '', 'bottom_icon' => $base_url . 'daohang_01.png', 'hide' => 1, 'bottom_rank' => 0, 'type' => 2),
			array('vote_id' => $vote_id, 'token' => session('token'), 'bottom_name' => '搜索', 'model' => '', 'action' => '', 'bottom_icon' => $base_url . 'daohang_02.png', 'bottom_rank' => 1, 'hide' => 1, 'type' => 2),
			array('vote_id' => $vote_id, 'token' => session('token'), 'bottom_name' => '排行', 'model' => '', 'action' => '', 'bottom_icon' => $base_url . 'daohang_03.png', 'hide' => 1, 'bottom_rank' => 2, 'type' => 2),
			array('vote_id' => $vote_id, 'token' => session('token'), 'bottom_name' => '拉票', 'model' => '', 'action' => '', 'bottom_icon' => $base_url . 'daohang_04.png', 'hide' => 1, 'bottom_rank' => 3, 'type' => 2)
			);
		$insert = M('voteimg_bottom')->addAll($bottom_data);

		if ($insert) {
			return true;
		}

		return false;
	}
}

?>
