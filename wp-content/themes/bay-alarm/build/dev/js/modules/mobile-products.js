(function($) {

  function activeNav() {
    var navItem = $('.mobile-product-wrap .nav-item');
    var active = ('is-active');
    var container = $('.mobile-products .mobile-product');

    navItem.click(function(){
      var thisNav = $(this);
      var thisindex = thisNav.index();
      navItem.removeClass('is-active');
      thisNav.addClass('is-active');
      container.removeClass('is-active');
      container.eq(thisindex).addClass('is-active');
    });
  }

  activeNav();

}(jQuery));
