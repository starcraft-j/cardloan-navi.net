
<!-- #用 -->
<div id="pagelinks"></div>



<section id="section-page-link" class="p-page-link">


  <hgroup class="p-page-link__head">
    <h2>人気の特集から探す</h2>
  </hgroup>

  <ul class="p-page-link__list">

    <?php 
      $postId = 2947;
      $menuPostArray ;
      $menuPostArrayP1 = get_field('feature-p1', $postId);
      $menuPostArrayP2 = get_field('feature-p2', $postId);
      if(isset($_GET['ad'])) {
        if($_GET['ad'] == 'gss' || $_GET['ad'] == 'yss') {
          $menuPostArray = $menuPostArrayP2;
        } else {
          $menuPostArray = $menuPostArrayP1;
        }
      } else {
        $menuPostArray = $menuPostArrayP2;
      }
      
      foreach($menuPostArray as $post) : 
        $fTitle = get_field('feature_title');
        $fImg = get_field('feature_img');
    ?>

    <li>

      <a href="<?= removeParams(get_the_permalink($post->ID) . pageLinkParameter()) ?>" class="link">
        <img src="<?= $fImg;?>" alt="" width="100" height="100" loading="lazy">
        <span>
          <?= !empty($fTitle) ? $fTitle : get_the_title(); ?>
        </span>
      </a>

    </li>

    <?php endforeach; ?>

  </ul>


</section>