(function($) {

  var $videoTrigger = $('.on-the-road-video-block figure'),
      videoEmbed = '.on-the-road-iframe-embed';

    $(document).ready(function() {
      $videoTrigger.on('click touchstart', function() {
        var embedUrl = $(this).data('videosrc'),
            $video = $(this).siblings(videoEmbed);

        $video.addClass('is-active');
        $video.children('iframe').attr('src', embedUrl + '?autoplay=1&rel=0');
      });
    });

  // $(".on-road-hero-video").slick({
  //   dots: false,
  //   infinite: true,
  //   speed: 300,
  //   swipe: false,
  //   draggable: false,
  //   autoplay: true,
  //   autoplaySpeed: 8000,
  //   slidesToShow: 1
  // });

  // stop video on slider arrow click
  $('.slick-arrow').on('click', function() {
    $('.on-the-road-iframe-embed').removeClass('is-active');
    $('.on-road-hero-video').find('iframe').attr('src', '');
  });

}(jQuery));
