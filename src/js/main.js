$(document).ready(function () {
  var $body = $('body');
  var $header = $('.is-header');
  var $navBtn = $('#navBtn');
  var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
  var isChrome = /Chrome/i.test(navigator.userAgent);
  var mq = $(window).width() < 1023;
  var $main = $('.main');

  $navBtn.click(function () {
    if ($header.hasClass('is-closing') && !$header.hasClass('is-active')) {
      return;
    }

    if ($header.hasClass('is-active')) {
      $header.removeClass('is-active');
      $body.removeClass('is-fixed');
      clearTimeout(s);
      var s = setTimeout(function () {
        $header.removeClass('is-closing');
      }, 1000);
    } else {
      $header.addClass('is-active');
      $header.addClass('is-closing');
      $body.addClass('is-fixed');
    }
  });

  function detectBrowser() {
    if (isSafari) {
      $body.addClass('isIos');
    } else if (isChrome && mq) {
      $body.addClass('isChrome');
    }
  }
  detectBrowser();

  function fullHeightBanner() {
    if ($body.hasClass('isChrome')) {
      $main.css({ height: window.innerHeight });
    }
  }
  fullHeightBanner();

  var figure = $('.with-video-bg ');
  var vid = figure.find('video');

  [].forEach.call(figure, function (item, index) {
    item.addEventListener('mouseover', hoverVideo.bind(item, index), false);
    item.addEventListener('mouseout', hideVideo.bind(item, index), false);
  });

  function hoverVideo(index, e) {
    // todo
    if (!vid[index].currentTime > 0) {
      vid[index].play();
    }
  }

  function hideVideo(index, e) {
    vid[index].pause();
    vid[index].currentTime = 0;
  }
});

$(document).on('click', 'a[href^="#"]', function (event) {
  event.preventDefault();

  $('html, body').animate(
    {
      scrollTop: $($.attr(this, 'href')).offset().top,
    },
    500
  );
});

var body = document.body;
var timer;

window.addEventListener(
  'scroll',
  function () {
    clearTimeout(timer);
    if (window.innerWidth >= 1100 && !body.classList.contains('disable-hover')) {
      // body.classList.add('disable-hover');
    }

    timer = setTimeout(function () {
      body.classList.remove('disable-hover');
    }, 100);
  },
  false
);
