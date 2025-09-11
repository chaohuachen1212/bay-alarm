(function($) {

  var $toggle = $('.faq-toggle');

  $toggle.on('click', function() {
    $(this).toggleClass('is-active');
    $(this).siblings('.faq-content').toggleClass('is-active');
  }).on('keyup', function(e){
    if (e.keyCode === 13 || e.keyCode === 32) {
      e.preventDefault();
      $(this).click();
    }
  });

  // var $navDropdown = $('.faq--rail .select-container select');

  // $navDropdown.change(function(){
  //   var selectedItemIndex = $(this).find('option:selected').index();
  //   var selectedItemIndex = selectedItemIndex - 1;
  //   $(".faq--rail .cat-wrap").find('.cat-name a').eq(selectedItemIndex).click();
  //   $(this).prop('selectedIndex',0);
  // })

}(jQuery));
