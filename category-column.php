  <?php get_header(); ?>


    <section class="p-page-sub -archive">

      <ul class="p-page__main">

        <?php 
        $args = array (
                'category'       => '2', 
                'post_type'      => 'post', 
                'posts_per_page' => -1, 
                'post_status' => 'publish',
            );
            $myposts = get_posts( $args );
            foreach( $myposts as $post ):
            setup_postdata($post);
        ?>

        <li>
        
          <a href="<?= removeParams(get_the_permalink($post->ID) . pageLinkParameter()) ?>" class="">
            <p class="column-title"><?php the_title(); ?></p>
          </a>

        </li>

        <?php endforeach; wp_reset_postdata(); ?>

      </ul>

    </section>


  <?php get_footer(); ?>