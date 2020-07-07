var tablet = window.innerWidth >= 767;
var laptop = window.innerWidth >= 1140;
var desktop = window.innerWidth >= 1440;
var _hd = window.innerWidth >= 1700;
var _2k = window.innerWidth >= 2000;

var wow = new WOW({
  mobile: true,
  offset: 50,
});

wow.init();

$(document).ready(function () {
  var $header = $(".is-header");
  var $body = $("body");
  var $navBtn = $("#navBtn");
  var $main = $(".is-main");
  var $footer = $("#footer");

  var startTimeout = 1500;
  var videoWrapper = $("#splashVideo");
  var video = $("#splashVideo video").get(0);
  // var md = new MobileDetect(window.navigator.userAgent);

  $("#splashVideo video").hide();

  // if (!!md.phone()) {
  //   var video = $('#splashVideo .splash_phone').get(0)
  // } else if (!!md.tablet()) {
  //   var video = $('#splashVideo .splash_tablet').get(0)
  // } else {
  //   var video = $('#splashVideo .splash_laptop').get(0)
  // }
  if (laptop) {
    $(video).show();
  }
  function preloaderTransitionEnd() {
    var el = document.getElementById("preloading");

    var fnHide = function () {
      el.style.display = "none";
      el.removeEventListener("transitionend", fnHide);
    };

    var hidePreloader = function () {
      el.addEventListener("transitionend", fnHide);
      el.classList.add("is-hidden");
      document
        .querySelector("body")
        .classList.remove("overflow-hidden");
    };

    if (laptop && localStorage.getItem("video_showed") !== "true") {
      if (videoWrapper.length) {
        videoWrapper.show();
        $body.addClass("video-is-playing");
        $body.addClass("overflow-hidden");
        var videoInterval = setInterval(function () {
          if (video.readyState >= 3) {
            hidePreloader();
            video.play();
            localStorage.setItem("video_showed", "true");
            clearInterval(videoInterval);
          }
        }, 5);

        video.addEventListener("ended", function () {
          jQuery("#splashVideo").fadeOut();
          $body.removeClass("overflow-hidden");
          $body.removeClass("video-is-playing");
        });
      }
    } else {
      hidePreloader();
    }
  }
  $(".is-logo").click(function (e) {
    localStorage.removeItem("video_showed");
    window.location.href = "/";
  });

  setTimeout(preloaderTransitionEnd, startTimeout);

  var $header = $(".is-header");
  var $body = $("body");
  var $navBtn = $("#navBtn");
  var $main = $(".is-main");
  var $footer = $("#footer");

  // if (!laptop) {
  // $(".fadeInUp").removeClass("fadeInUp");
  // $(".wow").removeClass("wow");
  // }

  // change logo colors
  if ($(document).scrollTop() > 20) {
    $header.addClass("is-scrolled");
  }

  $(window).scroll(function () {
    if ($(document).scrollTop() > 20) {
      $header.addClass("is-scrolled");
    } else {
      $header.removeClass("is-scrolled");
    }
  });

  // navigation
  $navBtn.click(function () {
    if (
      $header.hasClass("is-closing") &&
      !$header.hasClass("is-active")
    ) {
      return;
    }

    if ($header.hasClass("is-active")) {
      closeNavigation();
    } else {
      $header.addClass("is-active");
      $header.addClass("is-closing");
      $body.addClass("is-nav-opened");
      $body.addClass("nav-anim-running");

      clearTimeout(n);
      var n = setTimeout(function () {
        $body.removeClass("nav-anim-running");
      }, 1500);
    }
  });

  $(".navigation-link__footer").click(function () {
    closeNavigation();
  });

  function closeNavigation() {
    $header.removeClass("is-active");
    $body.removeClass("is-nav-opened");
    clearTimeout(s);
    var s = setTimeout(function () {
      $header.removeClass("is-closing");
    }, 1500);
  }

  // video playing on hover
  var figure = $(".with-video-bg ");
  var vid = figure.find("video");

  [].forEach.call(figure, function (item, index) {
    item.addEventListener(
      "mouseover",
      hoverVideo.bind(item, index),
      false
    );
    item.addEventListener(
      "mouseout",
      hideVideo.bind(item, index),
      false
    );
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

  // hover animations catalog
  var catalogProjects = $(".is-catalog__project");

  // expand text
  var aboutTextDescription = $(".is-block__expanded-description");
  var aboutExpandToggler = $(".is-block__expanded-toggler");

  function expandText() {
    if ($(".is-block__expanded-description > *").length <= 1) {
      aboutExpandToggler.hide();
    } else {
      var aboutFirstHeight = $(
        ".is-block__expanded-description p:nth-child(1)"
      ).outerHeight();
      var aboutExpandedHeight = aboutFirstHeight;

      aboutTextDescription.css("maxHeight", aboutExpandedHeight);

      var totalHeight = 0;

      aboutTextDescription.children().each(function () {
        totalHeight = totalHeight + $(this).outerHeight(true);
      });

      aboutExpandToggler.click(function () {
        if (aboutTextDescription.hasClass("is-expanded")) {
          aboutTextDescription.css("maxHeight", aboutExpandedHeight);
        } else {
          aboutTextDescription.css("maxHeight", totalHeight);
        }

        aboutTextDescription.toggleClass("is-expanded");
      });
    }
  }

  expandText();

  // expand credits
  var credit = $(".is-credit");
  var creditToggler = $(".is-credit__toggler");
  var creditWrapper = $(".is-credit__wrapper");
  var creditContent = $(".is-credit__content");

  creditToggler.click(function () {
    if (!credit.hasClass("is-expanded")) {
      creditContent.css("maxHeight", creditWrapper.outerHeight());
    } else {
      creditContent.css("maxHeight", 0);
    }

    credit.toggleClass("is-expanded");
  });

  // video in modal
  var videoModal = $(".is-block__video");
  var videoIframe = $(".is-block__video iframe");

  videoModal.click(function () {
    $(this).addClass("is-active");
    $body.addClass("overflow-hidden");
    // console.log("1", $(this).find("iframe"));
    // $(this).find("iframe").src;
    console.log("1", $(this).find("iframe").attr("src"));

    var src = $(this).find("iframe").attr("src");
    var newSrc = src + "&autoplay=1";

    $(this).find("iframe").attr("src", newSrc);
  });

  var videoOverlay = $(".is-block__video-overlay");
  var buttonModalClose = $(".close-modal-btn");

  function closeModal(e) {
    e.stopPropagation();
    videoModal.removeClass("is-active");
    $body.removeClass("overflow-hidden");

    videoIframe.each(function () {
      var el_src = $(this).attr("src");
      $(this).attr("src", el_src);
    });
  }

  videoOverlay.click(function (e) {
    closeModal(e);
  });

  buttonModalClose.click(function (e) {
    closeModal(e);
  });

  // carousel
  var slider = $(".is-slider");
  if (slider.length) {
    slider.slick({
      infinite: true,
      speed: 1000,
      autoplay: true,
      autoplaySpeed: 4000,
      prevArrow: $(".slider-prev"),
      nextArrow: $(".slider-next"),
      cssEase: "cubic-bezier(0.9, 0.06, 0.68, 0.99)",

      // cssEase: "ease-in",
    });
  }

  // add copyright year
  $(".is-copyright span").text(new Date().getFullYear());

  // add header transparent to specific pages
  var pagesHeader = [
    $(".is-homepage"),
    $(".is-director__page"),
    $(".is-creative__page"),
    $(".is-post__page"),
  ];

  for (var i = 0; i < pagesHeader.length; i++) {
    if (pagesHeader[i].length) {
      $header.addClass("header-transparent");
    }
  }

  // disable logo title for specific pages
  var pagesLogo = [
    $(".is-about__page"),
    $(".is-post__page"),
    $(".is-project__page"),
  ];
  var logoName = $(".is-logo__name");

  for (var i = 0; i < pagesLogo.length; i++) {
    if (pagesLogo[i].length) {
      logoName.hide();
      $header.addClass("with-white-logo");
    }
  }

  // main link animation
  var mainPage = $("#mainPage");
  var creativeLink = $("#creativeLink");
  var directorLink = $("#directorLink");
  var homepageLinkFromCreative = $("#homepageLinkFromCreative");
  var homepageLinkFromDirector = $("#homepageLinkFromDirector");

  var creativeLinkBottom = $("#creativeLinkBottom");
  var directorLinkBottom = $("#directorLinkBottom");
  var homepageLinkFromCreativeBottom = $(
    "#homepageLinkFromCreativeBottom"
  );
  var homepageLinkFromDirectorBottom = $(
    "#homepageLinkFromDirectorBottom"
  );

  // hover homepage main links
  function mainLinksHover(el, className) {
    if (laptop) {
      el.hover(
        function () {
          mainPage.addClass("main-hovered " + className);
        },
        function () {
          mainPage.removeClass("main-hovered");
          mainPage.removeClass(className);
        }
      );
    }
  }

  mainLinksHover(directorLink, "dir-hovered");
  mainLinksHover(creativeLink, "creative-hovered");
  mainLinksHover(homepageLinkFromCreative, "dir-hovered");
  mainLinksHover(homepageLinkFromDirector, "creative-hovered");

  var logoName = $(".is-logo__name");

  if (laptop) {
    $(window).scroll(function () {
      if ($(document).scrollTop() > $(window).height() / 2) {
        $(".is-mainpage__content").addClass("unblocked");
      } else {
        $(".is-mainpage__content").removeClass("unblocked");
      }
    });
  }

  $(".is-creative__content").hide();
  $(".is-director__content").hide();
  $(".is-homepage__content").hide();

  if (
    mainPage.length &&
    mainPage.not(".is-director__page.is-creative__page")
  ) {
    $(".is-homepage__content").show();
  }

  function renderTimeout() {
    if (laptop) {
      return 750;
    } else {
      return 1000;
    }
  }

  function creativeAnimation() {
    mainPage.addClass("is-creative__page");
    mainPage.removeClass("is-homepage-from-creative");
    logoName.addClass("without-opacity");
    mainPage.addClass("is-animating");
    $footer.addClass("is-footer__white");

    wow.init();

    clearTimeout(cc);
    var cc = setTimeout(function () {
      $(".is-homepage__content").hide();
      $(".is-creative__content").show();
      $(".is-director__content").hide();
    }, renderTimeout());

    clearTimeout(c);
    var c = setTimeout(function () {
      mainPage.removeClass("is-animating");
    }, 1600);
  }

  function directorAnimation() {
    mainPage.addClass("is-director__page");
    mainPage.removeClass("is-homepage-from-creative");
    logoName.addClass("without-opacity");
    mainPage.addClass("is-animating");
    $footer.addClass("is-footer__black");
    $body.addClass("dark-bg");

    wow.init();

    clearTimeout(dc);
    var dc = setTimeout(function () {
      $(".is-homepage__content").hide();
      $(".is-creative__content").hide();
      $(".is-director__content").show();
    }, renderTimeout());

    clearTimeout(d);
    var d = setTimeout(function () {
      mainPage.removeClass("is-animating");
    }, 1600);
  }

  function fromCreativeAnimation() {
    mainPage.removeClass("is-creative__page");
    mainPage.addClass("is-homepage-from-creative");
    mainPage.addClass("is-animating");
    $footer.removeClass("is-footer__white");
    logoName.removeClass("without-opacity");

    wow.init();

    clearTimeout(chc);
    var chc = setTimeout(function () {
      $(".is-homepage__content").show();
      $(".is-creative__content").hide();
      $(".is-director__content").hide();
    }, renderTimeout());

    clearTimeout(ch1);
    var ch1 = setTimeout(function () {
      mainPage.removeClass("is-animating");
    }, 1600);

    clearTimeout(ch2);
    var ch2 = setTimeout(function () {
      mainPage.removeClass("is-homepage-from-creative");
    }, 2000);
  }

  function fromDirectorAnimation() {
    mainPage.removeClass("is-director__page");
    mainPage.addClass("is-homepage-from-director");
    mainPage.addClass("is-animating");
    $footer.removeClass("is-footer__black");
    logoName.removeClass("without-opacity");
    $body.removeClass("dark-bg");

    wow.init();

    clearTimeout(dhc);
    var dhc = setTimeout(function () {
      $(".is-homepage__content").show();
      $(".is-creative__content").hide();
      $(".is-director__content").hide();
    }, renderTimeout());

    clearTimeout(dh1);
    var dh1 = setTimeout(function () {
      mainPage.removeClass("is-animating");
    }, 1600);

    clearTimeout(dh2);
    var dh2 = setTimeout(function () {
      mainPage.removeClass("is-homepage-from-director");
    }, 2000);
  }

  if (mainPage.length) {
    $footer.addClass("is-translated");

    creativeLink.click(function () {
      creativeAnimation();
    });

    creativeLinkBottom.click(function () {
      if (!laptop) {
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          500
        );
        creativeAnimation();
      } else {
        $body.addClass("bottom-nav-is-animating");
        $body.addClass("from-bottom-creative");

        clearTimeout(cb1);
        var cb1 = setTimeout(function () {
          $(window).scrollTop(0);
          creativeAnimation();
          $body.removeClass("bottom-nav-is-animating");
        }, 700);

        clearTimeout(cb2);
        var cb2 = setTimeout(function () {
          $body.removeClass("from-bottom-creative");
        }, 2000);
      }
    });

    directorLink.click(function () {
      directorAnimation();
    });

    directorLinkBottom.click(function () {
      if (!laptop) {
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          500
        );
        directorAnimation();
      } else {
        $body.addClass("bottom-nav-is-animating");
        $body.addClass("from-bottom-director");

        clearTimeout(db1);
        var db1 = setTimeout(function () {
          $(window).scrollTop(0);
          directorAnimation();
          $body.removeClass("bottom-nav-is-animating");
        }, 700);

        clearTimeout(db2);
        var db2 = setTimeout(function () {
          $body.removeClass("from-bottom-director");
        }, 2000);
      }
    });

    homepageLinkFromCreative.click(function () {
      fromCreativeAnimation();
    });

    homepageLinkFromCreativeBottom.click(function () {
      if (!laptop) {
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          500
        );
        fromCreativeAnimation();
      } else {
        $body.addClass("bottom-nav-is-animating");
        $body.addClass("from-bottom-creative-to-homepage");

        clearTimeout(cb1);
        var cb1 = setTimeout(function () {
          $(window).scrollTop(0);
          fromCreativeAnimation();
          $body.removeClass("bottom-nav-is-animating");
        }, 650);

        clearTimeout(cb2);
        var cb2 = setTimeout(function () {
          $body.removeClass("from-bottom-creative-to-homepage");
        }, 2000);
      }
    });

    homepageLinkFromDirector.click(function () {
      fromDirectorAnimation();
    });

    homepageLinkFromDirectorBottom.click(function () {
      if (!laptop) {
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          500
        );
        fromDirectorAnimation();
      } else {
        $body.addClass("bottom-nav-is-animating");
        $body.addClass("from-bottom-director-to-homepage");

        clearTimeout(dh1);
        var dh1 = setTimeout(function () {
          $(window).scrollTop(0);
          fromDirectorAnimation();
          $body.removeClass("bottom-nav-is-animating");
        }, 800);

        clearTimeout(db2);
        var db2 = setTimeout(function () {
          $body.removeClass("from-bottom-director-to-homepage");
        }, 2000);
      }
    });

    if (!laptop) {
      creativeLink.touchwipe({
        wipeRight: function () {
          if ($(".is-creative__page").length) {
            return;
          }

          if ($(".is-director__page").length) {
            fromDirectorAnimation();
          } else {
            creativeAnimation();
          }
        },

        wipeLeft: function () {
          if ($(".is-creative__page").length) {
            fromCreativeAnimation();
          } else {
            return;
          }
        },

        min_move_x: 20,
        min_move_y: 20,
        preventDefaultEvents: true,
      });

      directorLink.touchwipe({
        wipeLeft: function () {
          if ($(".is-director__page").length) {
            return;
          }

          if ($(".is-creative__page").length) {
            fromCreativeAnimation();
          } else {
            directorAnimation();
          }
        },

        wipeRight: function () {
          if ($(".is-director__page").length) {
            fromDirectorAnimation();
          } else {
            return;
          }
        },

        min_move_x: 20,
        min_move_y: 20,
        preventDefaultEvents: true,
      });
    }
  }

  if (
    $(window).scrollTop() + $(window).height() / 2 >
    $(document).height()
  ) {
    $(".is-navigation").addClass("contact-is-active");
  }

  // contact active
  $(window).scroll(function () {
    if (
      $(window).scrollTop() + $(window).height() / 2 >
      $(document).height() - $(window).height()
    ) {
      $(".is-navigation").addClass("contact-is-active");
    } else {
      $(".is-navigation").removeClass("contact-is-active");
    }
  });
});

// smooth scrolling to anchors
$(document).on("click", 'a[href^="#"]', function (event) {
  event.preventDefault();

  if (window.innerWidth > 1140) {
    $("html, body").animate(
      {
        scrollTop: $($.attr(this, "href")).offset().top,
      },
      1500
    );
  } else {
    $("html, body").animate(
      {
        scrollTop: $($.attr(this, "href")).offset().top,
      },
      10
    );
  }
});

// prevent instantaneous hover
// var body = document.body;
// var timer;

// window.addEventListener(
//   'scroll',
//   function () {
//     clearTimeout(timer);
//     if (laptop && !body.classList.contains('disable-hover')) {
//       body.classList.add('disable-hover');
//     }

//     timer = setTimeout(function () {
//       body.classList.remove('disable-hover');
//     }, 50);
//   },
//   false
// );

// detect MACOS
var isMac = navigator.platform.toUpperCase().indexOf("MAC") >= 0;

if (!isMac) {
  document.querySelector("html").classList.add("custom-scroll");
}

// right mouse click
// document.addEventListener("contextmenu", function () {
//   event.preventDefault();
// });
