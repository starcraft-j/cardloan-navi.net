    <!-- Parts : Hero FV -->

    <section class="p-hero <?= '-'.$slug ?>">

      <figure class="p-hero__main">


        <?php if(is_front_page() || is_page('popup')) : //TOP ?>

          <picture>
            <?php if(isset($_GET['v']) && $_GET['v'] == 2) : ?>
              <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-v2_sp.webp" media="(max-width: 767px)">
              <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-v2.webp" alt="" width="978" height="457" fetchpriority="high">
            <?php else : ?>
              <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-new-sp-rs_2.webp" media="(max-width: 767px)">
			        <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-new-pc-rs_2.webp" alt="" width="978" height="457" fetchpriority="high">
            <?php endif; ?>
          </picture>



        <?php elseif(is_page('speed')) : ?>
          
          
          <picture>
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-speed-new-sp.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-speed-new-sp.webp" alt="" width="100" height="100" fetchpriority="high">
          </picture>

        <?php elseif(is_page('hidden')) : ?>
          
          
          <picture>
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-hidden-sp-<?= $items2; ?>.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-hidden-pc-<?= $items2; ?>.webp" alt="" width="100" height="100" fetchpriority="high">
          </picture>


        <?php elseif(is_page('bank-cardloan')) : ?>
          
          <picture >
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-sp.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-pc.webp" alt=""  width="100" height="100" fetchpriority="high"> 
          </picture>

          <picture >
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-text-sp<?= $items; ?>.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-<?= $slug; ?>-text-pc<?= $items; ?>.webp" alt="" width="100" height="100" fetchpriority="high" class="img-bank-text">
          </picture>

          <span class="fv-date <?='-'.$slug?>"><small><?=wp_date('Y').'年</small><br>最新版' ?></span>

          
        <?php elseif(is_page('bank')) : ?>

          <picture>
            <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-bank-sp_v2.webp" media="(max-width: 767px)">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/fv-bank-pc_v2.webp" alt="" width="100" height="100" fetchpriority="high">
          </picture>

          <span class="fv-date <?='-'.$slug?>"><?=wp_date('Y').'年' ?></span>
          
        <?php else: ?>


					<?php if(is_page('examination') || is_page('license') || is_page('first') || is_page('interest') || is_page('summary') || is_page('woman') || is_page('housewife')) : ?>

						<picture>
							<source srcset="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-sp.webp" media="(max-width: 767px)">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-pc.webp" alt="" width="100" height="100" fetchpriority="high">
						</picture>

					<?php else : ?>

						<picture>
							<source srcset="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-sp-<?= empty($items2) ? $items : $items2 ?>.webp" media="(max-width: 767px)">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/fv-<?= $slug ?>-pc-<?= empty($items2) ? $items : $items2 ?>.webp" alt="" width="100" height="100" fetchpriority="high">
						</picture>

					<?php endif; ?>

        <?php endif; ?>


        <?php 
          if(is_front_page()) {
            if(!(isset($_GET['v']) && $_GET['v'] == 2)) { include "timer-top.php"; }
            

          } elseif(is_page('speed')) {
            include "timer-speed.php";
          }
				?>
				
      </figure>

      <?php if(is_front_page()) : ?>
        <div class="sup-box fv-sup"><sup>dスマホローンの最短即日審査は17時までの申込が必要です。※2</sup></div>
      <?php endif; ?>

    </section>