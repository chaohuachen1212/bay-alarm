
(function($) {

  // Mobile: Pricing Table
  // ============================================================================
  function pricingMobile() {
    var $container = $('.p-pricetable-m'),
        $pricingSlider = $('.pricing-slider'),
        $featureName = $container.find('.feature-name'),
        $featuresToggle = $('.plan-sec-toggle');


    // Detect mobile screen
    // ------------------------------------------------
    // var mobileProdNav = function() {
    //   var prodButton = $('.pricing-nav-item');
    //
    //   prodButton.click(function() {
    //     if ($pricingSlider.is(':visible')) {
    //       var index = $(this).index();
    //       $pricingSlider.slick('slickGoTo', index, false);
    //     }
    //   });
    // };

    // mobileProdNav();

    // Mobile Nav
    // ------------------------------------------------
    function pricingMoibleNav() {
      var priceNavItems = $('.pricing-nav a.pricing-nav-item');
      var proWrap = $('.p-pricetable-m .prod-container');
      var hash = window.location.hash;

      priceNavItems.each(function(){
        var $thisAtr = $(this).attr('href');

        if ($thisAtr===hash) {
          priceNavItems.removeClass('is-active');
          var thisIndex =$(this).index();
          $(this).addClass('is-active');
          proWrap.eq(thisIndex).addClass('is-active');
        }
      });


      if(hash==='') {
        priceNavItems.removeClass('is-active');
        proWrap.removeClass('is-active');
        priceNavItems.eq(0).addClass('is-active');
        proWrap.eq(0).addClass('is-active');
      }

      function mobileNavPricingSlider() {
        var mobilePriceSlider = $('.p-pricetable-m .prod-container.is-active .plan-sec-wrap');

        mobilePriceSlider.slick({
          dots: true,
          arrows: false,
          infinite: false,
          speed: 300,
          slidesToShow: 1,
          centerMode: true,
          centerPadding: '20%',
        });

      }

      mobileNavPricingSlider();

      // $(window).resize(function() {
      //
      //   var mobilePriceSlider = $('.p-pricetable-m .prod-container .plan-sec-wrap');
      //
      //   mobilePriceSlider.slick('resize');
      //
      // });

     // $(window).resize(function(){
     //    var theWwidth = $(window).width();
     //    console.log();
     //    if (theWwidth < 900) {
     //      mobileNavPricingSlider();
     //    }
     //  });

      function findMaxHeight() {

        var allRows = $('.p-pricetable-m .prod-container.is-active .dividing-sec');
        var max = -1;
        allRows.each(function() {
          var h = $(this).height();
          max = h > max ? h : max;
        });
          allRows.css("height", + max + "px");
      }

      findMaxHeight();

      //
      // function findMaxWidth() {
      //
      //   var allRows = $('.p-pricetable-m .prod-container .dividing-sec');
      //   var max = -1;
      //   allRows.each(function() {
      //     var w = $(this).width();
      //     max = w > max ? w : max;
      //
      //   });
      //     allRows.css("min-width", + max + "px");
      // }
      //
      // findMaxWidth();


      priceNavItems.click(function(){
        var currentIndex = $(this).index();
        proWrap.removeClass('is-active');
        proWrap.eq(currentIndex).addClass('is-active');
        mobileNavPricingSlider();
        findMaxHeight();
      });


    }

    pricingMoibleNav();


    // split price
    // ------------------------------------------------
    var splitPrice = function(selector) {
      var price = selector.find('.whole-price').data('price');
      selector.find('.whole-price .price').text(price);
    }


    // select each 'plan section'
    // ------------------------------------------------
    for (var a=0; a < $container.find(".prod-container").length; a++ ) {
      // loop thru product container
      var conatinerSelector = $($container.find(".prod-container")[a]);

      // loop thru plan sections under product container
      for (var b=0; b < conatinerSelector.find(".plan-sec").length; b++) {
        var planSec = $(conatinerSelector.find(".plan-sec")[b]);
        splitPrice(planSec);
      }
    }

    // function priceMobileSlider() {
    //   var activeeSlideIndex = $('.pricing-nav-item.is-active').index();
    //   var slide = 0;
    //
    //   if(activeeSlideIndex === 1){
    //     slide = 1;
    //   }else if(activeeSlideIndex===2){
    //     slide = 2;
    //   }else{
    //     slide = 0;
    //   }
    //
    //   $pricingSlider.slick({
    //     dots: false,
    //     arrows: false,
    //     infinite: true,
    //     speed: 300,
    //     slidesToShow: 1,
    //     adaptiveHeight: true,
    //     initialSlide: slide
    //   });
    // }

    // priceMobileSlider();


    // function checkHideCol() {
    //   var theIndex = $('.pricing-nav-item.is-active').index();
    //   var theHiddenSec = $('.pricing-nav-item.is-active').data("hidecol");
    //   var navIndex = theHiddenSec - 1;
    //
    //   if ( theHiddenSec ) {
    //     $('.prod-container.slick-slide.slick-current.slick-active').find('.dividing-sec:nth-child(' + theHiddenSec +')').hide();
    //     $('.prod-container.slick-slide.slick-current.slick-active').find('.mobile-plan-nav a:nth-child(' + navIndex +')').hide();
    //   }
    // }
    // checkHideCol();
    //
    // $pricingSlider.on('afterChange', function(event, slick, currentSlide, nextSlide) {
    //   $('.pricing-nav-item.is-active').removeClass('is-active');
    //   $('.pricing-nav-item').eq(currentSlide).addClass('is-active');
    //   checkHideCol();
    // });


    //
    // if (window.location.hash.length) {
    //   var hash = window.location.hash;
    //   if (hash.indexOf('#gps') > -1) {
    //     $pricingSlider.slick('slickGoTo', 1, false);
    //   } else if (hash.indexOf('#in-car') > -1) {
    //     $pricingSlider.slick('slickGoTo', 2, false);
    //   } else if (hash.indexOf('#bundle') > -1) {
    //     $pricingSlider.slick('slickGoTo', 3, false);
    //   }
    // }

    var $mobileInfoToggle = $('.m-exclamation-btn');

    $mobileInfoToggle.on('click', function() {
      if ($(this).hasClass('is-active')) {
        $(this).removeClass('is-active');
        $(this).parent().siblings('.feature-row-info').removeClass('is-active');
      } else {
        $mobileInfoToggle.removeClass('is-active');
        $('.feature-row-info').removeClass('is-active');
        $(this).addClass('is-active');
        $(this).parent().siblings('.feature-row-info').addClass('is-active');
      }
    });
  }

  if ( $('.p-pricetable-m').length ) {
    pricingMobile();
  }

}(jQuery));
