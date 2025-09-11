(function($) {
  /*

  Call video modal: add a class .video-modal-call and data-videosrc="" to the element

  Example:
  <a class="video-madal-call" data-videosrc="https://www.youtube.com/embed/3-_Av0V_NA0"> </a>


  NOTE: no need to have this "?autoplay=1&rel=0" in data-videosrc.

  */

  var $vModal = $('.video-modal'),
      $vModalId = $('#video-modal'),
      $callModal = $('.video-modal-call'),
      $vIframe = $vModal.find('.video-iframe'),
      $body = $('body'),
      isActive = 'is-active';
      $mainBody = $('#main-page-body');


      // Trap Focus in Panel
      //=============================================================
      function trapFocus(element) {
        var focusableEls = element.find('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled]), iframe, [tabindex]');
        var firstFocusableEl = focusableEls[0];
        var lastFocusableEl = focusableEls[focusableEls.length - 1];
        var KEYCODE_TAB = 9;     

        element.on('keydown', function(e) {
          var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);
          
          if (!isTabPressed) {
            return;
          }

          if ( e.shiftKey ) /* shift + tab */ {
            if (document.activeElement === firstFocusableEl) {
              lastFocusableEl.focus();
                e.preventDefault();
              }
            } else /* tab */ {
            if (document.activeElement === lastFocusableEl) {
              firstFocusableEl.focus();
                e.preventDefault();
              }
            }
        });

       setTimeout(function() { firstFocusableEl.focus() }, 1000 );
      }

  $vModal.on('click', function(){
    $(this).removeClass(isActive);
    $vIframe.attr('src', '');
    $body.removeClass('is-locked-mobile');
    
  });

  $callModal.on('click', function(){
    var $self = $(this);
    var $thisVideoSrc = $self.data('videosrc');

    $body.addClass('is-locked-mobile');
    $vIframe.attr('src', $thisVideoSrc + '?autoplay=1&rel=0').attr('tabindex', '0');
    $vModal.addClass(isActive);

    trapFocus($vModal);
    
  }).on('keyup', function(e) {
    // open modal when user focuses on element and hits enter key
    if(e.keyCode === 13 || e.keyCode === 32) {
      e.preventDefault();
      $(this).click();
    }
  });


  // close modal on esc key
  $(document).keyup(function(e) {
    if(e.keyCode === 27) {
      $vModal.removeClass(isActive);
      $vIframe.attr('src', '');
      $body.removeClass('is-locked-mobile');

    }
  });
  // close modal on focus and enterkey
  $('.video-modal-close').on('keyup', function(e) {
    // close modal when user focuses on element and hits enter key
    if(e.keyCode === 13 || e.keyCode === 32) {
      console.log('clicked');
      e.preventDefault();
      $(this).click();
    }
  });



  // https://www.youtube.com/embed/3-_Av0V_NA0
  // ?autoplay=1&rel=0

}(jQuery));
