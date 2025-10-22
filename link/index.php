<?php 

  require ($_SERVER['DOCUMENT_ROOT'].'/wp-load.php'); 
  $slug = $_GET['item'];
  $post =get_page_by_path($slug , OBJECT , 'company');
  $postID = $post -> ID;
  $name = get_the_title($postID);
  $img = get_the_post_thumbnail_url($postID);
  $link = get_field('url', $postID); 
  $catch = get_field('catch', $postID);
  $sup = get_field('sup-button', $postID);

  $queryString = $_SERVER['QUERY_STRING'];
  if (!empty($queryString)) {
    parse_str($queryString, $params);
    unset($params['item']);
    
    if (!empty($params)) {
      $additionalParams = http_build_query($params);
      $separator = (strpos($link, '?') !== false) ? '&' : '?';
      $linkWithParams = $link . $separator . $additionalParams;
    } else {
      $linkWithParams = $link;
    }
  } else {
    $linkWithParams = $link;
  }

  include 'inc/headTag.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="referrer" content="no-referrer-when-downgrade" />
  <title><?= $name ?> 公式サイト</title>
  <link rel="stylesheet" href="style.css?v=<?=time()?>">
</head>




<body>
  <?php include 'inc/bodyTag.php'; ?>


  <main class="container">

    <section class="p-redirect" id="redirect">

      <article>

        <div class="p-redirect-head">
          <p class="p-redirect-head__loader"></p>
          <p class="p-redirect-head__text">しばらくお待ちください。</p>
        </div>

        <dl class="p-redirect-ctt">

          <dd class="p-redirect-ctt__thumb">
            <img src="<?=$img?>" alt="<?=$name?>">
            <p><?=$name?>の公式サイトに移動中です。</p>
          </dd>

          <div class="catch-group">
            <h1>
              <p class="bold"><?=$catch?></p>        
            </h1>
          </div>

          <?php if(!has_tag('no-timer', $postID)) : ?>
            <div class="timer-group">
              <div class="timer">
                <span class="timer-title bold">本日借り入れるなら</span>
                <div class="timer-js">
                  <span>あと</span>
                  <span class="countdown" style="visibility: hidden"></span>
                </div>
              </div>
            </div>
          <?php endif; ?>
            
          <dd class="p-redirect-ctt__text">
            <p>ページが移動しない場合は<br><a href="<?= $linkWithParams; ?>">こちらをクリック</a>してください。</p>
          </dd>

          <?php if(isset($sup) && !empty($sup)) : ?>
          <div class="p-redirect-ctt__sup">
            <sup><?=$sup?></sup>
          </div>
          <?php endif; ?>

        </dl>

      </article>

    </section>

  </main>




	<?php if($link) : ?>
	<script>
		function acsRedirect() {
			var url = '<?= $link; ?>';
			var params = location.search.substring(1);
			var delay_ms = 1000;
			
			// kbp2とkbp3のパラメータを追加
			let kbp2 = localStorage.getItem("kbp2") || "";
			let kbp3 = JSON.stringify({
				time: Math.floor(Date.now() / 1000),
				url: window.location.href,
				ref: document.referrer || ""
			});
			
			// 既存のパラメータとkbp2/kbp3を統合
			const urlParams = new URLSearchParams();
			
			// 既存のパラメータを追加
			if (params) {
				const existingParams = new URLSearchParams(params);
				for (let [key, value] of existingParams) {
					urlParams.append(key, value);
				}
			}
			
			// kbp2とkbp3を追加
			urlParams.append('kbp2', kbp2);
			urlParams.append('kbp3', kbp3);
			
			// 最終URLを構築
			if (urlParams.toString()) {
				var separator = (url.indexOf('?') === -1) ? '?' : '&';
				url += separator + urlParams.toString();
			}
			
			setTimeout(function() {
				location.href = url
			}, delay_ms);
		}

		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", acsRedirect);
		} else {
			acsRedirect();
		}
	</script>
	<?php endif; ?>

  <script src="timer.js?v=<?=time()?>"></script>

</body>

</html>