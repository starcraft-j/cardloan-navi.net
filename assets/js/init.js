



document.addEventListener('DOMContentLoaded', () => {
	TimeDisplay.init();
	switchViewport();
	if (document.querySelector('.js-popup-ctt.-d')) dsmartPopup();
	if(document.querySelector('#section-modoru .modoru-group')) modoru();
	accordion();
	countdown();
  toRanking();
	setInterval('countdown()', 1000)
});



const viewport = document.querySelector('meta[name="viewport"]');

function switchViewport() {
	const value =
		window.outerWidth > 375
			? 'width=device-width,initial-scale=1'
			: 'width=375';
	if (viewport.getAttribute('content') !== value) {
		viewport.setAttribute('content', value);
	}
}
addEventListener('resize', switchViewport, false);



const TimeDisplay = {
  config: {
    selector: '.timer-speed .time',
    updateInterval: 60000 // 1分 = 60000ミリ秒
  },

  // 時刻のフォーマット
  formatTimeUnit(unit) {
    return unit.toString().padStart(2, '0');
  },

  // 現在時刻の取得とフォーマット
  getCurrentTime() {
    const now = new Date();
    return {
      hours: this.formatTimeUnit(now.getHours()),
      minutes: this.formatTimeUnit(now.getMinutes())
    };
  },

  updateDisplay() {
    const timeElement = document.querySelector(this.config.selector);
    if (!timeElement) return;

    const { hours, minutes } = this.getCurrentTime();
    timeElement.textContent = `${hours}:${minutes}`;
    timeElement.style.visibility = 'visible';
  },

  init() {
    this.updateDisplay();
    setInterval(() => this.updateDisplay(), this.config.updateInterval);
  }
};


function dsmartPopup() {
  const dButton = document.querySelectorAll('.js-popup');
  const dPopup = document.querySelector('.js-popup-ctt.-d');

  const closeBtn = document.querySelector('.js-popup-ctt__close.-d');
  const buttons = dPopup.querySelectorAll('button');
  const targets = dPopup.querySelectorAll('.js-popup-ctt__inner li');

  // CTAボタンクリック
  dButton.forEach(button => {
    button.addEventListener('click', function (e) {
      // 初期化
      targets.forEach(target => {
        target.classList.remove('active');
      })
      targets[0].classList.add('active');

      e.preventDefault();

      // ポップアップ表示
      dPopup.classList.add('open');
      if (dPopup.classList.contains('open')) {
        closeBtn.addEventListener('click', function () {
          dPopup.classList.remove('open');
        })
      }
    })
  })

  // YES or NO ボタンクリック
  buttons.forEach(button => {
    button.addEventListener('click', function (e) {
      console.log(e.target.getAttribute('data-target')); //2
      targets.forEach(target => {
        if (target.getAttribute('data-content') == e.target.getAttribute('data-target')) {
          target.classList.add('active');
        } else {
          target.classList.remove('active');
        }
      });
    });
  });

  // 前へボタンクリック
  const beforeBtn = document.querySelectorAll('.before');
  beforeBtn.forEach(btn => {
    btn.addEventListener('click', function (e) {
      targets.forEach(target => {
        target.classList.remove('active');
      })
      targets[0].classList.add('active');
    });
  });

}

function toRanking() {
  const toRankingBtn = document.querySelectorAll(".js-torank");
  const rankingCtt = document.querySelector("#modoru-target");

  toRankingBtn.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const targetPosition = rankingCtt.getBoundingClientRect().top + window.pageYOffset - 50;
      window.scrollTo({
        top: targetPosition,
        behavior: "smooth"
      });
    })
  })
} 


function accordion() {
  const accBtns = document.querySelectorAll('.accordion-btn');
  const accContents = document.querySelectorAll('.accodion-ctt'); // ←修正

  if (accBtns.length === 0 || accContents.length === 0) return;

  accBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      const arrow = this.querySelector('.arrow');
      if (arrow) arrow.classList.toggle('open');
      const next = this.nextElementSibling;
      if (next) next.classList.toggle('open');
    });
  });
}


function countdown() {
	var startDateTime = new Date();
	var endDateTime = new Date("06/06/2080 21:00:00")
	var left = endDateTime - startDateTime
	var a_day = 24 * 60 * 60 * 1000;

	// var d = Math.floor(left / a_day)
	var h = Math.floor((left % a_day) / (60 * 60 * 1000))
	var m = Math.floor((left % a_day) / (60 * 1000)) % 60
	var s = Math.floor((left % a_day) / 1000) % 60 % 60

	if (h < 10) {
		h = '0' + h;
	}
	if (m < 10) {
		m = '0' + m;
	}
	if (s < 10) {
		s = '0' + s;
	}
	// 要素の存在チェックを追加
	const fvImg = document.querySelector(".timer-top .timer-top__title img");
	const fvVideoImg = document.querySelector(".timer-top.video .timer-top__title img");
	const fvSubImg = document.querySelector(".timer-top .timer-top__title img");


	const rankTimerTitle = document.querySelectorAll(".p-ranking-item .timer .timer-title");
	const rankTimerVideoTitle = document.querySelectorAll(".p-ranking-item .item-timer.-video .timer .timer-title");



	const countdownElement = document.querySelectorAll(".countdown");

	if (h >= 21 && h <= 24) {
		// if(h >= 7) {
		if (fvImg) fvImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext-pm.svg';
		if (fvVideoImg) fvVideoImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext-video-pm.svg';
		if (fvSubImg) fvSubImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext-pm.svg';
		if (rankTimerTitle) rankTimerTitle.forEach(title => title.innerHTML = `翌営業日中に<br>借り入れるなら`);
	} else {
		if (fvImg) fvImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext.svg';
		if (fvVideoImg) fvVideoImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext-video.svg';
		if (fvSubImg) fvSubImg.src = 'https://cardloan-news.com/wp-content/themes/cardloan/images/fv-timer-subtext.svg';
		if (rankTimerTitle) rankTimerTitle.forEach(title => title.innerText = `本日借り入れるなら`);
		if (rankTimerVideoTitle) rankTimerVideoTitle.forEach(title => title.innerText = `本日現金を引き出すなら`);
	}

	if (countdownElement) {
		countdownElement.forEach(element => {
			element.style.visibility = 'visible';
			element.innerHTML = h + '<span class="normal">時間</span>' + m + '<span class="normal">分</span>' + s + '<span class="normal">秒</span>';
		});
	}
}