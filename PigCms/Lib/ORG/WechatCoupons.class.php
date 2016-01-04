<?php

include_once 'cardSDK.php';
class WechatCoupons extends apiOauth
{
	public $wxuser;
	public $access_token;

	public function __construct($wxuser)
	{
		parent::__construct();
		$this->wxuser = $wxuser;
		$this->access_token = $this->update_authorizer_access_token('', $this->wxuser);
	}

	public function unifyCompany($company)
	{
		$url = 'https://api.weixin.qq.com/card/location/batchadd?access_token=' . $this->access_token;
		$company_id = array();

		foreach ($company as $key => $val) {
			$str .= '{' . "\r\n" . '				 "business_name":"' . $val['name'] . '",' . "\r\n" . '				 "branch_name":"' . $val['shortname'] . '",' . "\r\n" . '				 "province":"' . $val['province'] . '",' . "\r\n" . '				 "city":"' . $val['city'] . '",' . "\r\n" . '				 "district":"' . $val['district'] . '",' . "\r\n" . '				 "address":"' . $val['address'] . '",' . "\r\n" . '				 "telephone":"' . $val['tel'] . '",' . "\r\n" . '				 "category":"' . $val['cat_name'] . '",' . "\r\n" . '				 "longitude":"' . $val['longitude'] . '",' . "\r\n" . '				 "latitude":"' . $val['latitude'] . '"' . "\r\n" . '			},';
			$company_id[] = $val['id'];
		}

		$post_data = '{"location_list":[' . rtrim($str, ',') . ']}';
		$res = $this->https_request($url, $post_data);
		return array('company_id' => $company_id, 'res' => $res);
	}

	public function getCompany()
	{
		$url = 'https://api.weixin.qq.com/card/location/batchget?access_token=' . $this->access_token;
		$data = '{' . "\r\n" . '				  "offset": 0,' . "\r\n" . '				  "count": 0' . "\r\n" . '				}';
		$company = $this->https_request($url, $data);
		return $company;
	}

	public function getColor()
	{
		$url = 'https://api.weixin.qq.com/card/getcolors?access_token=' . $this->access_token;
		$color = $this->https_request($url);
		return $color['colors'];
	}

	public function createCard($id, $is_edit = 0)
	{
		$info = M('Member_card_coupon')->where('id=' . $id)->find();

		if ($info['company_id'] == 0) {
			$company = M('Company')->where('token="' . $info['token'] . '" AND location_id!=0')->order('isbranch ASC')->select();
		}
		else {
			$company = M('Company')->where('token="' . $info['token'] . '" AND id=' . $info['company_id'])->select();
		}

		if (empty($company)) {
			return array('errcode' => '-1', 'errmsg' => '商家门店未导入');
			exit();
		}

		$logo_url = $this->getLogoUrl($info['logourl'], $id);
		$location_id_list = array();

		foreach ($company as $key => $value) {
			if ($value['location_id']) {
				$location_id_list[] = $value['location_id'];
			}
		}

		switch ($info['type']) {
		case '0':
			$card_type = 'CASH';
			$coupon_type = 2;
			break;

		case '1':
			$card_type = 'GENERAL_COUPON';
			$coupon_type = 1;
			break;

		case '2':
			$card_type = 'GIFT';
			$coupon_type = 3;
			break;

		default:
			$card_type = 'GENERAL_COUPON';
			break;
		}

		$base_info = new BaseInfo($logo_url['url'], $company[0]['name'], 0, $info['title'], $info['color'], '使用时向店员员出示此券', $company[0]['tel'], $info['info'], new DateInfo(1, intval($info['statdate']), intval($info['enddate'])), new Sku($info['total']));
		$base_info->set_sub_title('');
		$base_info->set_use_limit(1);
		$base_info->set_get_limit(intval($info['people']));
		$base_info->set_use_custom_code(false);
		$base_info->set_bind_openid(false);
		$base_info->set_can_share(false);
		$base_info->set_can_give_friend(false);
		$base_info->set_location_id_list($location_id_list);
		$base_info->set_url_name_type(1);
		$base_info->set_custom_url_name('立即使用');
		$base_info->set_custom_url(U('Wap/Card/consume', array('token' => $info['token'], 'cardid' => $info['cardid'], 'from' => 'weixin'), '', '', true));
		$card = new Card($card_type, $base_info);

		switch ($info['type']) {
		case '0':
			$card->get_card()->set_least_cost($info['least_cost'] * 100);
			$card->get_card()->set_reduce_cost($info['reduce_cost'] * 100);
			break;

		case '1':
			$card->get_card()->set_default_detail($company[0]['intro']);
			break;

		case '2':
			$card->get_card()->set_gift($info['gift_name']);
			break;

		default:
			$card->get_card()->set_default_detail($company[0]['intro']);
			break;
		}

		$post_data = $card->toJson();
		$url = 'https://api.weixin.qq.com/card/create?access_token=' . $this->access_token;
		$res = $this->https_request($url, $post_data);
		return $res;
	}

