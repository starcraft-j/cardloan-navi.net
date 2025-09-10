<script>
	var scriptAdded = false;

	window.addEventListener('DOMContentLoaded', function () {
		console.log('[GTM] 発火: DOMContentLoaded');
		setTimeout(function () {
			if (!scriptAdded) {
				console.log('[GTM] 発火: 3秒経過で読み込み開始');
				var newScript = document.createElement('script');
				newScript.src = 'https://www.googletagmanager.com/gtm.js?id=GTM-PV539T65';
				newScript.async = true;
				
				newScript.addEventListener('load', function() {
					console.log('[GTM] 読み込み完了');
				});
				
				newScript.addEventListener('error', function() {
					console.log('[GTM] 読み込みエラー（プレビューモードでは正常）');
				});
				
				var head = document.head || document.getElementsByTagName('head')[0];
				head.appendChild(newScript);
				scriptAdded = true;
			}
		}, 3000); 
	});
</script>


<script>
//jquery未設置の場合は設置
if (!window.jQuery) {
document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"><\/script>');
}
</script>
<div class='rmodal_base'>
	<div>
		<input type="hidden" name="priority" value="1">
		<input type="hidden" name="rAccountId" value="7"> 
		<input type="hidden" name="rCreativeId" value="326">       
		<span id='close_btn' data-izimodal-close='' style='display:none;'>閉じる</span>
		<a id='modal_link1' href='https://surprise-lab.com/shampoo/cv/cocone.html?link=ridatsu'>
						<img id='modal_img1' src='' style='display:none;'>
		</a>
	</div>
</div>
<script type="text/javascript" src="https://ryukyu-shinden.com/sat/api/read_creative.js"></script> 