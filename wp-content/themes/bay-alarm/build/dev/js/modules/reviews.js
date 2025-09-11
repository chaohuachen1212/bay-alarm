(function($) {

  function videoReview() {
    var $parentContainer = $('.reviews-video-container'),
        $contentBox = $parentContainer.find('.content-wrap'),
        $button = $parentContainer.find('.transcript-button');

    $button.on('click', function(){
      var $thisContent = $(this).closest('.video').find(".content-wrap");
      $thisContent.slideToggle();

      if ( $(this).text() === 'Read the transcript') {
        $(this).text('Hide the transcript');
      } else {
        $(this).text('Read the transcript');
      }
    })
  }
  videoReview();

  function collapseGoogleReview() {
    var $theParent = $('.review-wrap'),
        $close= $theParent.find('.close');
        $close.click(function(){
          $theParent.addClass('is-hidden');
        });
  }
  collapseGoogleReview();

  function reviewsContentText(){
    
    var copyWrap = $('.company--reviews-sec .copy-wrap.less--copy .review-copy');
    var viewBtn = $('.company--reviews-sec .btn-link');

    copyWrap.each(function(){
      var txt= $(this).text();
      
      var textArray = txt.split(" ", 73);
      var joinText = textArray.join(" ");
      var ptext = '<p>' + joinText + ' ...</p>';

      if(txt.length > 255) {
        $(this).html(ptext);
      }else {
        $(this).closest('.reviews-copy-wrap').addClass('no--btn');
      }
    });

    viewBtn.click(function(){
      var $this = $(this);
      $this.closest('.reviews-copy-wrap').toggleClass('is-expanded');
    });
    
  }

  reviewsContentText();

}(jQuery));
