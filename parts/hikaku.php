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
                <?= $examSpeedSupHikaku ? '<small class="small">'.$examSpeedSupHikaku.'</small>' : '<small class="small">'.$examSpeedSup.'</small>'; ?>
              </td>

              <?php
                /** 融資時間 */
                $fieldObj = get_field_object("rank-table_loan-speed_2024");
                $examSpeed = $fieldObj['choices'];
              ?>
              <td <?php tableMaru(get_field("rank-table_loan-speed_2024")) ?>>
                <?=$examSpeed[get_field("rank-table_loan-speed_2024")]?>
                <?= $loanSpeedSupHikaku ? '<small class="small">'.$loanSpeedSupHikaku.'</small>' : '<small class="small">'.$loanSpeedSup.'</small>'; ?>
              </td>

              <?php
                /** 無利息期間 $InterestFree　*/
              ?>
              <td style="<?= $InterestFree >= 2 ? 'background-image:url('. esc_url( get_template_directory_uri()).'/images/icons/maru-01-bl.svg);' : 'background-image:none;' ?>">
              <?php 
                if($interestFreeText) {
                  echo $interestFreeText;
                } else {
                  risoku($InterestFree);
                }
              ?>
              <?= $interestFreeSup ? '<small class="small">'.$interestFreeSup.'</small>' : ''; ?>
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
            <?= $hikakuSup ? $hikakuSup : ''; ?>
          </small>


				
				</p>

			</div>

    </section>
    <!-- 比較表 -->