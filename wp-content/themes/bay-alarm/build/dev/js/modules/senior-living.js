(function($) {

	function seniorLivingForm($choice) {
      var $thisPanel = $choice.closest('.slice'),
          $nextPanel = $thisPanel.next();
      var slices = $('.senior-living .radio-row .slice');
      var backStep = $('.senior-living .radio-row .slice .back-btn');

      slices.removeClass('is-active');
      $nextPanel.addClass('is-active');


        backStep.click(function(){
  	    var slice = $(this).closest('.slice');
  	    var previousSlice = slice.prev();
  	    slices.removeClass('is-active');
  	    previousSlice.addClass('is-active');
  	  });
    }
     var radioChoices = $('.senior-living .slice .radio-box input');

	  // Choice Click
    // ===============================================
    radioChoices.on('click', function() {
      var $self = $(this);
      seniorLivingForm($self);
    });


}(jQuery));