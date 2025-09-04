document.addEventListener('DOMContentLoaded', function () {
	// localStorageが利用可能かチェック
	if (window.localStorage != null) {
		// URLのクエリパラメータを取得
		var queryString = location.search.substring(1);

		if (queryString) {
			// クエリパラメータを解析
			var params = queryString.split("&");
			var paramObj = [];

			for (var i = 0; i < params.length; i++) {
				var pair = params[i].split("=");
				paramObj[pair[0]] = pair[1];
			}

			// 各パラメータをlocalStorageに保存
			var cam = paramObj.cam;
			var gr_no = paramObj.gr_no;
			var ad_no = paramObj.ad_no;
			var key = paramObj.key;

			if (cam) window.localStorage.setItem("cam", cam);
			if (gr_no) window.localStorage.setItem("gr_no", gr_no);
			if (ad_no) window.localStorage.setItem("ad_no", ad_no);
			if (key) window.localStorage.setItem("key", key);
		}
	}

	// localStorageから値を取得
	var cam = localStorage.getItem("cam", cam);
	var gr_no = localStorage.getItem("gr_no", gr_no);
	var ad_no = localStorage.getItem("ad_no", ad_no);
	var key = localStorage.getItem("key", key);


	document.querySelectorAll("a.prrrr").forEach(function (element) {
		var href = element.getAttribute("href");
		console.log(href);

		// hrefが存在する場合のみ処理を実行
		if (href) {
			// 既存のクエリパラメータがある場合は&で、ない場合は?で追加
			if (href.indexOf("?") !== -1) {
				element.setAttribute("href", href + "&cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key);
			} else {
				element.setAttribute("href", href + "?cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key);
			}
		}
	});
});