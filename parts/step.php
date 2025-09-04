<?php 
  $slug = $post -> post_name;

?>


  <section class="p-step" id="step">



    <?php if(!is_page('speed')) : ?>

    <hgroup class="p-step__head <?= '-'.$slug ?>">
      <figure>
        <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/2step-v3-title.svg" alt="" class="" width="100" height="100" loading="lazy" />
      </figure>
    </hgroup>

    <?php endif; ?>



    <ul class="p-step__main">



      <li class="step-item step1">

        <h3 class="step-item__title">
          <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/step-1.svg" alt="" width="100" height="100" loading="lazy">
        </h3>

        <div class="step-item__text">
          <p>
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/step-img1.webp" alt="" width="100" height="100" loading="lazy">
            スマホなら免許証など必要な書類をその場で撮影して提出すればすぐに審査を進めてもらうことができます。
          </p>
          
        </div>

      </li>
      

      <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/step-arrow.svg" alt="" width="100" height="100" loading="lazy" class="img-step-arrow">

      <li class="step-item step2">

        <h3 class="step-item__title">
          <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/step-2.svg" alt="" width="100" height="100" loading="lazy">
        </h3>

        <div class="step-item__text">
          <p>
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/step-img2.webp" alt="" width="100" height="100" loading="lazy">
            当ページでおすすめしているカードローンはすべてカードレス対応。カードの発行や到着を待たずに契約が完了します。<br>借入は、口座振込か、アプリを使って最寄りの提携コンビニATMで引き出す方法を選択できます。
          </p>
          
        </div>

      </li>

      <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/step-arrow.svg" alt="" width="100" height="100" loading="lazy" class="img-step-arrow">

      <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/step-final.svg" alt="" width="100" height="100" loading="lazy">



    </ul>

  </section>