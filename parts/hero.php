    <!-- Parts : Hero FV -->

    <section class="p-hero <?= '-'.$slug ?>">

      <figure class="p-hero__main">


        <?php if(is_front_page()) : //TOP ?>

          <picture>
            <source srcset="https://cardloan-navi.net/wp-content/uploads/2025/08/fv-new-sp-rs.webp" media="(max-width: 767px)" width="460" height="481" fetchpriority="high">
			      <img src="https://cardloan-navi.net/wp-content/uploads/2025/08/fv-new-pc-rs.webp" alt="" width="978" height="457" fetchpriority="high">
          </picture>



        <?php elseif(is_page('speed')) : ?>
          
          
          <picture>
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-speed-new-sp.webp" media="(max-width: 767px)" width="390" height="247" fetchpriority="high">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-speed-new-sp.webp" alt="" width="100" height="100" fetchpriority="high">
          </picture>

        <?php elseif(is_page('hidden')) : ?>
          
          
          <picture>
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-hidden-sp-<?= $items2; ?>.webp" media="(max-width: 767px)" width="390" height="247" fetchpriority="high">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-hidden-pc-<?= $items2; ?>.webp" alt="" width="100" height="100" fetchpriority="high">
          </picture>


        <?php elseif(is_page('bank-cardloan')) : ?>
          
          <picture >
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-sp.webp" media="(max-width: 767px)" width="100" height="100" fetchpriority="high">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-pc.webp" alt=""  width="100" height="100" fetchpriority="high"> 
          </picture>

          <picture >
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-text-sp<?= $items; ?>.webp" media="(max-width: 767px)" width="100" height="100" fetchpriority="high">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-text-pc<?= $items; ?>.webp" alt="" width="100" height="100" fetchpriority="high" class="img-bank-text">
          </picture>

          <span class="fv-date <?='-'.$slug?>"><small><?=wp_date('Y').'年</small><br>最新版' ?></span>

          
        <?php elseif(is_page('bank')) : ?>

          <picture>
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-bank-sp_v2.webp" media="(max-width: 767px)" width="100" height="100" fetchpriority="high">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-bank-pc_v2.webp" alt="" width="100" height="100" fetchpriority="high">
          </picture>

          <span class="fv-date <?='-'.$slug?>"><?=wp_date('Y').'年' ?></span>
          
        <?php else: ?>


					<?php if(is_page('examination') || is_page('license') || is_page('first') || is_page('interest') || is_page('summary') || is_page('woman') || is_page('housewife')) : ?>

						<picture>
							<source srcset="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-sp.webp" media="(max-width: 767px)" width="100" height="100" fetchpriority="high">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-pc.webp" alt="" width="100" height="100" fetchpriority="high">
						</picture>

					<?php else : ?>

						<picture>
							<source srcset="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-sp-<?= empty($items2) ? $items : $items2 ?>.webp" media="(max-width: 767px)" width="100" height="100" fetchpriority="high">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-pc-<?= empty($items2) ? $items : $items2 ?>.webp" alt="" width="100" height="100" fetchpriority="high">
						</picture>

					<?php endif; ?>

        <?php endif; ?>


        <?php 
          if(is_front_page()) {
            include "timer-top.php";
          } elseif(is_page('speed')) {
            include "timer-speed.php";
          }
				?>
				
      </figure>

    </section>