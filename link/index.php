<?php 
  /**
   * ❗️ @require のパス記載注意（サブフォルダの有無）
   * @slug aタグに指定したパラメータの投稿のスラッグを取得
   * ❗️ @post スラッグからIDを取得（３つ目の引数には投稿タイプを入れる）
   * @postID IDを取得
   * @name タイトルを取得
   * @img アイキャッチ画像を取得
   * @catch キャッチコピーを取得
   * @link アフィリリンクを取得
   */
  require ($_SERVER['DOCUMENT_ROOT'].'/wp-load.php'); 
  $slug = $_GET['item'];
  $post =get_page_by_path($slug , OBJECT , 'company');
  $postID = $post -> ID;
  $name = get_the_title($postID);
  $img = get_the_post_thumbnail_url($postID);
  $link = get_field('url', $postID); 

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="referrer" content="no-referrer-when-downgrade" />
  <title><?= $name ?> 公式サイト</title>
  <link rel="stylesheet" href="style.css?st=<?=time()?>">
</head>

<body>
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
            <p><span class="red"><?=$name?></span>の<br>公式サイトに移動中です。</p>
          </dd>
          <dd class="p-redirect-ctt__text">
            <p>ページが移動しない場合は<br><a href="<?= $link; ?>">こちらをクリック</a>してください。</p>
          </dd>
        </dl>
      </article>
    </section>
  </main>

  <!-- acs設定用 -->
  <script>
    function acsRedirect() {
      var url = '<?= $link; ?>';
      var params = location.search.substring(1);
      var delay_ms = 1000;
      if (params) {
        var separator = (url.indexOf('?') === -1) ? '?' : '&';
        url += separator + params;
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
  <!-- / acs設定用 -->

</body>

</html>