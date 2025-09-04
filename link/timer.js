
document.addEventListener('DOMContentLoaded', function() {
  countDown();
  setInterval(countDown, 1000);
});


function countDown() {
  let startDateTime = new Date();
  let endDateTime = new Date("06/06/2080 21:00:00");
  let left = endDateTime - startDateTime;
  let a_day = 24 * 60 * 60 * 1000;

  // var d = Math.floor(left / a_day)
  let h = Math.floor((left % a_day) / (60 * 60 * 1000));
  let m = Math.floor((left % a_day) / (60 * 1000)) % 60;
  let s = Math.floor((left % a_day) / 1000) % 60 % 60;

  if(h < 10) {
    h = '0' + h;
  }
  if(m < 10) {
    m = '0' + m;
  }
  if(s < 10) {
    s = '0' + s;
  }

  let timerTitle = document.querySelector(".timer-group .timer-title");
  let countdown = document.querySelector(".countdown");

  if(h >= 21 && h <= 24) {
    // if(h >= 7) {
    timerTitle.innerHTML = `翌営業日中に<br>借り入れるなら`;
  } else {
    timerTitle.innerHTML = `本日借り入れるなら`;
  }
  
  countdown.style.visibility = 'visible';
  countdown.innerHTML = h + '<span class="normal">:</span>' + m + '<span class="normal">:</span>' + s;
}