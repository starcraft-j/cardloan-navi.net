  <?php
    $hokuyoLoan = $post->ID === 1249;
  ?>


	<li class="p-ranking-item rank-item rank<?= $itemCount; ?> result-item">
    
    <span class="osusume" style="display:none"><?= $key ?></span>

		<div class="item-head">




			<div class="item-head__name">

				<div class="left">

					<div class="item-head__name__title title-link <?= $post->post_title == '東京スター銀行　おまとめローン' ? 'w100' : '' ?>">
	
						<div class="title">
							<?= get_popup_link() ?>
							<?= get_the_title() ?></a>
						</div>
	
					</div>
	
					<?php 
						if(!empty($groupTag)) : ?>
						<div class="item-head__name__company group-tag">
							<p><?= $groupTag; ?></p>
						</div>
					<?php endif; ?>

				</div>




				<?php if($post->ID !== 4134) : ?>
				<div class="item-head__name__hyouka hyouka bold">
					<?= hyouka($rank); ?>
					<?= get_star_img($rank); ?>
				</div>
				<?php endif; ?>
					

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

			<div class="item-infor__catch">
				<p class="u-device-pc"><?= $catch; ?></p>
				<p class="u-device-sp"><?= !empty($catchSp) ? $catchSp : $catch; ?></p>
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

							/** 注釈分岐 */
							if($post->ID == 472) {
								// プロミス
								echo "※1";
							} elseif($post->ID == 129 || $post->post_title == '住信SBIネット銀行 カードローン') {
								// 住信SBIネット銀行
								echo "※";
							} elseif($post->ID == 2605) {
								// 誰でもコース
								echo "※誰でもコース";
							} elseif($post->post_title == '東京スター銀行　おまとめローン') {
								// 東京スター銀行
								echo "※4";
							}
						?>
            <span class="nenritsu" style="display:none"><?php echo $interestRow; ?></span>
					</td>

					<th>借入限度額</th>

					<td style="background-image:url(<?= esc_url( get_template_directory_uri() ); ?>/images/icons/maru-0<?= $limit <= 3 ? '1' : '2'; ?>.svg);">
            <span class="gendo" style="display:none"><?php echo $limit; ?></span>
						<?php 
              if($limitText) {
                echo $limitText;
              } else {
                limit($limit); 
              }
              if($limitSup) {
                echo '<small class="small">'.$limitSup.'</small>';
              }
              if ($post->post_title == '東京スター銀行　おまとめローン') {
                echo '<small class="small">※2</small>';
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

            <span class="shinsa" style="display:none">
              <?php the_field("rank-table_exam-speed_2024"); ?>
            </span>

            <?php 
              if(!empty(get_field('rank-table_exam-speed_text'))) {
                echo get_field('rank-table_exam-speed_text');
              } else {
                echo $examSpeed[get_field("rank-table_exam-speed_2024")];
              }
              if($examSpeedSup ) { echo '<small class="small">'.$examSpeedSup.'</small>'; }

              /** 注釈分岐 */
              if($hokuyoLoan) {
                echo '<small class="small">※1</small>';
              } 
							// 審査時間の注釈を表示
							switch ($post->post_title) {
								// ※を表示する商品
								case 'プロミス':
								case 'プロミス レディース':
									echo '<small class="small">※</small>';
									break;
								// ※1を表示する商品
								case 'アコム':
								case 'MONEY CARD GOLD':
									echo '<small class="small">※1</small>';
									break;
								// ※2を表示する商品
								case 'dスマホローン':
									echo '<small class="small">※2</small>';
									break;
								}
						?>
					</td>

					

					<th>融資時間</th>
					<?php
						$fieldObj = get_field_object("rank-table_exam-speed_2024");
						$examSpeed = $fieldObj['choices'];
					?>

					<td <?php tableMaru(get_field("rank-table_loan-speed_2024")) ?>>

            <span class="yuushi" style="display:none">
              <?php the_field("rank-table_loan-speed_2024"); ?>
            </span>
					
						<?php
              if(!empty(get_field('rank-table_loan-speed_text'))) {
                echo get_field('rank-table_loan-speed_text');
              } else {
                echo $examSpeed[get_field("rank-table_loan-speed_2024")];
              }

              if($loanSpeedSup ) { echo '<small class="small">'.$loanSpeedSup.'</small>'; }

              /**　注釈分岐 */
              if($hokuyoLoan) {
                echo '<small class="small">※1</small>';
              } 
							// 融資時間の注釈を表示
							switch ($post->post_title) {
							// ※を表示する商品
							case 'プロミス':
							case 'プロミス レディース':
								echo '<small class="small">※</small>';
								break;
							// ※1を表示する商品
							case 'アコム':
								echo '<small class="small">※1</small>';
								break;
							// ※2を表示する商品
							case 'MONEY CARD GOLD':
								echo '<small class="small">※2</small>';
								break;
							// ※3を表示する商品
							case 'dスマホローン':
								echo '<small class="small">※3</small>';
								break;
							}
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

						<?php
							// 収入証明書の注釈を表示
							switch ($post->post_title) {
								case 'プロミス':
									echo '<small class="small">※4</small>';
									break;
								case 'アコム':
									echo '<small class="small">※2</small>';
									break;
								case 'セブン銀行カードローン':
									echo '<small class="small">※</small>';
									break;
							}
						?>

            <?php if($hokuyoLoan) { echo '<small class="small">※2'; } ?> 

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

				<div class="timer -result">
					
					<span class="timer-title -result bold">
						<?= !isset($_GET['ad']) || $_GET['ad'] !== "video" ? "本日借り入れるなら" : "本日現金を引き出すなら" ?>
					</span>
					<!-- <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/icons/timer-arrow.svg" alt="" width="10" height="10"> -->

					<div class="timer-js -result">
						<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/icons/contdown-timer-sp.svg" class="timer-icon" width="10" height="10" loading="lazy" class="timer-icon">
						<span>あと</span>
						<span class="countdown -result"></span>
					</div>

				</div>

			</div>

		<?php endif; ?>
		<!-- item-timer end -->


		<!-- item-btn start -->
		<div class="item-btn c-button -result">

			<?= get_popup_link() ?>

				<span>申し込みはこちら</span>

			</a>

		</div>
		<!-- item-btn end -->


		<!-- item-sup start -->
		<?php if(!has_tag('注釈折畳') ) : ?>

			<?php if(get_field('sup-button')) : ?>
			<div class="item-sup rank-small-text">
				<small class="small">
					<?= get_field('sup-button') ?>
				</small>
			</div>
			<?php endif; ?>

		<?php else : ?>

			<div class="item-accordion">
				<button class="acc-btn" id="js-acc-btn" @click="clickedAccBtn(<?= $itemCount ?>)"><span><?=$post->post_title == "レイク" ? "注意点と貸付条件について" : "注釈を見る" ?></span>
				<span class="arrow" :class="{'open': isSupAcc[<?= $itemCount ?>]}"></span></button>
				<small class="small acc-ctt" id="js-acc-ctt" :class="{'open': isSupAcc[<?= $itemCount ?>]}"><?= get_field('sup-acc') ?></small>

			</div>
		<?php endif; ?>


	</li>
  