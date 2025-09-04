    <section id="section-pr" class="p-pr u-device-pc <?= isset($_GET['test']) ? '-test' : '' ?>">
      <div class="p-pr__main">

        <ul>
          <?php
            if (isset($_GET['test'])) {
              $rank_post_objects = get_field('ranking_test');

            }

            if ($rank_objects) :
              foreach ($rank_objects as $key => $post) :
                if ($key >= 5) break;
                if ((is_page('view') && (get_post_status($post->ID) == 'publish' || get_post_status($post->ID) == 'private')) || 
                  (!is_page('view') && get_post_status($post->ID) == 'publish')) : $logo = get_field('logo');?>
                  <li><img src="<?= esc_url($logo) ?>" alt="" width="100" height="100" loading="lazy"></li>
                <?php endif;
              endforeach;
            endif;
          ?>
        </ul>

      </div>
    </section>