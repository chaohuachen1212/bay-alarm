(function($) {


  $(window).load(function() {
    if ( $('#hiw-subnav').length ) {
      // ============================================================================
      // Responsive Subnav
      // ============================================================================
      function alignMenu() {
        var w = 0;
        var mw = $("#hiw-subnav").width() - 150;
        var i = -1;
        var menuhtml = '';
        jQuery.each($("#hiw-subnav").children(), function() {
          i++;
          w += $(this).outerWidth(true);
          if (mw < w) {
            menuhtml += $('<div>').append($(this).clone()).html();
            $(this).remove();
          }
        });

        $("#hiw-subnav").append(
          '<li  style="position:relative;" href="#" class="hideshow">' + '<a href="#">more ' + '<span style="font-size:13px">&#8595;</span>' + '</a><ul>' + menuhtml + '</ul></li>');

        $("#hiw-subnav li.hideshow ul").css("top",
          $("#hiw-subnav li.hideshow").outerHeight(true) + "px");

        $("#hiw-subnav li.hideshow").click(function() {
          $(this).children("ul").toggle();
        });
      }

      var tabletL =  1024;
      if ( $(window).width() <= tabletL ) {
        alignMenu();
      }

      $(window).resize(function() {
        $("#hiw-subnav").append($("#hiw-subnav li.hideshow ul").html());
        $("#hiw-subnav li.hideshow").remove();

        if ( $(window).width() <= tabletL ) {
          alignMenu();
        }
      });
    } // end if $('#hiw-subnav').length()


    //
    // if ( $('.hiw-page').length ) {
    //   // ============================================================================
    //   // Waypoints - Products Section
    //   // ============================================================================
    //   function wpProductsSec(element, number) {
    //     element.waypoint(function(direction) {
    //       element.toggleClass('is-active');
    //     },{ offset:'50%' });
    //   }
    //
    //   var $targetEles = $(".hiw-products-sec .col-wrap");
    //
    //   for (var i=0; i < $targetEles.length; i++) {
    //     var productSection = $($targetEles[i]);
    //     wpProductsSec(productSection, i);
    //   }
    // } // end if $('.hiw-page').length()


  });

  $('.hiw-video-sec .video-img').on('click', function() {
    var embedURL = $(this).data('videosrc');
    $(this).parents('.hiw-video-sec').addClass('is-active');
    $(this).parents('.hiw-video-sec').find('iframe').attr('src', embedURL + '?autoplay=1&modestbranding=1&rel=0&controls=0&showinfo=0');
  }).on('keyup', function(e){
    if (e.keyCode === 13 || e.keyCode === 32) {
      e.preventDefault();
      $(this).click();
    }
  });

  $('.hiw-video-sec .video-vimeo').on('click', function() {
    var embedURL = $(this).data('videosrc');
    $(this).parents('.hiw-video-sec').addClass('is-active');
    $(this).parents('.hiw-video-sec').find('iframe').attr('src', embedURL);
  }).on('keyup', function(e){
    if (e.keyCode === 13 || e.keyCode === 32) {
      e.preventDefault();
      $(this).click();
    }
  });

  function reviewTestimonial(){
    var railNavItems = $('.hiw-review-sec .img-wrap .img');
    var quotes = $('.hiw-review-sec .testimonial-wrap');
    var active = 'is-active';

    railNavItems.each(function(){
      $(this).hasClass(active) ?
      $(this).attr('aria-selected', 'true') :
      $(this).attr('aria-selected', 'false');
    });

    quotes.each(function() {
      $(this).hasClass(active) ?
      $(this).attr('aria-selected', 'true') :
      $(this).attr('aria-selected', 'false');
    });

    railNavItems.click(function(){
      var currentIndex = $(this).index();

      railNavItems.attr('aria-selected', 'false');
      railNavItems.eq(currentIndex).attr('aria-selected', 'true');

      quotes.attr('aria-selected', 'false');
      quotes.eq(currentIndex).attr('aria-selected', 'true');

      railNavItems.removeClass('is-active');
      $(this).addClass('is-active');
      quotes.removeClass('is-active');
      quotes.eq(currentIndex).addClass('is-active');

    }).on('keyup', function(e){
      if (e.keyCode === 13 || e.keyCode === 32) {
        e.preventDefault();
        $(this).click();
      }
    });
  }

  reviewTestimonial();

  $(document).ready(function(){

    function tabOrder() {
      // use this tabindex method with extreme caution!
      // it's recommended avoiding tabindices with values
      // greater than 0 and less than -1, but in this case it will affect logical
      // tab order whe using flex-direction: row-reverse

      $('.hiw-video-sec:first-child .btn-outline').attr('tabindex', '1');
      $('.hiw-video-sec:first-child .col.video-col .video-img').attr('tabindex', '2');

      $('.hiw-video-sec:nth-child(2) .btn-outline').attr('tabindex', '4');
      $('.hiw-video-sec:nth-child(2) .col.video-col .video-vimeo').attr('tabindex', '3');

      $('.hiw-video-sec:nth-child(3) .col.video-col .hiw-sec-btn').attr('tabindex', '5');

    }

    tabOrder();

    if ($('.rplg-slider').length) {
      var $navBtns = $('.rplg-slider-prev, .rplg-slider-next');

      $navBtns.attr('tabindex', '0').attr('role', 'button').on('keyup', function(e){
          if (e.keyCode === 13 || e.keyCode === 32) {
            e.preventDefault();
            $(this).click();
          } // if keyCode
      }); // keyup
    } // if length

  }); // document


  // check for the load more button injected by instagram feed plugin
  // and add tabindex and button role
  if ($('.sbi_load_btn').length) {
    $('.sbi_load_btn').attr('tabindex', '0').attr('role', 'button');
  }

}(jQuery));
