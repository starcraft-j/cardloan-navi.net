<section class="p-page-information">



  <div class="information-content <?='-'.$slug?>">


  <?php $information_array = []; 

    if(is_page('hidden')) : ?>


      <?php 

        $information_array= [
          1 => [
            'title' => '郵送物なし',
            'text' => '郵送物なしを選択できるカードローンを選べば、家族に内緒でバレずにお金を借りられます。',
          ],
          2 => [
            'title' => 'WEB完結できる',
            'text' => 'WEBで申込～契約～借入・返済まですべて完結できれば、自動契約機の出入りやお金を借りるところを見られる心配がありません。',
          ],
          3 => [
            'title' => '電話連絡なしも相談できる',
            'text' => '原則、勤務先への在籍確認の電話を実施していない会社を選びましょう。もし実施が必要な場合でも、担当者の個人名で連絡が来て、会社名を名乗ることは絶対にないので安心です。',
          ],
        ]
      ?>


      <hgroup class="information-content__head information-content__head-<?=$slug?>">
        <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/hidden/hidden-point-maintitle.svg" alt="絶対バレずに借りれるカードローン選びの３つのポイント" width="100" height="100" loading="lazy">
      </hgroup>


      <ul class="information-content__main information-content__main-<?=$slug?>">

        <?php foreach($information_array as $key => $information) : ?>

        <li class="point-item point<?= $key ?> point-item-<?=$slug?>">

          <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/hidden/hidden-point-title<?= $key ?>.svg" alt="" class="number" width="100" height="100" loading="lazy">

          <h3 class="point-item__title point-item-<?=$slug?>__title"><?= $information['title'] ?></h3>

          <div class="point-item__text point-item-<?=$slug?>__text">

            <div class="left">
              <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/hidden/hidden-point-icon<?= $key ?>.svg" alt="" width="100" height="100" loading="lazy">
            </div>

            <div class="right">
              <p><?= $information['text'] ?></p>
            </div>

          </div>

        </li>

        <?php endforeach; ?>

      </ul>


    <?php elseif(is_page('bank')) : ?>

      <?php

        $information_array= [
          1 => [
            'text' => 'カードローンには「銀行カードローン」と「消費者金融」があります。<br>消費者金融と比較すると<span class="red bold">銀行カードローンは、上限金利が低めで、利息の負担が少ないです！</span><br>長期の借入を検討している方に向いています。',
          ],
          2 => [
            'text' => '利用するカードローンによって、借入可能な限度額は異なります。<span class="red bold">銀行カードローンなら、最大800万円以上の借入ができる可能性もあります！</span><br>まとまった金額を借入したいと考えている方には、銀行カードローンの利用が便利でオススメです！',
          ],
          3 => [
            'text' => '銀行カードローンというと、窓口での手続きが大変そう・・・とイメージする方もいますが、<span class="red bold">手続きはネットからOKで24時間いつでも申込可能です！</span><br>金利も低く安心感のある銀行カードローンは、多くの方に利用されています！',
          ],
        ]
      ?>

      <hgroup class="information-content__head information-content__head-<?=$slug?>">
        <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/bank/bank-point-title.svg" alt="" width="100" height="100" loading="lazy">
      </hgroup>
      

      <ul class="information-content__main information-content__main-<?=$slug?>">

        <?php foreach($information_array as $key => $information) : ?>

        <li class="point-item point<?= $key ?> point-item-<?=$slug?>">

          <h3 class="point-item__title point-item-<?=$slug?>__title">

            <picture>
              <source srcset="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/bank/point-midashi<?=$key?>-sp.svg" media="(max-width: 767px)" width="100" height="100" loading="lazy">
              <img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/dist/front/bank/point-midashi<?=$key?>-pc.svg" alt="" width="100" height="100" loading="lazy">
            </picture>

          </h3>

          <div class="point-item__text point-item-<?=$slug?>__text">
            <div class="textbox">
              <p>
                <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/bank/bank-icon<?=$key?>.svg" alt="" width="100" height="100" loading="lazy"><?= $information['text'] ?>
              </p>
            </div>
          </div>
        </li>

        <?php endforeach; ?>


      </ul>

    <?php elseif(is_page('examination')) : ?>


			<?php
				$information_array = [
					1 => [
						'title' => '収入に合った適切な金額で申込む！',
						'text' => '借入は年収の1/3までと定められていて、それ以上の貸付は禁止されています。<br>そのため、希望金額が高すぎると、それだけで審査に落ちてしまう原因になります・・・<br>収入に合った適切な金額で申込みをしましょう！',
					],
					2 => [
						'title' => '申込内容にミス・不備が無いかチェック！',	
						'text' => '申込情報の記入ミスには十分に注意しましょう！<br>間違って入力してしまうと適切な審査がされません・・・<br>万が一、審査に落ちてしまうと、その履歴が半年ほど残り、しばらくは、カードローンの審査が通りづらくなってしまう可能性があります・・・<br>申込みの際には、ミス・不備が無いか再度、確認しましょう！',
					],
					3 => [
						'title' => '消費者金融カードローンの利用が⭕',
						'text' => 'カードローンには「銀行」と「消費者金融」の2種類があります。<br>消費者金融カードローンなら、借入可能かすぐにわかる診断機能があり、審査スピードは最短30分とスピーディ！<br>これから借入をするなら、消費者金融カードローンがオススメです！',
					],
				]
			?>

			<div class="information-content__head information-content__head-<?=$slug?>">

				<div class="description description-<?=$slug?>">

					<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/ex/ex-cha-1.svg" alt="" width="100" height="100" loading="lazy">

					<p>結論からお伝えすると、審査に通りやすいカードローンはありません・・・<br>しかし、<span class="red bold">申込時にポイントを押さえておけば、審査通過率はグッとあがります</span>！</p>
					<p>これから借入を検討している方は、ぜひ3つのポイントをチェックしてくださいね！</p>

				</div>

			</div>

      <ul class="information-content__main information-content__main-<?=$slug?>">

				<?php foreach($information_array as $key => $information) : ?>

				<li class="point-item point<?= $key ?> point-item-<?=$slug?>">

					<h3 class="point-item__title point-item-<?=$slug?>__title">
						<div class="number">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/ex/ex-point_<?= $key ?>.svg" alt="" width="100" height="100" loading="lazy">
						</div>
						<div class="text">
							<p><?= $information['title'] ?></p>
						</div>
					</h3>

					<div class="point-item__text point-item-<?=$slug?>__text">
						<p><?= $information['text'] ?></p>
					</div>

				</li>

				<?php endforeach; ?>

			</ul>
			

    <?php elseif(is_page('license')) : ?>


			<dl class="information-content__main information-content__main-<?=$slug?>">

				<dt class="information-content__main-<?=$slug?>__question flex-box">

					<div class="left -question">
						<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/license/license-icon_q.svg" alt="" width="100" height="100" loading="lazy">
					</div>

					<div class="right">
						<p>
						カードローンの契約に必要な書類は？<br>準備するのは面倒くさい？
						</p>
					</div>

					<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/license/license-icon_q-cha.svg" alt="" class="qna-deco-icon q" width="100" height="100" loading="lazy">

				</dt>

				<dd class="information-content__main-<?=$slug?>__answer flex-box">

					<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/license/license-icon_a-cha.svg" alt="" class="qna-deco-icon a" width="100" height="100" loading="lazy">

					<div class="left -answer">
						<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/license/license-icon_a.svg" alt="" width="100" height="100" loading="lazy">
					</div>

					<div class="right">
						<p>
						50万円以下なら、<span class="red bold">免許証のみで借入可能なケースも多くあります！</span><br>
						金融機関や条件によって違いはありますが、<span class="red bold">免許証などの身分証明書と、スマホがあれば、お金を借りられます</span>。<br>
						急にお金が必要になった時も、面倒な書類の準備に時間を掛けず、手続きが簡単にできると嬉しいですね！<br>
						ここでは、免許証だけで借入可能なカードローンを紹介しています。<br>
						ぜひ参考にしてください！
						</p>
            <div class="sup-box"><sup>※マイナンバーカード、パスポート、（交付を受けていない方は）資格確認書で代替可能</sup></div>
					</div>

				</dd>

			</dl>


    <?php elseif(is_page('first')) : ?>

			<?php 
        $information_array= [
          1 => [
            'text' => '当ページで紹介するカードローンは、お申込み〜返済まで全てスマホで完結できます。<br>
                さらに郵送物や会社への電話連絡もないので、誰にもバレずに借り入れが可能。<br>
                まずは、スマホで免許証・パスポートといった本人確認書類を撮影して、審査を進めてもらいましょう。',
          ],
          2 => [
            'text' => '借り入れ方法は、アプリ・webサイトを使って口座振込や提携ATMからの引き出しを選択するだけ。<br>もちろん、ドラマで見るような悪質な金利や怖い取り立てもないので安心です！',
          ],
        ]
      ?>


			<hgroup class="information-content__head information-content__head-<?=$slug?>">
        <img src="<?= esc_url( get_template_directory_uri() ); ?>/images/first/first-step-title.svg" alt="絶対バレずに借りれるカードローン選びの３つのポイント" width="100" height="100" loading="lazy">
      </hgroup>

			<ul class="information-content__main information-content__main-<?=$slug?>">


			<?php foreach($information_array as $key => $information) : ?>

				<li class="point-item point<?= $key ?> point-item-<?=$slug?>">

					<div class="point-item__title point-item-<?=$slug?>__title">
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/first/first-step<?= $key ?>.svg" alt="" width="100" height="100" loading="lazy">
					</div>

					<div class="point-item__text point-item-<?=$slug?>__text">
						<img src="<?= esc_url( get_template_directory_uri() ); ?>/images/first/first-cha-<?= $key ?>.svg" alt="" width="100" height="100" loading="lazy" class="ab-icon">
						<p><?= $information['text'] ?></p>
					</div>

				</li>

			<?php endforeach; ?>

			</ul>

    <?php elseif(is_page('housewife')) : ?>

  
      <hgroup class="information-content__head information-content__head-<?=$slug?>">
        <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/housewife-point-title.svg" alt="" width="100" height="100" loading="lazy">
      </hgroup>


      <ul class="information-content__main information-content__main-<?=$slug?>">


        <li class="point-item point1 point-item-<?=$slug?>">

          <div class="point-item__title point-item-<?=$slug?>__title">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/housewife-point-midashi-num1.svg" alt="" width="100" height="100" loading="lazy">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/housewife-point-midashi1.svg" alt="" width="100" height="100" loading="lazy">
          </div>

          <div class="point-item__text point-item-<?=$slug?>__text">

            <div class="textbox">
              <p>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/housewife-icon1.svg" alt="">
                カードローンの借り入れは、ご家族にバレないよう配慮されています。<br>さらに、以下の手順を守れば家族はもちろん、<span class="red bold">会社や友人にも内緒で借りることができるので安心です！</span>
              </p>
            </div>

            <ul class="small-list">

              <?php 
                $sm_list = [
                  1 => [
                    'title' => '申込は自分のスマホ・パソコンから！',
                    'text' => '家族共通のパソコンやアカウントで申込しなければ、誰かにやり取りを見られる心配はないでしょう。',
                  ],
                  2 => [
                    'title' => '自分のスマホ番号で登録！',
                    'text' => 'カードローンを借り入れするには、本人確認が必要です。<br>登録した電話番号にかかってくるので、間違えて家の番号を入力しないように気をつけましょう！',
                  ],
                  3 => [
                    'title' => 'カードレスのカードローンを選ぶと安心！',
                    'text' => '借入用のカードが郵送で送られてきた場合、ご家族に知られてしまう可能性があります。<br>当ページでは、スマホひとつで申込〜返済までできるカードレスのカードローンを紹介しているので、ぜひそちらから選んでみてください！',
                  ],
                ]
              ?>

              <?php foreach($sm_list as $key => $sm_list) : ?>

                <li>
                  <h3>
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/housewife-point-komidashi-num<?= $key ?>.svg" alt=""><span><?= $sm_list['title'] ?></span>
                  </h3>
                  <div class="textbox">
                    <p><img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/slist-icon<?= $key ?>.svg" alt="" width="100" height="100" loading="lazy"><?= $sm_list['text'] ?></p>
                  </div>
                </li>

              <?php endforeach; ?>
            </ul>

          </div>
        </li>



        <li class="point-item point2 point-item-<?=$slug?>">

          <div class="point-item__title point-item-<?=$slug?>__title">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/housewife-point-midashi-num2.svg" alt="" width="100" height="100" loading="lazy">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/housewife-point-midashi2.svg" alt="" width="100" height="100" loading="lazy">
          </div>

          <div class="points-item__text point-item-<?=$slug?>__text">

            <div class="textbox">

              <p>
              すぐに返済ができないとき、利息で返済額が膨らんでしまわないか心配になりますよね。<br>しかし、5万円借りた場合でも利息は下記のような計算になります。
              </p>

              <div class="img-box">
                <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/housewife-math.svg" alt="" width="100" height="100" loading="lazy">
              </div>

              <p>
                <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/housewife/housewife-icon2_1.svg" alt="" width="100" height="100" loading="lazy">計画的に返済すれば、大きな負担にならないので安心です！<br>さらに、<span class="bold">当ページでおすすめしているカードローンなら、初めての利用で<span class="red bg-y">「30日間無利息キャンペーン」</span>もあるので、お得に利用できますよ！</span>
              </p>
            </div>
          </div>
        </li>
      </ul>

		<?php elseif(is_page('interest')) : ?>

      <hgroup class="information-content__head information-content__head-<?=$slug?>">
        <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/interest/interest-point-title.svg" alt="" width="100" height="100" loading="lazy">
      </hgroup>

      <ul class="information-content__main information-content__main-<?=$slug?>">


        <li class="point-item point1 point-item-<?=$slug?>">

					<div class="point-item__title point-item-<?=$slug?>__title">
						<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/interest/interest-point1-sp.svg" alt="" width="100" height="100" loading="lazy">
					</div>

					<div class="point-item__text point-item-<?=$slug?>__text">
						<p>
              <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/interest/interest-point2-icon.svg" alt="" width="100" height="100" loading="lazy">
              無利息期間とは、借入した金額に対する利息（金利）が掛からない期間のことです。<br>
              カードローンの中には<span class="red bold">「30日間無利息キャンペーン」</span>を実施しているものがあるので、<br>
              短期間に返せるならキャンペーンを利用する方がお得になります。
            </p>
					</div>

				</li>

        <li class="point-item point2 point-item-<?=$slug?>">

					<div class="point-item__title point-item-<?=$slug?>__title">
						<img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/interest/interest-point2-sp.svg" alt="" width="100" height="100" loading="lazy">
					</div>

          

					<div class="point-item__text point-item-<?=$slug?>__text">

            <div class="text">
              <p>
                多くのカードローンは以下の<span class="red bold">条件①さえクリアしていれば、無利息キャンペーンが利用できます。</span>
              </p>
            </div>

            <ul class="small-list">
              <li>①そのカードローン会社を初めて利用する</li>
              <li>②メールアドレスを登録してWEB明細を利用する</li>
              <img
                src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/interest/interest-point1-icon.svg"
                alt="" class="ab-icon">
            </ul>

            <div class="text">
              <p>「明日までにまとまったお金が必要だけど、月末までお金が入らない…」<br><br>
                そんな方は当ページで紹介している<span class="red bold">「30日間無利息キャンペーン」付きのカードローン</span>を選んで、お得に借入〜返済をしてみましょう。</p>
            </div>
              
				</li>


      </ul>

		<?php elseif(is_page('summary')) : ?>

      <?php 
        $information_array= [
          1 => [
            'text' => 'おまとめローンがお得な理由は<span class="red bold">「金利を下げられる」点</span>です。<br>借入先が複数あるなら、一番金利の低いローンから融資を受けて他での借り入れを全て清算してしまいましょう。<br>一番金利の低い借入先1つにまとめることができれば、毎月の返済額も下げられますよ。',
          ],
          2 => [
            'text' => '借入先が複数ある場合、毎回一つ一つ返済するのが面倒だったり、それぞれに手数料がかかったりして、わずらわしさを感じますよね。<br><span class="red bold">借入先を1つに絞る「おまとめローン」なら、残高や返済額も分かりやすく、毎月の返済を一回で済ませられます。</span><br>複数管理していた時よりも気持ち的に楽になるので、おすすめです。',
          ],
        ]
      ?>

      <hgroup class="information-content__head information-content__head-<?=$slug?>">
        <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/summary/summary-point-title.svg" alt="" width="100" height="100" loading="lazy">
      </hgroup>


      <ul class="information-content__main information-content__main-<?=$slug?>">


        <?php foreach($information_array as $key => $information) : ?>
        <li class="point-item point<?= $key ?> point-item-<?=$slug?>">

          <div class="point-item__title point-item-<?=$slug?>__title">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/summary/summary-point-midashi<?= $key ?>.svg" alt="" width="100" height="100" loading="lazy">
          </div>

          <div class="point-item__text point-item-<?=$slug?>__text">
            <div class="textbox">
              <p>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/summary/summary-icon<?= $key ?>.svg" alt="">
                <?= $information['text'] ?>
              </p>
            </div>
          </div>
        </li>
        <?php endforeach; ?>

      </ul>

		<?php elseif(is_page('woman')) : ?>
    

      <?php 
        $information_array= [
          1 => [
            'text' => '借入をしても、周囲の人に知られることはありません。<br><span class="red bold">家族にバレることは無いので安心して利用できます！</span>',
          ],
          2 => [
            'text' => '1万円を10日間借りた場合の利息は約50円ほど。<br>利息は思ったよりもかからないケースがほとんどです！<br>また、月々の返済は1000円〜<span class="small">※</span>可能で、無理の無い範囲で返済を進めていけます。計画的に利用すれば、利息で返済が苦しくなる心配はありません！',
            'sup' => '※金融機関によって異なります',
          ],
          3 => [
            'text' => 'TVドラマや漫画では、返済期日が近づくと自宅に返済を求めるシーンもあります。<br>しかし、<span class="red bold">このサイトで紹介しているカードローンは、銀行グループや上場企業が運営しているので、取り立てが来る心配とは無縁です！</span>',
          ],
        ]
      ?>


      <hgroup class="information-content__head information-content__head-<?=$slug?>">
        <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/woman/woman-point-title.svg" alt="" width="100" height="100" loading="lazy">
      </hgroup>


      <ul class="information-content__main information-content__main-<?=$slug?>">

        <?php foreach($information_array as $key => $information) : ?>
        <li class="point-item point<?= $key ?> point-item-<?=$slug?>">
          <div class="point-item__title point-item-<?=$slug?>__title">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/woman/woman-point-midashi<?= $key ?>.svg" alt="" width="100" height="100" loading="lazy">
            
          </div>
          <div class="point-item__text point-item-<?=$slug?>__text">
            <div class="textbox">
              <p>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/woman/woman-icon<?= $key ?>.svg" alt="" width="100" height="100" loading="lazy">
                <?= $information['text'] ?>
                <?= !empty($information['sup']) ? '<small class="small">'.$information['sup'].'</small>' : '' ?>
              </p>
            </div>
          </div>
        </li>
        <?php endforeach; ?>

      </ul>

		<?php elseif(is_page('bank-cardloan')) : ?>
	
    

      <?php 
        $information_array= [
          1 => [
            'text' => 'カードローンには「銀行カードローン」と「消費者金融」があります。<br>消費者金融と比較すると<span class="red bold">銀行カードローンは、上限金利が低めで、利息の負担が少ないです！</span><br>長期の借入を検討している方に向いています。',
          ],
          2 => [
            'text' => '利用するカードローンによって、借入可能な限度額は異なります。<span class="red bold">銀行カードローンなら、最大800万円以上の借入ができる可能性もあります！</span><br>まとまった金額を借入したいと考えている方には、銀行カードローンの利用が便利でオススメです！',
          ],
          3 => [
            'text' => 'メガバンクや地方銀行が提供する銀行カードローンなら直接店舗で相談できたり、大手なので安心して借りられます。<br>銀行や提携ATMで借入・返済できて、<span class="red bold">郵送物なしやキャッシュカードでそのままお金が借りられる銀行もあるので、</span>プライバシーへの配慮がなされているのも嬉しいポイントです！',
          ],
        ]
      ?>
      
      <div class="points-title">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/bank-cardloan/bank-cardloan-point-title.svg" alt="">
      </div>

      <ul class="information-content__main information-content__main-<?=$slug?>">


        <?php foreach($information_array as $key => $information) : ?>

        <li class="point-item point<?= $key ?> point-item-<?=$slug?>">
          <div class="point-item__title point-item-<?=$slug?>__title">
            <img src="<?= esc_url( get_template_directory_uri() ); ?>/dist/images/bank-cardloan/point-midashi<?= $key ?>-sp.svg" alt="" width="100" height="100" loading="lazy">
            
          </div>
          <div class="point-item__text point-item-<?=$slug?>__text">
            <div class="textbox">
              <p>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/images/bank-cardloan/bank-cardloan-icon<?= $key ?>.svg" alt="" width="100" height="100" loading="lazy">
                <?= $information['text'] ?>
              </p>
            </div>
          </div>
        </li>

        <?php endforeach; ?>

      </ul>


  <?php endif;  ?>

  </div>



	</section>