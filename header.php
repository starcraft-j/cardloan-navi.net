<?php include "inc/function.php"; ?>
<?php
$expires = date('D, d M Y H:i:s T', strtotime('+1 hour'));
?>
<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">

  <?php
    /**
     * GTMコード改善
     */
		/** Js読み込み改善 */
		include "tag/headTag.php"; 
		// include "tag/headTag_t2.php"; 
	?>


  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Expires" content="<?= $expires; ?>">
  <meta http-equiv="Cache-Control" content="max-age=3600">
  <meta http-equiv="Pragma" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta name="referrer" content="no-referrer-when-downgrade" />
  <title><?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta property="og:locale" content="ja_JP">
  <meta property="og:title" content="<?php bloginfo('name'); ?>">
  <meta property="og:description" content="<?php bloginfo('description'); ?>">
  <meta property="og:url" content="<?= home_url() ?>">
  <meta property="og:image" content="<?= get_template_directory_uri(); ?>/assets/dist/_common/ogp.webp">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:type" content="image/webp">
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:type" content="website">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image" content="<?= esc_url(get_template_directory_uri()) ?>/assets/dist/_common/ogp.webp">


  <!-- favicon -->
  <link rel="icon" href="<?= esc_url(get_template_directory_uri()) ?>/assets/img/_common/favicon.ico" sizes="any"><!-- 32×32 -->
  <link rel="icon" href="<?= esc_url(get_template_directory_uri()) ?>/assets/img/_common/favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?= get_template_directory_uri() ?>/assets/img/_common/apple-touch-icon.png"><!-- 180×180 -->
  <link rel="manifest" href="<?= esc_url(get_template_directory_uri()) ?>/assets/js/manifest.webmanifest">

  <link rel="stylesheet" href="<?= esc_url( get_template_directory_uri() ) ?>/assets/css/style.css?st=<?= time(); ?>" />


  <?php 
    /**
     * FV画像読み込み準備
     */
  ?>

  <?php if(is_front_page()) : ?>
    <?php for($imgCount = 2; $imgCount <= 7; $imgCount++) : ?>
      <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-new-sp-<?= $imgCount; ?>.webp" as="image">
    <?php endfor; ?>
    <?php for($imgCount = 2; $imgCount <= 7; $imgCount++) : ?>
      <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-new-pc-<?= $imgCount; ?>.webp" as="image">
    <?php endfor; ?>
    <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/images/fv-timer-subtext.svg" as="image">
  <?php elseif(is_page('bank-cardloan')) : ?>
    <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-bank-cardloan-text-sp5.webp" as="image">
    <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-bank-cardloan-sp.webp" as="image">
  <?php elseif(is_page('speed')) : ?>
    <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-speed-new-sp.webp" as="image">
  <?php elseif(is_page('hidden')) : ?>
    <?php for($imgCount = 2; $imgCount <= 5; $imgCount++) : ?>
      <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-hidden-sp-<?= $imgCount; ?>.webp" as="image">
    <?php endfor; ?>
    <?php for($imgCount = 2; $imgCount <= 5; $imgCount++) : ?>
      <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-hidden-pc-<?= $imgCount; ?>.webp" as="image">
    <?php endfor; ?>
  <?php endif; ?>

  <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/js-n/vue.min.js" as="script">
  <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/js-n/vue.js" as="script">
  <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/js-n/storage.js" as="script">
  <link rel="preload" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/js-n/init.min.js" as="script">


  