	public function updateCard($info, $token)
	{
		if ($info['company_id'] == 0) {
			$company = M('Company')->where('token="' . $info['token'] . '" AND location_id!=""')->order('isbranch ASC')->select();
		}
		else {
			$company = M('Company')->where('token="' . $info['token'] . '" AND id=' . $info['company_id'])->select();
		}

		$logo_url = $this->getLogoUrl($info['logourl'], $info['id']);
		$location_id_list = '';

		foreach ($company as $key => $value) {
			if ($value['location_id']) {
				$location_id_list .= $value['location_id'] . ',';
			}
		}

		$location_id_list = '[' . rtrim($location_id_list, ',') . ']';

		switch ($info['type']) {
		case '0':
			$card_type = 'CASH';
			$ext_str = '"least_cost":' . ($info['least_cost'] * 100) . ',"reduce_cost":' . ($info['reduce_cost'] * 100);
			break;

		case '1':
			$card_type = 'GENERAL_COUPON';
			break;

		case '2':
			$card_type = 'GIFT';
			$ext_str = '"gift":"' . $info['gift_name'] . '"';
			break;

		default:
			$card_type = 'GENERAL_COUPON';
			$ext_str = '"default_detail":"' . $company[0]['intro'] . '"';
			break;
		}

		$post_data = '{' . "\r\n" . '				         "card_id": "' . $info['card_id'] . '",' . "\r\n" . '				         "card_type": "' . $card_type . '",' . "\r\n" . '				         "' . strtolower($card_type) . '": {' . "\r\n" . '				                 "base_info": {' . "\r\n" . '				                     "logo_url":"' . $logo_url['url'] . '",' . "\r\n" . '				                     "title":"' . $info['title'] . '",' . "\r\n" . '				                     "color": "' . $info['color'] . '",' . "\r\n" . '				                     "service_phone": "' . $company[0]['tel'] . '",' . "\r\n" . '				                     "description": "' . $info['info'] . '",' . "\r\n" . '				                     "location_id_list" : ' . $location_id_list . ',' . "\r\n" . '				                     "date_info": {' . "\r\n" . '									    "type": 1,' . "\r\n" . '									    "begin_timestamp": ' . $info['statdate'] . ',' . "\r\n" . '									    "end_timestamp": ' . $info['enddate'] . '' . "\r\n" . '									},' . "\r\n" . '									"use_limit": 1,' . "\r\n" . '									"get_limit": ' . intval($info['people']) . ',' . "\r\n" . '									"custom_url_name": "立即使用",' . "\r\n" . '									"custom_url": "' . U('Wap/Card/consume', array('token' => $info['token'], 'cardid' => $info['cardid'], 'from' => 'weixin'), '', '', true) . '"' . "\r\n" . '				                 },' . "\r\n" . '								' . $ext_str . '' . "\r\n" . '				    		}' . "\r\n" . '						}';
		$url = 'https://api.weixin.qq.com/card/update?access_token=' . $this->access_token;
		$res = $this->https_request($url, $post_data);
		return $res;
	}

	public function editStock($card_id, $number)
	{
		$url = 'https://api.weixin.qq.com/card/modifystock?access_token=' . $this->access_token;
		$post_data = '{"card_id": "' . $card_id . '",';

		if (0 < $number) {
			$post_data .= '"increase_stock_value":' . abs($number);
		}
		else {
			$post_data .= '"reduce_stock_value":' . abs($number);
		}

		$post_data .= '}';
		$res = $this->https_request($url, $post_data);
		return $res;
	}

