
  <!-- Dカード -->
  <div class="js-popup-ctt -d">


    <ul class="js-popup-ctt__inner">



      <span class="js-popup-ctt__close -d"></span>


      <li data-content="1" class="active">
        <h2><span>Q.</span>あなたは<br class="sp">ドコモユーザーですか？</h2>
        <div class="flex">
          <button id="yes" class="next-btn next-btn__yes" data-target="2">はい</button>
          <button id="no" class="next-btn next-btn__no" data-target="4">いいえ</button>
        </div>
      </li>



      <li data-content="2">


        <h2><span>Q.</span>あなたは30歳以上ですか？</h2>
        <div class="flex">
          <button id="yes" class="next-btn next-btn__yes" data-target="3">はい</button>
          <button id="no" class="next-btn next-btn__no" data-target="4">いいえ</button>
        </div>

      </li>



      <li data-content="3">

        <?php $mainpost = get_post(472); if ($mainpost) : ?>

        <h2 class="title">
          30歳以上の<br class="u-device-sp"><span class="bg-y" style="color: inherit">ドコモユーザーのあなた</span>には<br><span class="red"><?=get_the_title($mainpost->ID) ?></span>がおすすめ！
        </h2>

        <div class="img">
          <a href="<?= get_link_param(['post_id' => $mainpost->ID]) ?>" class="<?= $class; ?>" target="_blank" aria-label="<?=get_the_title($mainpost->ID) ?>公式へ"><img src="<?=get_the_post_thumbnail_url($mainpost->ID)?>" alt="<?=get_the_title($mainpost->ID) ?>"></a>
        </div>

        <div class="button c-button -ranking">
          <a href="<?= get_link_param(['post_id' => $mainpost->ID]) ?>" class="" target="_blank" aria-label="<?=get_the_title($mainpost->ID) ?>公式へ"><?=get_the_title($mainpost->ID) ?> 公式サイト</a>
        </div>

        <p class="pagination">
          <span class="before" data-target="1">戻る</span>
        </p>
        <?php endif; ?>

      </li>



      <li data-content="4">


        <?php $subpost = get_post(45); if ($subpost) : ?>

        <h2 class="title">20歳以上29歳以下の方には<br><span class="bg-y"><?=get_the_title($subpost->ID) ?>がおすすめ！</span></h2>
        <div class="img">
          <a href="<?= get_link_param(['post_id' => $subpost->ID]) ?>" class="<?= $class; ?>" target="_blank" aria-label="<?=get_the_title($subpost->ID) ?>公式へ"><img src="<?=get_the_post_thumbnail_url($subpost->ID)?>" alt="<?=get_the_title($subpost->ID) ?>"></a>
        </div>
        <div class="button c-button -ranking">
          <a href="<?= get_link_param(['post_id' => $subpost->ID]) ?>" class="<?= $class; ?>" target="_blank" aria-label="<?=get_the_title($subpost->ID) ?>公式へ"><?= get_the_title($subpost->ID) ?> 公式サイト</a>
        </div>
        <p class="pagination">
          <span class="before" data-target="1">戻る</span>
        </p>

        <?php endif; ?>

      </li>


    </ul>

    
  </div>