</head>



  <body class="<?= is_front_page() ? 'front-body' : 'sub-body' ?>">


  <?php include "tag/bodyTag.php" ?>







	<div id="vue-app">

  <header id="header" class="l-header l-header-renew">

  
    <?php
      /**
       * ナビゲーション
       */
    ?>

    <nav class="l-nav-renew">

      <div class="l-nav-renew__logo">

        <a href="<?= removeParams(home_url('/') . pageLinkParameter()) ?>" aria-label="ロゴ">
          <img src="https://cardloan-navi.net/wp-content/uploads/2025/08/logo-new-rs-v1.svg" alt="" class="<?= is_page('v3') ? '-v3' : '' ?>" width="100" height="30" loading="lazy" />
        </a>
      </div>


      
      <div class="l-nav-renew__map">

        <ul class="l-nav-renew__links">
  
          <?php 
          if(
            !(is_page('info') || 
            is_page('survey') || 
            is_category('column') || 
            is_single())) : 
          ?>
          <li class="list"><span class="pr">PR</span></li>
  
          <?php endif; ?>
  
  
          <div class="u-device-pc">

            <li class="link list">
              
              <a href="<?= removeParams(home_url('/') . pageLinkParameter()) ?>">
                <img src="<?= esc_url( get_template_directory_uri() ) ?>/images/icons/menu-icon-home.svg" alt="" width="20" height="20" loading="lazy" aria-label="TOP" />
                <span>TOP</span>
              </a>
    
            </li>
          </div>
  
  
          <li class="link list">
            <a href="<?= removeParams(home_url('/speed') . pageLinkParameter()) ?>" class="bold" aria-label="速日融資カードローンページ">
              <img src="<?= esc_url( get_template_directory_uri() ) ?>/images/icons/menu-icon-speed.svg" alt="" width="20" height="20" loading="lazy" /><span>お急ぎの方</span>
            </a>
          </li>

          <li class="link list">
            <a href="<?= removeParams(home_url('/hidden') . pageLinkParameter()) ?>" class="bold" aria-label="バレずに借りれるカードローンページ">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/icons/menu-icon-hidden.svg" alt="" width="20" height="20" loading="lazy" /><span>内緒で借りたい</span>
            </a>
          </li>
  

          <div class="l-nav-renew__ham" @click="isHamOpen = !isHamOpen" :class="{'open': isHamOpen}">
            <span></span>
            <span></span>
            <span></span>
          </div>

          
        </ul>
        
        
        
      </div>

      <div class="l-header-open u-device-sp" @click="isHamOpen = !isHamOpen" :class="{'open': isHamOpen}">

        <ul>
          <li>
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/icons/menu-icon-home.svg" alt="" width="20" height="20" loading="lazy" />
            <a class="bold" href="<?= removeParams(home_url('/') . pageLinkParameter()) ?>" aria-label="TOPへ">
              <span>TOPへ</span>
            </a>
          </li>

          <?php 
            $args = array(
              'posts_per_page' => '-1',
              'post_type' => 'page',
              'tag' => 'feature',
              'meta_key' => 'feature_order',
              'orderby' => 'meta_value_num',
              'order' => 'asc',
              'post_status' => 'publish',
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
              while ( $the_query->have_posts() ) : $the_query->the_post();  ;
            ?>
          <li>
            <img src="<?= get_field('feature_img') ?>" alt="">
            <a href="<?= removeParams(get_the_permalink() . pageLinkParameter()) ?>" class="bold" aria-label="<?= !empty(get_field('feature_title')) ? get_field('feature_title').'ページ' : get_the_title().'ページ'; ?>">
              <span><?= !empty(get_field('feature_title')) ? get_field('feature_title') : get_the_title(); ?></span>
            </a>
          </li>
          <?php endwhile; endif; ?>

        </ul>
        
      </div>
      
    </nav>
        


  </header>
  
  




  <!-- コンテンツ -->
  <?php
    /**
     * 共通コンテナー
     */
  ?>
  <div id="container" class="l-container l-container-renew">


    <?php if(is_category('column')) : ?>

      <div id="bread" class="c-breadcrumb">
        <div class="bread-group">
          <a href="<?= removeParams(home_url('/') . pageLinkParameter()) ?>" aria-label="TOPへ">トップ</a>
          <span>></span>
          <span class="bold">コラム一覧</span>
        </div>
      </div>

    <?php endif; ?>

    