(function($) {

  $(document).ready(function(){
    $('.smart-watch--section .sw-r-col').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      speed: 300,
      asNavFor: '.sw-l-col'
    });

    $('.smart-watch--section .sw-l-col').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.sw-r-col',
      dots: true,
      arrows: true,
      speed: 300,
      centerMode: !0,
      centerPadding: '0px'
    });
  });

  function addPrevNextClass() {
    $('.smart-watch--section .sw-l-col')
    .on('afterChange init', function(event, slick, direction){
        // remove focus from text
        $('.copy').attr('tabindex', '-1');

        // remove all prev/next
        $('.img-wrap.slick-slide').removeClass('prevSlide').removeClass('nextSlide');
        // find current slide
        for (var i = 0; i < slick.$slides.length; i++)
        {
            var $slide = $(slick.$slides[i]);
            if ($slide.hasClass('slick-current')) {
                // update DOM siblings
                $slide.prev().addClass('prevSlide');
                $slide.next().addClass('nextSlide');
                break;
            }
        }
      }
    )
    .on('beforeChange', function(event, slick) {
        // remove all prev/next
        $('.img-wrap.slick-slide').removeClass('prevSlide').removeClass('nextSlide').removeClass('hide');
    })
  }

  function activeSmartWatch(){
    $('div[aria-hidden="true"][tabindex="0"]').addClass('hide');
    $('.slick-next.slick-arrow').attr('aria-label', 'Next button for Smartwatch Features');
    $('.slick-prev.slick-arrow').attr('aria-label', 'Previous button for Smartwatch Features');
    $('.copy').attr('tabindex', '-1');
    $('.slick-dots li button').attr('role', 'button');
    var theNumberSlide = $('.img-wrap.slick-slide');
    // find current slide
    for (var i = 0; i < theNumberSlide.length; i++){
      var $slide = $(theNumberSlide[i]);
      if ($slide.hasClass('slick-current')) {
          // update DOM siblings
          $slide.prev().addClass('prevSlide');
          $slide.next().addClass('nextSlide');
          break;
      }
    }
  }

  $(document).ready(function(){
    if($('body').is('.smart-watch')) {
      addPrevNextClass();
      activeSmartWatch();
    }
  });

  function specificationsClick(){
    var navItem = $('.smartwatch--specifications .list-wrap .item');
    var imgs = $('.smartwatch--specifications .r-col img');

    navItem.each(function(){
      $(this).hasClass('is-active') ?
      $(this).attr('aria-selected', 'true') :
      $(this).attr('aria-selected', 'false');
    }).on('keyup', function(e) {
      if (e.keyCode === 13 || e.keyCode === 32) {
        e.preventDefault();
        $(this).click();
      }
    });

    imgs.each(function(){
      $(this).hasClass('is-active') ?
      $(this).attr('aria-hidden', 'false') :
      $(this).attr('aria-hidden', 'true');
    });

    navItem.click(function(){
      var currentIndex = $(this).index();

      imgs.attr('aria-hidden', 'true');
      imgs.eq(currentIndex).attr('aria-hidden', 'false');

      navItem.removeClass('is-active').attr('aria-selected', 'false');
      $(this).addClass('is-active').attr('aria-selected', 'true');
      imgs.removeClass('is-active');
      imgs.eq(currentIndex).addClass('is-active');
    });
  }
  specificationsClick();

  function specificationsSlideDown(){
    var navItem = $('.smartwatch--specifications .mobile-list-wrap .item-wrap');
    var images = $('.smartwatch--specifications .mobile-list-wrap .item-wrap img');

    navItem.click(function(){
      var current = $(this);
         images.removeClass('is-active');
         current.find('img').addClass('is-active');
    });
  }

  specificationsSlideDown();

  $('.smart-watch--form .swf--slider-wrap').slick({
    infinite: true,
    slidesToShow: 1,
    speed: 300,
    arrows: false,
    dots: true,
  });



  }(jQuery));
