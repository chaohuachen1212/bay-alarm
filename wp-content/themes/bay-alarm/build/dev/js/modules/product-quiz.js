(function($) {

	var $PQbackButton = $('.quiz-step .btn-back');
	

	function productQuiznextStep($choice) {
      var $thisPanel = $choice.closest('.quiz-step'),
        $nextPanel = $thisPanel.next(),
        $allQuizSteps = $('.quiz-step');

      $allQuizSteps.removeClass('is-active');
      $nextPanel.addClass('is-active');
      // $nextPanel.add($PQbackButton).addClass('is-active');
   }

   function ProductQuizPrevStep() {
   	  var $parentContainer = $('.quiz-steps-wrap');
   	  var $allQuizSteps = $('.quiz-step');
	  var $activePanel = $parentContainer.find('.quiz-step.is-active'),
	      $prePanel = $activePanel.prev();

	  $allQuizSteps.removeClass('is-active');

	  $prePanel.addClass('is-active');

	  var $firstActivePanel = $parentContainer.find('.quiz-step.is-active:first-child');

	  if ($firstActivePanel.length) {
	    $PQbackButton.removeClass('is-active');
	  }
    }


  $('.quiz-step .btn-wrap .btn').click(function(){
  	var $self = $(this);
    productQuiznextStep($self);
  });

   $PQbackButton.on('click', function() {
    ProductQuizPrevStep();
  });


    var currentStep = 1;
    var totalSteps = $('.quiz-step').length;

  function updateProgress() {
    $allQuizSteps = $('.quiz-step');
    $('.quiz-step').removeClass('is-active completed');
    $('.progress-bar-fill .number').html(currentStep);
    $('.progress-bar-fill .total-number').html(totalSteps);

    $('.quiz-step').each(function(i) {
      if ((i+1) < currentStep) {
        $(this).addClass('completed');
      } else if ((i+1) === currentStep) {
        $allQuizSteps.removeClass('is-active');
        $(this).addClass('is-active');
      }
    });
    var percent = (currentStep) / (totalSteps ) * 100;
    $('.progress-bar-fill').css('width', percent + '%');
  }

  $('#nextStep').click(function() {

    if (currentStep < totalSteps ) {
      currentStep++;
      updateProgress();
      if(currentStep === (totalSteps - 1)) {
        var $progressSteps = $('.progress-steps');
        $progressSteps.addClass('is-completed')
      }
    }
  });

  updateProgress();


}(jQuery));