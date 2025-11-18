      <?php 
        /**
         * フッターコンテンツ分岐
         */
        $searchformNumber = 2;
        include ('parts/page-link.php');
        include ('parts/searchform.php');
        
      ?>
      </div>


      
      <div id="footer" class="l-footer">
        
        <div class="footer-main l-footer__main">

          <?php 
            $footText = '※カードローンナビでは、アフィリエイトプログラムを利用し、アコム社等から委託を受け広告収益を得て運用しております。';
            $footLinks = [
              'info' => '運営者情報',
              'info#privacy' => 'プライバシーポリシー',
              'survey' => '調査概要',
              'terms-use' => '利用規約',
              'category/column/' => 'コラム一覧'
            ];
          ?>

          <ul id="foot-links" class="l-footer__links">

            <?php foreach($footLinks as $key => $val) : ?>
            <li>
              <a href="<?= removeParams(home_url('/' . $key) . pageLinkParameter()) ?>" aria-label="<?= $val.'ページへ' ?>">
              <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/icons/btn-foot-arrow.svg" alt=""><?= $val ?>
            </a>
            </li>
            <div class="line-vertical"></div>
            <?php endforeach; ?>
          </ul>


          <div class="footer-pr l-footer__pr u-device-pc">
            <p><?= $footText ?></p>
          </div>


        </div>


        <div id="foot-copy" class="l-footer__copy">@CopyRight <img src="https://cardloan-navi.net/wp-content/uploads/2025/08/logo-new-rs-v1.svg" alt="" width="100" height="50" loading="lazy" /></div>

        
        <div class="footer-pr l-footer__pr u-device-sp">
          <p><?= $footText ?></p>
        </div>


      </div>



    </div>


    <script src="<?= esc_url( get_template_directory_uri() ); ?>/assets/js/vue.min.js" defer></script>
    <script src="<?= esc_url( get_template_directory_uri() ); ?>/assets/js/vue.js" defer></script>
    <script src="<?= esc_url( get_template_directory_uri() ); ?>/assets/js/storage.js?<?=time() ?>" defer></script>
    <script src="<?= esc_url( get_template_directory_uri() ); ?>/assets/js/init.min.js" defer></script>

    <?php if(is_page('result')) : ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js" defer></script>
      <script src="<?= esc_url( get_template_directory_uri() ); ?>/assets/js/list.js" defer></script>
    <?php endif; ?>
  
    <?php include ('tag/bodyTag_b.php'); ?>
    
  </body>
</html>


