(function($) {

  //var offset = 72;
  var offset;
  var mobileL = 640;
  var windowW = $(window).width();

  (windowW > mobileL) ? offset = 72 : offset = 55;

  $(window).resize(function(){
    (windowW > mobileL) ? offset = 72 : offset = 55;
  });

  function smoothScroller() {
    $('a[href*="#"]:not([href="#!"])').click(function() {
      if (location.pathname.replace(/^\//, '') === this.pathname.replace(
          /^\//, '') && location.hostname === this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +
          ']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - offset
          }, 600);
          return false;
        }
      }
    });
  }

  $(function() {
    smoothScroller();
  });
}(jQuery));
