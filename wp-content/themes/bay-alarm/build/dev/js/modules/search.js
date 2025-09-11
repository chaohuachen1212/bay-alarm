(function($) {

  var $searchTerm = $('.show-results span');

  $searchTerm.on('click', function() {
    $('.show-results').addClass('is-search');
    setTimeout(function() {
      $('.search-input').focus();
    }, 350);
  });

}(jQuery));