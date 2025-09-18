(function($) {


  var currentStep = 1;
  var totalSteps = $('.product-quiz--main-content .quiz-step').length;

  function updateProgress() {
    $allQuizSteps = $('.product-quiz--main-content .quiz-step');
    $('.product-quiz--main-content .quiz-step').removeClass('is-active completed');
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

  
   var $progressSteps = $('.product-quiz .progress--steps');

  function moveUpstepsProgress() {
    $('.product-quiz--main-content .quiz-step .btn-wrap .btn').click(function() {
      if (currentStep < totalSteps ) {
        currentStep++;
        updateProgress();
        if(currentStep === (totalSteps)) {
         
          $progressSteps.addClass('is-completed');
        }
      }
    });
  }
  moveUpstepsProgress();

  

  function goBackStepsProgress(){
    $('.quiz-step .btn-back').click(function() {
      currentStep--;
      $progressSteps.removeClass('is-completed');
      updateProgress();
    });
  }
  goBackStepsProgress();

  updateProgress();


}(jQuery));