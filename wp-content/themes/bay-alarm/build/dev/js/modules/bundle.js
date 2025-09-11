(function($) {

  var $col = $('.hover-col');

  $col.on('click', function(e) {
    var $target = $(e.target);

    if (!$target.is('a')) {
      $(this).toggleClass('is-active');
    }
  });

}(jQuery));