	public function delCard($card_id)
	{
		$url = 'https://api.weixin.qq.com/card/delete?access_token=' . $this->access_token;
		$post_data = '{"card_id": "' . $card_id . '"}';
		$res = $this->https_request($url, $post_data);
		return $res;
	}

	public function getLogoUrl($logourl, $id)
	{
		$url = 'https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=' . $this->access_token;
		$logo = file_get_contents($logourl);

		if (!$logo) {
			$logo = $this->curlGet($logourl);
		}

		file_put_contents(CONF_PATH . 'img_' . $id . '.jpg', $logo);
		$buffer = CONF_PATH . 'img_' . $id . '.jpg';
		$logoUrl = $_SERVER['DOCUMENT_ROOT'] . str_replace(array('./'), array('/'), $buffer);
		$post = array('media' => '@' . $logoUrl);
		$logourl = $this->https_request($url, $post);
		return $logourl;
	}

	public function cardSign($card_id, $outer_id = 0, $openid = '', $code = '')
	{
		$ticket = $this->getApiTicket();
		$timestamp = time();
		$signature = new Signature();
		$signature->add_data($ticket);
		$signature->add_data($card_id);
		$signature->add_data($timestamp);
		$signature->add_data($openid);
		$signature->add_data($code);
		$sign_str = $signature->get_signature();
		$sign = array('code' => $code, 'openid' => $openid, 'timestamp' => $timestamp, 'signature' => $sign_str, 'outer_id' => $outer_id);
		return json_encode($sign);
	}

	public function getApiTicket()
	{
		$now = time();
		if (($this->wxuser['card_ticket'] == '') || ($this->wxuser['card_expires'] < $now)) {
			$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . $this->access_token . '&type=wx_card';
			$card_ticket = $this->https_request($url);
			M('Wxuser')->where(array('token' => $this->wxuser['token']))->save(array('card_ticket' => $card_ticket['ticket'], 'card_expires' => $now + $card_ticket['expires_in']));
			return $card_ticket['ticket'];
		}
		else {
			return $this->wxuser['card_ticket'];
		}
	}

	public function getUnCode($encrypt_code)
	{
		$url = 'https://api.weixin.qq.com/card/code/decrypt?access_token=' . $this->access_token;
		$post_data = '{' . "\r\n" . '			"encrypt_code":"' . $encrypt_code . '"' . "\r\n" . '		}';
		$res = $this->https_request($url, $post_data);
		return $res;
	}

	public function consumeCoupons($card_id, $code)
	{
		$url = 'https://api.weixin.qq.com/card/code/consume?access_token=' . $this->access_token;
		$post_data = '{' . "\r\n" . '			"code":"' . $code . '",' . "\r\n" . '			"card_id":"' . $card_id . '"' . "\r\n" . '		}';
		$res = $this->https_request($url, $post_data);
		return $res;
	}

	public function testCard($test, $type = 1)
	{
		$url = 'https://api.weixin.qq.com/card/testwhitelist/set?access_token=' . $this->access_token;

		if ($type == 1) {
			$post_data = '{' . "\r\n" . '				"openid": ' . json_encode($test) . ',' . "\r\n" . '				"username": []' . "\r\n" . '			}';
		}
		else {
			$post_data = '{' . "\r\n" . '				"openid": [],' . "\r\n" . '				"username": ' . json_encode($test) . '' . "\r\n" . '			}';
		}

		$res = $this->https_request($url, $post_data);
		return $res;
	}

	public function invalid_code($card_id, $code)
	{
		$url = 'https://api.weixin.qq.com/card/code/unavailable?access_token=' . $this->access_token;
		$post_data = '{' . "\r\n" . '			"code":"' . $code . '",' . "\r\n" . '			"card_id":"' . $card_id . '"' . "\r\n" . '		}';
		$res = $this->https_request($url, $post_data);
		return $res;
	}

	public function curlGet($url)
	{
		$ch = curl_init();
		$header = 'Accept-Charset: utf-8';
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$temp = curl_exec($ch);
		return $temp;
	}
}

?>
