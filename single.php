<?php get_header(); ?>


  <section class="p-page-sub -single">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


      <div class="p-page-sub__head">
        <h1 class="title"><?php the_title(); ?></h1>
      </div>

      <div class="p-page-sub__main">
        <?php the_content(); ?>
      </div>

    <?php endwhile; endif; ?>

  </section>


<?php get_footer(); ?>        