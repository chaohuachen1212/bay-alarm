(function($) {

  $('.prod-new--consultants .slider-wrap').slick({
    infinite: true,
    slidesToShow: 1,
    speed: 300,
     arrows: false,
    autoplay: true,
    dots: true,
  });

  function bellaPick() {
    var theNavItem = $('.bella-items-wrap .item');
    var theColorPick = $('.prod--bella-charm .color-pick');

    theColorPick.each(function(){
      $(this).hasClass('is-active') ?
      $(this).attr('aria-hidden', 'false') :
      $(this).attr('aria-hidden', 'true');
    });

    theNavItem.click(function(){
      var theIndex = $(this).index();

      theColorPick.attr('aria-hidden', 'true');
      theColorPick.eq(theIndex).attr('aria-hidden', 'false');

      theColorPick.removeClass('is-active');
      theColorPick.eq(theIndex).addClass('is-active');
    });
  }

  bellaPick();

}(jQuery));
