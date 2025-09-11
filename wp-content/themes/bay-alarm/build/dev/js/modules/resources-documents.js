(function($) {

  function filesItemShow() {
    var $partnerContainer = $('.resources-documents-main'),
        $theItem = $partnerContainer.find('h2'),
        $theBox = $partnerContainer.find('.files'),
        $toggleAll = $partnerContainer.find('.sub-heading'),
        $body = $('body');

    if ($toggleAll.text('Collapse all')) {
      $toggleAll.attr('aria-expanded', 'true');
      $theBox.attr('aria-expanded', 'true');
    } else {
      $toggleAll.attr('aria-expanded', 'false');
      $theBox.attr('aria-expanded', 'false');
    }

    $theItem.on('click', function() {
      $(this).closest('.files').toggleClass('is-active');

      if ($('.files.is-active').length) {
        $toggleAll.text('Collapse all').attr('aria-expanded', 'true');
        $thebox.attr('aria-expanded', 'true');

        $body.removeClass('is-active');
      } else {
        $toggleAll.text('Expand all').attr('aria-expanded', 'false');
        $thebox.attr('aria-expanded', 'false');

        $body.addClass('is-active');
      }
    });

    $toggleAll.on('click keyup', function() {
      $body.toggleClass('is-active');

      if ($toggleAll.text() === 'Collapse all') {
        $theBox.removeClass('is-active').attr('aria-expanded', 'false');
        $toggleAll.text('Expand all').attr('aria-expanded', 'false');
      } else {
        $theBox.addClass('is-active').attr('aria-expanded', 'true');
        $toggleAll.text('Collapse all').attr('aria-expanded', 'true');
      }
    });
  }

  // $(document).ready(function(){
  //   if ($('.sub-heading').length) {

  //     $('.sub-heading').on('keyup', function(e){
  //       if (e.keyCode === 13 || e.keyCode === 32) {
  //         e.preventDefault();
  //         $(this).click;
  //       }
  //     });
      
  //   }
  // });

  // filesItemShow();

  }(jQuery));
