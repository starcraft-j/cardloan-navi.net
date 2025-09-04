<?php 
  /**即日融資ページ用 */
  get_header(); 

  ?>
  
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php 
    $pageId = get_the_ID();
    $slug = $post->post_name;
    $items = 0;

    [$rank_objects, $rank_objects2] = get_rank_obj(); 

    $rank_objects = is_array($rank_objects) ? $rank_objects : $rank_objects = get_field('ranking', $post->ID);
    
    if($rank_objects): 
			foreach($rank_objects as $rank_post) {
				$post_status = is_page('view') ? 'any' : 'publish';
				if(get_post_status($rank_post->ID) !== 'private') {
					$items++;
				}
			}
		endif;
    
    
    // 20250715 幸陽さん依頼
    $gdn_patterns = [
        'gdn', 'yt', 'fb', 'video', 'lap',
    ];

    $pattern_param = isset($_GET['ad']) && in_array($_GET['ad'], $gdn_patterns);

    ?>



    <?php include "parts/hero.php"; ?>
    <?php if($pattern_param) : ?>
      <?php include "parts/searchform.php"; ?>
    <?php endif; ?>
    <?php include "parts/step.php"; ?>
    
    <div id="modoru-target"></div>



    <?php if($rank_objects && $items > 0) : ?>
      <?php include "parts/ranking.php"; ?>
    <?php endif; ?>


      
    <?php include ('parts/choose.php'); ?>


    <?php include ('parts/ranking.php'); ?>


    <?php include ('parts/pickup.php'); include ('parts/toRanking.php'); ?>




  <?php endwhile; endif; ?>

  
<?php get_footer(); ?>        