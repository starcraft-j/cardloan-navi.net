<?php 


function is_mobile() {
  return wp_is_mobile();
}






function register_fields( $post, $name ) {
  //記事のアイキャッチ画像のIDを取得
  $id = get_post_thumbnail_id($post['id']);
  
  //アイキャッチ画像の情報を取得
  $info = wp_get_attachment_image_src($id, 'full');
  
  //アイキャッチ画像の情報の内訳
  $url = $info[0];
  $width = $info[1];
  $height = $info[2];
  
  //APIに追加する連想配列
  $data = array();
  
  $data['url'] = $url;
  $data['width'] = $width;
  $data['height'] = $height;
  
  return $data;
}

//サムネイルカラム追加
function customize_manage_posts_columns($columns) {
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}
add_filter( 'manage_posts_columns', 'customize_manage_posts_columns' );

//サムネイル画像表示
function customize_manage_posts_custom_column($column_name, $post_id) {
  if ( 'thumbnail' == $column_name) {
    $thum = get_the_post_thumbnail($post_id, 'small', array( 'style'=>'width:100px;height:auto;' ));
  } if ( isset($thum) && $thum ) {
    echo $thum;
  } else {
    echo __('None');
  }
}
add_action( 'manage_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2 );



function custom_thumbs() {
  add_image_size( 'thumb-small', 140, true );
}
add_action( 'after_setup_theme', 'custom_thumbs' );
add_theme_support('post-thumbnails');



// 子ページ判定
function is_parent_slug() {
  global $post;
  if ($post->post_parent) {
  $post_data = get_post($post->post_parent);
  return $post_data->post_name;
  }
}


add_action( 'init', 'create_custom_post_type' );
function create_custom_post_type() {

  register_post_type( 'company',
    array(
    'labels' => array(
    'name' => __( 'カードローン' ),
    'singular_name' => __( 'カードローン会社' ),
    'add_new_item' => 'カードローン会社を追加',
    'add_new' => 'カードローン会社追加',
    'new_item' => '新規カードローン会社',
    'view_item' => 'カードローン会社を表示',
    'not_found' => 'カードローン会社は見つかりませんでした',
    'not_found_in_trash' => 'ゴミ箱に何もありません。',
    'search_items' => 'カードローン会社を検索',
    ),
    'public' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'has_archive' => true,
    'menu_position' => 1,
    'show_in_rest' => true,
    'supports' => array('title','editor','thumbnail'),
    'rest_base' => 'company',
    )
  );
  register_taxonomy_for_object_type('category', 'company');
  register_taxonomy_for_object_type('post_tag', 'company');
}
function add_post_category_archive( $wp_query ) {
  if ($wp_query->is_main_query() && $wp_query->is_category()) {
  $wp_query->set( 'post_type', array('post','company'));
  }
}
add_action( 'pre_get_posts', 'add_post_category_archive' , 10 , 1);

    
function kanta_lp_revision() {
  add_post_type_support('company', 'revisions');
}
add_action('init', 'kanta_lp_revision');



function order_rest_user_query($query_vars, $request) {
  $orderby = $request->get_param('orderby');
  if (isset($orderby) && $orderby === 'allrank') {
    $query_vars["orderby"] = "meta_value_num";
    $query_vars["meta_key"] = "allrank";
  }
  return $query_vars;
}

add_filter( 'rest_user_query', 'order_rest_user_query', 10, 2);



// 固定ページにタグを設定
function add_tag_to_page() {
  register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'add_tag_to_page');



function my_admin_style() {
  echo '<style>
  .acf-button-group {
    flex-wrap: wrap!important;
    gap: 2px;
  }
  </style>'.PHP_EOL;
}
add_action('admin_print_styles', 'my_admin_style');




function get_icon_maru($data) {
  return 'icon-maru_'.$data.'.svg';
}




function get_link_param($args = []) {
  global $post;
  $post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
  $post_name = get_post_field('post_name', $post_id);
  $url = home_url("/link?item={$post_name}");
  
  return $url;
}



// ポップアップリンク取得
function get_popup_link($is_table_btn = false, $is_no_sub_btn = false) {
  global $post;
  
  // ボタン文言なしタグのチェック
  $has_no_btn_text = has_tag('ボタン文言なし', get_the_ID());
  
  // クラス判定をより読みやすい形に修正
  if ($is_table_btn) {
    $final_class = "prrrr bold table-btn button";
  } elseif ($has_no_btn_text || $is_no_sub_btn) {
    $final_class = "prrrr bold no-sub-btn button";
  } else {
    $final_class = "prrrr bold button";
  }

  // aria-label用のタイトル取得
  $post_title = get_the_title();
  $aria_label = $post_title . '公式へ';
  

  $special_cases = [
    472 => [
      'class' => 'js-popup',
      'attributes' => ''
    ],
    4134 => [
      'class' => 'star-popup',
      'attributes' => ' v-on:click="clickedStarPopup"'  // @click을 v-on:click으로 변경
    ],
    122 => [
      'class' => 'lake-popup',
      'attributes' => ' v-on:click="clickedLakePopup"' 
    ]
  ];
  

  if(isset($special_cases[get_the_ID()])) {
    $case = $special_cases[get_the_ID()];
    return sprintf(
      '<a class="%s %s"%s>',
      $case['class'],
      $final_class,
      $case['attributes']
    );
  }

  return sprintf(
    '<a href="%s" class="%s" target="_blank" aria-label="%s">',
    get_link_param(),
    $final_class,
    esc_attr($aria_label)
  );
}







// URLパラメータを取得するショートコード
/** [get_url] */
function get_url_param($atts = []) {
  global $post;
  
  // ショートコード属性のデフォルト値を設定
  $atts = shortcode_atts([
    'post_id' => $post->ID, // デフォルトは現在の投稿ID
  ], $atts);
  
  $url = home_url("/link?item={$post->post_id}");

  return $url;
}
add_shortcode('get_url', 'get_url_param');






// ACFフィールドでショートコードを有効化
function enable_shortcodes_in_acf($value, $post_id, $field) {
    if (is_string($value)) {
        return do_shortcode($value);
    }
    return $value;
}
add_filter('acf/format_value', 'enable_shortcodes_in_acf', 10, 3);



// 1週間前の日付を取得
function get_one_week_ago_date() {
    $time_one_week_ago = strtotime('-1 week');
    return '<span style="color: #1b1c1a;">※'.wp_date('Y年n月j日', $time_one_week_ago).'現在</span>';
}
// ショートコード [one_week_ago] を登録
add_shortcode('one_week_ago', 'get_one_week_ago_date');




// Renew 2025 04 08 ================================


// 各ページ移動リンク先パラメータ取得
function pageLinkParameter() {
  $allowed_params = ['ad', 't', 'v'];
  $params = array_filter(
    array_map(
      fn($param) => isset($_GET[$param]) ? $param . '=' . $_GET[$param] : null,
      $allowed_params
    )
  );
  return $params ? '?' . implode('&', $params) : '';
}
function removeParams($url) {
  $parsed_url = parse_url($url);
  parse_str($parsed_url['query'] ?? '', $query_params);
  unset($query_params['gclid'], $query_params['yclid'], $query_params['fbclid'], $query_params['msclkid']);
  $new_query = http_build_query($query_params);

  // ハッシュタグがある場合は保持する
  $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
  return $parsed_url['path'] . ($new_query ? '?' . $new_query : '') . $fragment;
}


// 👑 ランクオブジェクト取得 👑 

function get_rank_obj() {
  global $post;
  $slug = $post->post_name;
  $rank_obj = get_field("ranking", $post->ID);
  $rank_obj2 = get_field("ranking2", $post->ID);
  if(!is_front_page()) {
    $rank_obj = get_field("ranking", $post->ID);
    $rank_obj2 = get_field("ranking-".$slug.'2', $post->ID);
  }

  return [$rank_obj, $rank_obj2];
}


function renderTag($val, $isActive = false, $postId = null) {
  $className = $isActive ? 'tag-color' : 'tag-grey';
  $tagText = $val;
  
  if ($val == "バレずらい") {
    $tagText = (isset($_GET['ad']) && $_GET['ad'] == 'video') ? 'バレない' : 'バレづらい';
  }
  
  if ($postId == 131 && $val == "WEB完結") {
    return sprintf(
      '<li class="%s">%s<small class="small"%s>※</small></li>',
      $className,
      $tagText,
      $isActive ? ' style="color:#eee"' : ''
    );
  }
  
  return sprintf('<li class="%s">%s</li>', $className, $tagText);
}


function get_hyouka_number($val) {
  if($val == 1) {
    return '4.9';
  } elseif($val == 2) {
    return '4.7';
  } elseif($val == 3) {
    return '4.5';
  } elseif($val == 4) {
    return '4.4';
  } elseif($val == 5) {
    return '4.3';
  } elseif($val == 6) {
    return '4.1';
  } elseif($val == 7) {
    return '3.9';
  } elseif($val == 8) {
    return '3.8';
  } elseif($val == 9) {
    return '3.5';
  } elseif($val == 10) {
    return '3.4';
  } else {
    return '3.3';
  }
}


function get_hyouka_star($val) {
  if($val == 1) {
    return esc_url(get_template_directory_uri()).'/images/icons/rank/hoshi-01.svg';
  } elseif($val >= 2 && $val <= 4) {
    return esc_url(get_template_directory_uri()).'/images/icons/rank/hoshi-02.svg';
  } elseif($val >= 5 && $val <= 7) {
    return esc_url(get_template_directory_uri()).'/images/icons/rank/hoshi-03.svg';
  } else {
    return esc_url(get_template_directory_uri()).'/images/icons/rank/hoshi-04.svg';
  }
}


function get_star_img($val) {
  if($val == 1) {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/hoshi-01.svg" alt="" width="100" height="20" loading="lazy" />';
  } elseif($val >= 2 && $val <= 4) {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/hoshi-02.svg" alt="" width="100" height="20" loading="lazy" />';
  } elseif($val >= 5 && $val <= 7) {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/hoshi-03.svg" alt="" width="100" height="20" loading="lazy" />';
  } else {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/hoshi-04.svg" alt="" width="100" height="20" loading="lazy" />';
  }
}


function get_con_img($val) {
  if($val == 'セブンイレブン') {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/con-seven.svg" alt="" width="20" height="20" loading="lazy" />';
  } elseif($val == 'ローソン') {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/con-lawson.svg" alt="" width="20" height="20" loading="lazy" />';
  } elseif($val == 'ファミマ') {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/con-family.svg" alt="" width="20" height="20" loading="lazy" />';
  } elseif($val == 'ミニストップ') {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/con-mini.svg" alt="" width="20" height="20" loading="lazy" />';
  } elseif($val == 'サークルＫ') {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/con-k.svg" alt="" width="20" height="20" loading="lazy" />';
  } elseif($val == 'サンクス') {
    return '<img src="'.esc_url(get_template_directory_uri()).'/images/icons/rank/con-sunkus.svg" alt="" width="20" height="20" loading="lazy" />';
  } else {
    return '';
  }
}


function get_page_slug() {
  global $post;
  $page = get_page($post->ID);
  $page_slug = $page->post_name; 
  return $page_slug;
}


function my_toplevel_slug() {
  global $post;

  if(is_page()):
    if($post -> post_parent != 0 ): //親がいる場合
    $ancestor = array_pop( get_ancestors($post->ID, 'page'));
    return esc_html(get_page_uri($ancestor));
    else: //親がいない場合は自身を返す
    return esc_html($post->post_name);
  endif;

  endif;
}



global $searchformNumber;
$searchformNumber = 1;
global $loop;
$loop = 1;
global $pickupNum;
$pickupNum = 1;






