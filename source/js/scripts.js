$(document).ready(function () {

  // афиша слайдер внизу
  var callboardThumbs = new Swiper('.js-callboard-thumbs', {

    breakpoints: {
      320: {
        spaceBetween: 20,
        slidesPerView: 2,
        direction: 'vertical',
      },

      500: {
        spaceBetween: 10,
        slidesPerView: 2,
        direction: 'horizontal',
      },

      640: {
        slidesPerView: 3,
      },
    },
    navigation: {
      nextEl: '.callboard__next',
      prevEl: '.callboard__prev',
    },
  });

  if ($('.js-desc-page').length) {
    // фон афиши
    var galleryTop = new Swiper('.js-desc-page', {
      spaceBetween: 10,
      slidesPerView: 1,
      effect: 'fade',
      allowTouchMove: false,
      // cssMode: true,

      fadeEffect: {
        crossFade: true
      },

      thumbs: {
        swiper: callboardThumbs
      },

      on: {
        slideChange: function () {
          // выбор картинки со слайда на фон
          $('.js-page-main').css('background-image', 'url(' + $(".js-desc-page-item").get(this.activeIndex).dataset.imgPath + ')');
        },
      },
    });

    $('.js-page-main').css('background-image', 'url(' + $(".js-desc-page-item").get(0).dataset.imgPath + ')');
    galleryTop.slideTo($('[data-url="' + window.location + '"]').data('index'))
  }

  // меню мобила
  function resize() {
    const menu = $('.js-list');
    const container = $('.js-container');
    // проерка условий какое окно сейчас
    if ($(window).width() < 929) {
      menu.css({'display': 'none'});
      container.addClass('mobile');
    } else {
      menu.css({'display': 'block'});
      container.removeClass('mobile');
    }
  }
  resize();

  $(window).resize(function () {
    resize();
  });

// добавляем класс в зависимоти от ширины в меню
  $('.js-toggle').click(function () {
    const element = $('.js-list');
    const display = element.css('display');

    if (display == 'none')
      $('.js-list').slideDown(400);

    if (display == 'block')
      $('.js-list').slideUp(400);
  });

  $('.js-list a').click(function () {
    if ($(window).width() < 929)
      $('.js-list').slideUp(400);
  });


  // скрыть/показать кнопка подробнее
  $('.js-btn').click(function(){
    $(".detailed").toggleClass("detailed--closed detailed--opened");
    $(".callboard").toggleClass("callboard--opened callboard--closed");
    $(".date").toggleClass("date--opened date--closed");
    $(".page-event__desc").toggleClass("page-event__desc--opened page-event__desc--closed");
    $(".page-event__text").toggleClass("page-event__text--closed page-event__text--opened");
    $(".page-event__btn").toggleClass("page-event__btn--closed page-event__btn--opened");
  });

// добалвяем класс в меню a
  $('.js-list ul li a').addClass('main-nav__link');
});
