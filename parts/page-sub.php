

<section class="p-page-sub">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <hgroup class="p-page-sub__head">


    <h1 class="title">

      <?php the_title(); ?>
      
    </h1>

      
  </hgroup>




  <div class="p-page-sub__main">

    <?php the_content(); ?>

  </div>
  
  <?php endwhile; endif; ?>


</section>