(function($) {

  // Header Overlay Search
  // ==================================================================
  var $searchIcon = $(".header-search-icon"),
      $searchOverlay = $(".search-overlay"),
      $searchField = $searchOverlay.find(".search-input"),
      $searchButton = $('.overlay-search-btn'),
      $contentBox = $searchOverlay.find(".search-content"),
      $searchCancel = $searchOverlay.find('.search-cancel-btn'),
      $body = $('body'),
      active = 'is-active',
      bodyClasses = 'is-locked-mobile disable-scrolling';

  function openOverlaySearch() {
    $searchIcon.toggleClass('is-active');
    $searchOverlay.toggleClass('is-active');
    $body.toggleClass(bodyClasses);
  }

  function closeOverlaySearch() {
    $searchIcon.removeClass('is-active');
    $searchOverlay.removeClass('is-active');
    $body.removeClass(bodyClasses);
  }

  $contentBox.click(function(e){
    e.stopPropagation();
  });

  $searchIcon.on('click', function(){
    openOverlaySearch();
    setTimeout(function(){
      $searchField.focus();
    }, 200);
  }).on('keyup', function(e){
    if (e.keyCode === 13 || e.keyCode === 32) {
      e.preventDefault();
      $(this).click();
    }
  });

  $searchCancel.on('click', function(){
    closeOverlaySearch();
  }).on('keyup', function(e){
    if (e.keyCode === 13 || e.keyCode === 32) {
      e.preventDefault();
      $(this).click();
    }
  });

  $searchOverlay.on('click', function(){
    // closeOverlaySearch();
  }).on('keyup', function(e){
    if (e.keyCode === 13 || e.keyCode === 32) {
      e.preventDefault();
      $(this).click();
    }
  });

  $(document).keyup(function(e) {
    if (e.keyCode === 27) {
      closeOverlaySearch();
    }
  });


}(jQuery));
