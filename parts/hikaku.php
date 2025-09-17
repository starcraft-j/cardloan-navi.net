    <!-- 比較表 -->
    <section id="hikaku" class="p-hikaku">

      <hgroup class="p-hikaku__head hikaku-tb-title">

        <figure class="p-hikaku__head__title hikaku-title">

          <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/hikaku-title.svg" alt="ひとめで簡単比較！おすすめカードローン一覧" width="10" height="10" loading="lazy" class="title-img" />
					
          <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/hikaku-img.webp" class="title-deco" width="10" height="10" loading="lazy" alt="" />

        </figure>


        <dl class="p-hikaku__head__timer title-timer">
          
          <dt class="timer-title sp bold">本日中に借りるなら<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/icons/timer-arrow.svg" alt="" width="10" height="10" loading="lazy"></dt>
    
          <dd class="timer-js">
            <span class="">残り</span>
            <span class="countdown"></span>
          </dd>

        </dl>

      </hgroup>





      <div class="p-hikaku__main hikaku-tb-content">

        <table class="c-table p-hikaku__main__table" id="hikaku-main" >

          <thead>

            <tr>
              <th>カードローン会社</th>
              <th>審査時間</th>
              <th>融資時間</th>
              <th>無利息期間</th>
              <th>申し込み</th>
            </tr>

          </thead>


          <tbody>

          <?php
						if( $rank_objects ): $i = 0; foreach( $rank_objects as $post): 
						$i++;
						include "fields.php";
						if ( get_post_status ($post->ID ) == 'publish' ) : 
					?>
            <tr data-href="<?= get_link_param() ?>">

              <th class="tbody-title">

                <?php $class = "prrrr bold"; ?>
                <?= get_popup_link(false, false) ?>
                  <picture>
                    <source srcset="<?= get_the_post_thumbnail_url($post->ID, 'medium') ?>" media="(max-width: 767px)">
                    <img src="<?= get_the_post_thumbnail_url($post->ID, 'medium') ?>" alt="" width="100" height="100" loading="lazy">
                  </picture>
                  <span><?= get_the_title(); ?></span>
                </a>

              </th>


              <?php
                /** 審査時間 */
                $fieldObj = get_field_object("rank-table_exam-speed_2024");
                $examSpeed = $fieldObj['choices'];
              ?>

              <td <?php tableMaru(get_field("rank-table_exam-speed_2024")) ?>>
                <?=$examSpeed[get_field("rank-table_exam-speed_2024")]?>
                  <?php if($post->ID == 472) : ?>
                    <small class="small">
                      ※3
                    </small>
                  <?php elseif($post->ID == 4604) : ?>
                    <small class="small">
                      ※5
                    </small>
                  <?php else : ?>
                    <small class="small">※1</small>
                  <?php endif; ?>
              </td>

              <?php
                /** 融資時間 */
                $fieldObj = get_field_object("rank-table_loan-speed_2024");
                $examSpeed = $fieldObj['choices'];
              ?>
              <td <?php tableMaru(get_field("rank-table_loan-speed_2024")) ?>>
                <?=$examSpeed[get_field("rank-table_loan-speed_2024")]?>
                  <?php if($post->ID == 472) : ?>
                    <small class="small">
                      ※4
                    </small>
                  <?php elseif($post->ID == 3570) : ?>
                    <small class="small">
                      ※5
                    </small>
                  <?php elseif($post->ID == 4604) : ?>
                    <small class="small">
                      ※6
                    </small>
                  <?php else : ?>
                    <small class="small">※1</small>
                  <?php endif; ?>
              </td>

              <?php
                /** 無利息期間 $InterestFree　*/
              ?>
              <td style="<?= $InterestFree >= 2 ? 'background-image:url('. esc_url( get_template_directory_uri()).'/images/icons/maru-01-bl.svg);' : 'background-image:none;' ?>">
              <?php risoku($InterestFree); ?>
              <?php if($post->ID == 119) {
                echo '<small class="small">※2</small>';
              } ?>
              </td>



              <td>

                <?= get_popup_link(true, false) ?>公式サイト
                </a>

              </td>
            </tr>
          <?php endif; wp_reset_postdata(); endforeach; endif; ?>


          </tbody>
        </table>
      </div>




			<div class="p-hikaku__foot">
				
				<p style="margin-top: 10px">
					<small class="small">
            ※1 お申込み時間や審査状況によりご希望にそえない場合があります。<br>※2 メールアドレス登録とWeb明細利用の登録が必要です。<br>※3  最短即日審査：年末年始を除く。17時までのお申込みに限ります。申込み状況等により、翌営業日以降の審査となる場合がございます。<br>※4 最短即日※システムメンテナンス時間はご利用いただけません。振込実施のタイミングはご利用の金融機関により異なります。
					<?php 
						$isMoneyCard = false;
            $isLinePocket = false;
						if($rank_objects) {
							foreach($rank_objects as $post) { 
								if($post->post_title == 'MONEY CARD GOLD') {
									$isMoneyCard = true;
									break;
								}
                if($post->post_title == 'LINEポケットマネー') {
                  $isLinePocket = true;
                  break;
                }
							}
						} ?>
					<?= $isMoneyCard ? '<br>※5 メンテナンス等によりご利用いただけない時間帯がございます。' : '' ?>
					<?= $isLinePocket ? '<br>※5 手続内容や混雑状況によって審査にお時間を頂く場合があります。<br>※6 お申込の時間帯により、ご希望に添えない場合があります。' : '' ?>
					</small>
				</p>

			</div>

    </section>
    <!-- 比較表 -->