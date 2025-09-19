<?php 

$rank = get_field('allrank');

if(empty($rank)) {
  $rank = get_field('num-default');
} 

$image_id = get_post_thumbnail_id ();
$image_url = wp_get_attachment_image_src ($image_id, true);
$url = get_field('link');
$urlP = "";
$catch = get_field('catch');
$catchSp = get_field('catch_sp');

$limit = get_field('rank-table_limit'); //利用額限度
$interestRow = get_field('rank-table_interest-row'); //最低金利
$interestHigh = get_field('rank-table_interest-high'); //最高金利

$xaminationSpeed = get_field('rank-table_examination-speed'); //審査スピード
$xaminationSpeedN = get_field('rank-table_examination-speed_new'); //審査スピード　(削除よてい)
$loanSpeed = get_field('rank-table_loan-speed'); //融資スピード
$loanSpeedN = get_field('rank-table_loan-speed_new'); //融資スピード
$InterestFree = get_field('rank-table_Interest-free'); //無利息期間
$conv = get_field('rank-table_conv'); //利用可能コンビニ
$syoumeisyo = get_field('rank-table_syoumeisyo'); //収入証明書



$interestText = get_field('rank-table_interest_text');
$interestSup = get_field('rank-table_interest_sup');


// 比較表のみ使用
$interestFreeSup = get_field('rank-table_Interest-free_sup');
$interestFreeText = get_field('rank-table_interest-free_text');

$examSpeedSupHikaku = get_field('rank-table_exam-speed_sup_hikaku');
$loanSpeedSupHikaku = get_field('rank-table_loan-speed_sup_hikaku');


$hikakuSup = get_field('sup-hikaku', 4737);


//共通スペック用
$limitText = get_field('rank-table_limit_text');
$limitSup = get_field('rank-table_limit_sup');
$examSpeedSup = get_field('rank-table_exam-speed_sup');
$loanSpeedSup = get_field('rank-table_loan-speed_sup');
$convSup = get_field('rank-table_conv_sup');
$syoumeisyoSup = get_field('rank-table_syoumeisyo_sup');


$loanSpeedFront = get_field('rank-table_loan-speed-front'); //融資スピード（表示） 20231012
$xaminationSpeedFront = get_field('rank-table_examination-speed-front'); //審査スピード（表示） 20231012

$tag = get_field('rank-tag');
$groupTag = get_field('group-tag');
$points = get_field('points');
$accSup = get_field('sup-acc');
$tagArray = array('即日融資', 'バレずらい', 'WEB完結', '免許証でOK', '無利息期間あり', '土日祝OK');
$review1 = get_field('review1');
$review2 = get_field('review2');
$reviews = array($review1, $review2);
