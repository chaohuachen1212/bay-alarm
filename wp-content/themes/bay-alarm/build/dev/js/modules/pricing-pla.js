(function($) {

  // Hero module slider
  /////////////////////////////
  var $plaNavImg = $('.pla-hero-nav a'),
      $plaImgPrev = $('.pla-hero-prev'),
      $plaImgNext = $('.pla-hero-next'),
      total = $plaNavImg.length,
      count = 1,
      fire = true;

  function plaHeroUpdate(index) {
    if (fire) {
      fire = false;
      $('[data-pla-item].is-active').removeClass('is-active');
      $('[data-pla-item="'+ index +'"]').addClass('is-active');
      count = index;

      setTimeout(function() {
        fire = true;
      }, 500);
    }
  }

  $plaImgPrev.on('click', function() {
    var current = (count === 1) ? total : count - 1;
    plaHeroUpdate(current);
  });

  $plaImgNext.on('click', function() {
    var current = (count === total) ? 1 : count + 1;
    plaHeroUpdate(current);
  });

  $plaNavImg.on('click', function() {
    var current = $(this).data('pla-item');
    plaHeroUpdate(current);
  });



  // Video Embed play
  /////////////////////////////
  var $videoTrigger = $('.pla-video figure'),
      $videoEmbed = $('.pla-iframe-embed'),
      $vidCTA = $('.pla-video-inner a');

  $videoTrigger.on('click', function() {
    var embedUrl = $(this).data('videosrc');

    $videoEmbed.addClass('is-active');
    $videoEmbed.children('iframe').attr('src', embedUrl + '?autoplay=1&rel=0');
  });

  // Video CTA hover for dynamic color
  /////////////////////////////
  $vidCTA.hover(function() {
    $(this).css('color', $(this).data('hex'));
  }, function() {
    $vidCTA.css('color', '#ffffff');
  });


  // Shop Now btn scroll
  /////////////////////////////
  var $shopNowBtn = $('.col-shop:first-of-type');

  if ($('body.pricing-pla').length) {
    $shopNowBtn.on('click', function(e) {
      e.preventDefault();
      $('html,body').animate({
        scrollTop: $('#pricing').offset().top - 72
      }, 600);
    });
  }

  // Headline text update check for url parameter
  /////////////////////////////
  function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
  }

  $(document).ready(function() {
    if ($('body.pricing-pla').length) {
      var url = window.location.href;

      if (url.indexOf('title=') > -1) {
        var newHeadline = getUrlParameter('title');
        $('.pla-hero-copy h1').text(newHeadline);
      }
    }
  });

}(jQuery));
