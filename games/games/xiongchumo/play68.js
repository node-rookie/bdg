function play68_init() {
	updateShare(0);
}

function goHome() {
	window.location.href = HOME_PATH;
}

function play68_submitScore(score) {
	updateShareScore(score);
	//show_share();
}

function updateShare(bestScore) {
	imgUrl = 'http://www.v918.cn/vgames/games/xiongchumo/wenzhangku.png';
	//var domains = ['www.v918.cn/vgames','www.xinwenzhang.com'];
	//var domain = domains[new Date().getTime()%4];
	lineLink = 'http://www.v918.cn/vgames/games/xiongchumo/';
	descContent = "反向跑酷没玩过吧？快来一起跑！";
	updateShareScore(bestScore);
	appid = '';
}

function updateShareScore(bestScore) {
	if(bestScore > 0) {
		shareTitle = "我在《3D熊出没》被追了" + bestScore + "你，你能跑过我不？！";
	}
	else{
		shareTitle = "超华丽跑酷《3D熊出没》，你能跑多远？";
	}
}