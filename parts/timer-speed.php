<?php

/**
 * FV Hero　SPEEDタイマー
 */

?>



<div class="timer-speed">

  <p class="timer-speed__main">
    <?php if((isset($_GET['t']) && $_GET['t'] == 1) && (!is_mobile())) : ?>

      <span class="time" style="visibility: hidden"></span>から<span class="blue bold">最速</span>で<span class="blue bold">借りる<span class="timer-speed__main__step">2STEP</span></span>

    <?php else : ?>
      
      <span class="time" style="visibility: hidden"></span>から<span class="red bold">最速</span>で<span class="red bold">借りる<span class="timer-speed__main__step">2STEP</span></span>
      
    <?php endif; ?>
  </p>

</div>