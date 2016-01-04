<?php

class JiugongAction extends LotteryBaseAction
{
	public function index()
	{
		$agent = $_SERVER['HTTP_USER_AGENT'];

		if (!strpos($agent, 'icroMessenger')) {
		}

		$token = $this->_get('token');
		$wecha_id = $this->wecha_id;
		$id = $this->_get('id');

		if ($id == '') {
			$this->error('不存在的活动');
		}

		$redata = M('Lottery_record');
		$where = array('token' => $token, 'wecha_id' => $wecha_id, 'lid' => $id);
		$record = $redata->where(array('token' => $token, 'wecha_id' => $wecha_id, 'lid' => $id, 'islottery' => 1))->find();

		if (!$record) {
			$record = $redata->where($where)->order('id DESC')->find();
		}

		$Lottery = M('Lottery')->where(array('id' => $id, 'token' => $token, 'type' => 10, 'status' => 1))->find();

		if (!$Lottery) {
			$this->error('不存在的活动!');
		}

		if (($Lottery['guanzhu'] == 1) && ($this->isSubscribe() == false)) {
			$this->memberNotice('', 1);
		}
		else {
			if (($Lottery['needreg'] == 1) && ($this->fans['tel'] == '')) {
				$this->memberNotice();
			}
		}

		$Lottery['renametel'] = $Lottery['renametel'] ? $Lottery['renametel'] : '手机号';
		$Lottery['renamesn'] = $Lottery['renamesn'] ? $Lottery['renamesn'] : 'SN码';
		$data = $Lottery;

		if ($Lottery['enddate'] < time()) {
			$data['end'] = 1;
			$data['endinfo'] = $Lottery['endinfo'];
			$this->assign('Dazpan', $data);
			$this->display();
			exit();
		}

		if ($record['islottery'] == 1) {
			$data['end'] = 5;
			$data['sn'] = $record['sn'];
			$data['uname'] = $record['wecha_name'];
			$data['prize'] = $record['prize'];
			$data['tel'] = $record['phone'];
		}

		$data['On'] = 1;
		$data['token'] = $token;
		$data['wecha_id'] = $wecha_id;
		$data['lid'] = $Lottery['id'];
		$data['rid'] = intval($record['id']);
		$data['usenums'] = $record['usenums'];
		$data['info'] = str_replace('&lt;br&gt;', '<br>', $data['info']);
		$data['endinfo'] = str_replace('&lt;br&gt;', '<br>', $data['endinfo']);
		$this->assign('Dazpan', $data);
		$record['id'] = intval($record['id']);
		$this->assign('record', $record);
		$where_list = array('token' => $token, 'lid' => $id);
		$record_list = $redata->where($where_list)->select();
		$this->assign('record_list', $record_list);
		$this->display();
	}

	public function getajax()
	{
		$token = $this->_get('token');
		$wecha_id = $this->_get('oneid');
		$id = $this->_get('id');
		$rid = $this->_get('rid');
		$Lottery = M('Lottery')->where(array('id' => $id))->find();
		$data = $this->prizeHandle($token, $wecha_id, $Lottery);

		if ($data['end'] == 3) {
			$sn = $data['sn'];
			$uname = $data['wecha_name'];
			$prize = $data['prize'];
			$tel = $data['phone'];
			$msg = '您已经中过了';
			echo '{"error":1,"msg":"' . $msg . '"}';
			exit();
		}

		if ($data['end'] == -1) {
			$msg = $data['winprize'];
			echo '{"error":1,"msg":"' . $msg . '"}';
			exit();
		}

		if ($data['end'] == -2) {
			$msg = $data['winprize'];
			echo '{"error":1,"msg":"' . $msg . '"}';
			exit();
		}

		if ((1 <= $data['prizetype']) && ($data['prizetype'] <= 6)) {
			echo '{"success":1,"sn":"' . $data['sncode'] . '","prizetype":"' . $data['prizetype'] . '","usenums":"' . $data['usenums'] . '"}';
		}
		else {
			echo '{"success":0,"prizetype":"","usenums":"' . $data['usenums'] . '"}';
		}

		exit();
	}
}

?>
