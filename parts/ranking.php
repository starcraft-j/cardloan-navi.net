<section id="section-sp-toprank" class="<?= $loop === 2 ? 
'2' : '' ?> p-ranking <?= $loop === 1 ? '-top' : '-bottom' ?> <?= '-'.$slug ?>">
	
	
		<hgroup class="p-ranking__head <?= isset($_GET['ad']) && $_GET['ad'] == 'gss3' ? 'gss3-padding' : '' ?> <?= '-'.$slug ?>">
		
      <?php if(is_page('v3')) : ?>

        <?php if($rankingNum == 2) : ?>

          <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/top-rank2-title-<?= $items; ?>_v3-<?= $price; ?>.svg" alt="" class="" width="100" height="100" loading="lazy" />

        <?php else : ?>
          
          <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/top-rank-title-<?= $items; ?>_v3-<?= $price; ?>.svg" alt="" class="" width="100" height="100" loading="lazy" />

        <?php endif; ?>

      <?php elseif(is_page('speed') || is_page('hidden') || is_page('examination') || is_page('license') || is_page('first') || is_page('interest')  || is_page('woman')  || is_page('housewife') || is_page('summary') || is_page('bank') || is_page('bank-cardloan')) : ?>
        
					<?php if($loop == 1) : ?>
            <?php if($items > 0) : ?>
              <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/<?=$slug?>/<?=$slug?>-rank-title-<?= $items; ?>.svg" alt="" width="600" height="200" loading="lazy" />
            <?php endif; ?>
					<?php endif; ?>

					<?php if($loop == 2) : ?>
						<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/<?=$slug?>/<?=$slug?>-rank-title2-<?= $items2; ?>.svg" alt="" width="600" height="200" loading="lazy" />
					<?php endif; ?>

      <?php else : ?>

			<img src="https://cardloan-navi.net/wp-content/uploads/2025/08/top-rank-title-rs-1.webp" alt="最短20分！すぐに借りたい方へ本当におすすめのカードローン" class="" width="100" height="100" loading="lazy" />

      <?php endif; ?>
		
		</hgroup>



		<ul class="p-ranking__main <?= $loop === 1 ? '-top' : '-bottom' ?> <?='-'.$slug?>">

			<?php 
				if($loop == 1) {
					$rank_objects;
				} elseif($loop == 2) {
					$rank_objects = $rank_objects2;
				}
				if( $rank_objects ): 
					foreach( $rank_objects as $key =>$post): 
					setup_postdata($post); 
					include  "fields.php";
					if (
						(isset($_GET['test']) && (get_post_status($post->ID) == 'publish' || get_post_status($post->ID) == 'private')) 
						|| (is_page('view') && (get_post_status($post->ID) == 'publish' || get_post_status($post->ID) == 'private'))
						|| (!isset($_GET['test']) && !is_page('view') && get_post_status($post->ID) == 'publish')
					) : 



          $hokuyoLoan = $post->ID === 1249;
			?>


			<li class="p-ranking-item rank-item rank<?= $key + 1; ?>">

				<?php if(is_page('speed')) : ?>
					<?php
						$fieldObj = get_field_object("rank-table_exam-speed_2024");
						$examSpeed = $fieldObj['choices'];
					?>
					<div class="rank-speed-obi"><?=$examSpeed[get_field("rank-table_loan-speed_2024")]?></div>
				<?php endif; ?>
				


				<div class="item-head">

					<?php 
						if(!empty($groupTag)) : ?>
						<div class="item-head__company -pattern2">
							<p><?= $groupTag; ?></p>
						</div>
					<?php endif; ?>


					<div class="item-head__name">

						<div class="item-head__name__title <?= $post->post_title == '東京スター銀行　おまとめローン' ? 'w100' : '' ?>">

							<div class="title">
								<?= get_popup_link() ?>
								<?= get_the_title() ?></a>
							</div>

						</div>


						<?php if($post->ID !== 4134) : ?>
						<div class="item-head__name__hyouka bold -pattern3">
							<?= hyouka($rank); ?>
							<?= get_star_img($rank); ?>
						</div>
						<?php endif; ?>


					</div>



					<div class="item-head__catch">
						<p class="u-device-pc"><?= $catch; ?></p>
						<p class="u-device-sp"><?= !empty($catchSp) ? $catchSp : $catch; ?></p>
					</div>


				</div>


				
				<div class="item-infor">

					<div class="item-infor__thumb">
						<?= get_popup_link() ?>
						<picture>
							<source srcset="<?= get_the_post_thumbnail_url($post->ID, 'medium'); ?>" media="(max-width: 767px)">
							<img src="<?= get_the_post_thumbnail_url($post->ID); ?>" alt="" width="100" height="100" loading="lazy">
						</picture>
						</a>
					</div>

					<div class="item-infor__points">

						<?php if(!empty($points)) : ?>
						<div class="title">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/icons/point-icon.svg" alt="" width="20" height="20" loading="lazy">おすすめポイント！
						</div>

						<ul class="list">
							<?php foreach($points as $p) : ?>
								<?php if(!empty($p)) : ?>
								<li><?= $p; ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>

						<?php endif; ?>

					</div>

				</div>



				<div class="item-spec">
					
					<table class="c-table table-ranking">

						<tr class="tb-row1">

							<th>実質年率</th>

							<td style="background-image:url(<?= esc_url( get_template_directory_uri() ); ?>/images/icons/maru-0<?= $interestRow <= 3 || $post->post_title == 'プロミス' ? '1' : '2'; ?>.svg);">
								<?php 
									$firstFont = ''; 
									if($post->post_title =='りそなプレミアムカードローン') { $firstFont = '年'; } 

									/** 実質年率分岐 */
									if(!empty(($interestRow && $interestHigh))) {
										echo $firstFont."{$interestRow}%~{$interestHigh}%";
									} else {
										if(empty($interestHigh)) {
											echo $firstFont."{$interestRow}%";
										} elseif(empty($interestRow)) {
											echo "{$interestHigh}%";
										}
									} 

									if($interestSup) { echo '<small class="small">'.$interestSup.'</small>'; }
								?>
							</td>

							<th>借入限度額</th>

							<td style="background-image:url(<?= esc_url( get_template_directory_uri() ); ?>/images/icons/maru-0<?= $limit <= 3 ? '1' : '2'; ?>.svg);">
								<?php 
                  if($limitText) {
                    echo $limitText;
                  } else {
                    limit($limit); 
                  }
                  if($limitSup) {
                    echo '<small class="small">'.$limitSup.'</small>';
                  }
								?>
							</td>

						</tr>




						<tr class="tb-row2">
							<th>
								<?=$post->post_title == '東京スター銀行　おまとめローン' ? '仮審査期間' : '審査時間'?>
							</th>

							<?php
								$fieldObj = get_field_object ("rank-table_exam-speed_2024");
								$examSpeed = $fieldObj['choices'];
							?>

							<td <?php tableMaru(get_field("rank-table_exam-speed_2024")) ?>>
								<?php 
                  if(!empty(get_field('rank-table_exam-speed_text'))) {
                    echo get_field('rank-table_exam-speed_text');
                  } else {
                    echo $examSpeed[get_field("rank-table_exam-speed_2024")];
                  }

                  if($examSpeedSup ) { echo '<small class="small">'.$examSpeedSup.'</small>'; }

								?>
							</td>

							

							<th>融資時間</th>
							<?php
								$fieldObj = get_field_object("rank-table_loan-speed_2024");
								$examSpeed = $fieldObj['choices'];
							?>

							<td <?php tableMaru(get_field("rank-table_loan-speed_2024")) ?>>
							
								<?php
                  if(!empty(get_field('rank-table_loan-speed_text'))) {
                    echo get_field('rank-table_loan-speed_text');
                  } else {
                    echo $examSpeed[get_field("rank-table_loan-speed_2024")];
                  }

                  if($loanSpeedSup ) { echo '<small class="small">'.$loanSpeedSup.'</small>'; }


								?>

							</td>

						</tr>



						<tr class="tb-row3">

							<th>利用可能<br>コンビニ</th>
							<td>
								<?php 
									if($conv) {
										foreach($conv as $c) { 
											echo get_con_img($c);
										} 
									} else {
										echo "-";
									}
								?>
								<?php if($convSup) { echo '<small class="small">'.$convSup.'</small>'; } ?>
							</td>

							<th>収入証明書</th>
							
							<td style="background-image:url(<?= esc_url( get_template_directory_uri() ); ?>/images/icons/maru-0<?= $syoumeisyo == '不要' ? '1' : ($syoumeisyo == '必要' ? '3' : '2'); ?>.svg);">
							<?= $syoumeisyo; ?>
              <?php if($syoumeisyoSup) { echo '<small class="small">'.$syoumeisyoSup.'</small>'; } ?>

							</td>

						</tr>

					</table>

				</div>

			



				<!-- item-tag start -->
				<?php if($tag) : ?>
				<div class="item-tag">
					<ul class="tags">
					<?php
						$tagsToRender = array_map(
							function($t) use ($tag) {
								return [$t, in_array($t, $tag)];
							}, 
							$tagArray
						);

						foreach ($tagsToRender as $tagData) {
							echo renderTag($tagData[0], $tagData[1], $post->ID);
						}
					?>
					</ul>
				</div>
				<?php endif; ?>
				<!-- item-tag end -->




				<!-- item-timer start -->
				<?php if(!has_tag('no-timer')) : ?>

					<div class="item-timer <?= isset($_GET['ad']) && $_GET['ad'] === "video" ? '-video' : '' ?>">

						<div class="timer">
							
							<span class="timer-title bold">
								<?= !isset($_GET['ad']) || $_GET['ad'] !== "video" ? "本日借り入れるなら" : "本日現金を引き出すなら" ?>
							</span>
							<!-- <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/icons/timer-arrow.svg" alt="" width="10" height="10"> -->

							<div class="timer-js">
								<span>あと</span>
								<span class="countdown"></span>
							</div>

						</div>

					</div>

				<?php endif; ?>
				<!-- item-timer end -->


				<!-- item-btn start -->
				<div class="item-btn c-button -ranking <?= (is_page('v2') || (isset($_GET['ad']) && strpos($_GET['ad'], '2')))  ? ' v2-rank-btn-group'  : (is_page('v3')  ? ' v3-rank-btn-group' : '') 
				?>">

					<?= get_popup_link() ?>

						<?php if(!has_tag('ボタン文言なし')) : ?>
							<p class="small btn-text">
								<span><span class="red bold">最短5分</span>で申込完了！</span>
							</p>
						<?php endif; ?>

						<span class="u-device-sp">スマホで申し込む</span>
						<span class="u-device-pc">公式サイトで申し込む</span>

						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/icons/btn-sp-arrow.svg" alt=">>" class="btn-arrow" width="10" height="10" loading="lazy">

					</a>

				</div>
				<!-- item-btn end -->


				<!-- item-sup start -->
				<?php if(!has_tag('注釈折畳')) : ?>

					<div class="item-sup rank-small-text">
						<small class="small">
							<?= get_field('sup-button') ?>
						</small>
					</div>

				<?php else : ?>

					<div class="item-accordion">

						<button class="acc-btn" id="js-acc-btn" @click="clickedAccBtn(<?= $key ?>)"><span><?=$post->post_title == "レイク" ? "注意点と貸付条件について" : "注釈を見る" ?></span>
						<span class="arrow" :class="{'open': isSupAcc[<?= $key ?>]}"></span></button>

            
						<small class="small acc-ctt" id="js-acc-ctt" :class="{'open': isSupAcc[<?= $key ?>]}"><?= get_field('sup-acc') ?></small>

					</div>
				<?php endif; ?>


			</li>

    	<?php endif; wp_reset_postdata(); endforeach; endif; ?>

		</ul>

  </section>


    