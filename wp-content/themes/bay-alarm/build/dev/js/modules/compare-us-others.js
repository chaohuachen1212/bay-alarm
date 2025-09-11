(function($) {

  function compareActive() {
    var $theParent = $('.compare-us-others'),
        $close = $theParent.find('.close'),
        $thePopup = $('.footer-top .is-popup');
    $thePopup.click(function(){
      $('.compare-us-others').addClass('is-active');
    });

    $close.click(function(){
      $('.compare-us-others').removeClass('is-active');
    });

  }
  compareActive();

}(jQuery));
