(function($) {

$('.lc-1w2zu9n.ezmrzej0').attr('role', 'button').attr('tabindex', '0').attr('aria-label', 'Mute Chat window').on('keyup', function(e){
  if(e.keyCode === 13 || e.keyCode === 32) {
    e.preventDefault();
    $(this).click();
  }
});
}(jQuery));