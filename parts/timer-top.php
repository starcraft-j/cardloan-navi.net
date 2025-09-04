<?php

/**
 * FV Hero　TOPタイマー
 */

?>

<div class="timer-top <?= isset($_GET['ad']) && $_GET['ad'] === "video" ? 'video' : '' ?>">

  <span class="timer-top__title">
		
    <?php if(isset($_GET['ad']) && $_GET['ad'] == 'video') : ?>
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/fv-timer-subtext-video.svg" width="100" height="100" loading="lazy" alt="本日中に返り入れるなら">
    <?php else : ?>
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/fv-timer-subtext.svg" width="100" height="100" loading="lazy" alt="本日中に返り入れるなら">
    <?php endif ;?>

	</span> 

  <div class="timer-top__js">

    <span class="ato">あと</span>
    <span class="countdown bold" style="visibility: hidden;">00<span class="normal">時間</span>00<span class="normal">分</span>00<span class="normal">秒</span></span>

  </div>

</div>