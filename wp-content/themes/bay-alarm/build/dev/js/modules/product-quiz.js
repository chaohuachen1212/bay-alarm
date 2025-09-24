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
          $('.product-quiz--main-content').addClass('is-completed');
          $('.product-quiz--form-sec').addClass('is-completed');
        }
      }
    });
  }
  moveUpstepsProgress();

  

  function goBackStepsProgress(){
    $('.quiz-step .btn-back').click(function() {
      currentStep--;
      $progressSteps.removeClass('is-completed');
      $('.product-quiz--main-content').removeClass('is-completed');
      $('.product-quiz--form-sec').removeClass('is-completed');
      updateProgress();
    });
  }
  goBackStepsProgress();

  function buttonSkipNextStep(){
    $('.skep-next-step').click(function(){
      currentStep++;

        updateProgress();
        $('.quiz-step.is-active').addClass('next-of-skep-block');

        $('.next-of-skep-block .btn-skep-back').click(function() {
          currentStep = currentStep - 2;
        if (currentStep < 1) {
          currentStep = 1;
        }
        $progressSteps.removeClass('is-completed');
        $('.product-quiz--main-content').removeClass('is-completed');
        $('.product-quiz--form-sec').removeClass('is-completed');
         updateProgress();
      });
      
    });
  }

  buttonSkipNextStep();

  updateProgress();

  function selectCorrectDisplay() {
    var theItemsList = [];
    var lastContentRows = $('.quiz-step .last-step--content .row');
    $('.product-quiz--main-content .quiz-step .btn-wrap .btn').click(function() {
        var item = $(this).attr('data-item');
        theItemsList.push(item);
    });

    $('.product-quiz--main-content .quiz-step-4').click(function(){
      if(theItemsList.includes('at-home-only') && theItemsList.includes('yes') && theItemsList.includes('no---steady-on-their-feet') && theItemsList.includes('live-along-no') ) {
        $('.quiz-step .last-step--content .in-home-cellular').addClass('is-active');
      }

      if(theItemsList.includes('at-home-only') && theItemsList.includes('yes') && theItemsList.includes('no---steady-on-their-feet') && theItemsList.includes('live-along-yes') ) {
        $('.quiz-step .last-step--content .in-home-cellular-wall-buttons').addClass('is-active');
      }

      if(theItemsList.includes('at-home-only') && theItemsList.includes('yes') && theItemsList.includes('no---steady-on-their-feet') && theItemsList.includes('live-along-sometimes') ) {
        $('.quiz-step .last-step--content .in-home-cellular-optional-wall-buttons').addClass('is-active');
      }

      if(theItemsList.includes('at-home-only') && theItemsList.includes('yes') && theItemsList.includes('yes---recent-fall-or-concern-about-falling') && theItemsList.includes('live-along-no') ) {
        $('.quiz-step .last-step--content .in-home-cellular-fall-detection').addClass('is-active');
      }

      if(theItemsList.includes('at-home-only') && theItemsList.includes('yes') && theItemsList.includes('yes---recent-fall-or-concern-about-falling') && theItemsList.includes('live-along-yes') ) {
        $('.quiz-step .last-step--content .in-home-cellular-fall-detection-wall-buttons').addClass('is-active');
      }

      if(theItemsList.includes('at-home-only') && theItemsList.includes('yes') && theItemsList.includes('yes---recent-fall-or-concern-about-falling') && theItemsList.includes('live-along-sometimes') ) {
        $('.quiz-step .last-step--content .in-home-cellular-fd-optional-wall-buttons').addClass('is-active');
      }

      if(theItemsList.includes('at-home-only') && theItemsList.includes('yes') && theItemsList.includes('not-sure---may-want-optional-fall-detection') ) {
        $('.quiz-step .last-step--content .in-home-cellular-optional-fall-detection').addClass('is-active');
      }

      if(theItemsList.includes('at-home-only') && theItemsList.includes('not-sure') && theItemsList.includes('yes---recent-fall-or-concern-about-falling') ) {
        $('.quiz-step .last-step--content .in-home-cellular-fd-coverage-check').addClass('is-active');
      }

      if(theItemsList.includes('at-home-only') && theItemsList.includes('not-sure') && theItemsList.includes('no---steady-on-their-feet') ) {
        $('.quiz-step .last-step--content .in-home-cellular-verify-coverage').addClass('is-active');
      }

      if(theItemsList.includes('at-home-only') && theItemsList.includes('no') ) {
        $('.quiz-step .last-step--content .in-home-landline-fd-if-selected').addClass('is-active');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('no') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2-fall-detection').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('yes') && theItemsList.includes('yes---recent-fall-or-concern-about-falling') && theItemsList.includes('live-along-yes') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2-fall-detection').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('yes') && theItemsList.includes('yes---recent-fall-or-concern-about-falling') && theItemsList.includes('live-along-no') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2-fall-detection').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('yes') && theItemsList.includes('no---steady-on-their-feet') && theItemsList.includes('live-along-no') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('yes') && theItemsList.includes('no---steady-on-their-feet') && theItemsList.includes('live-along-yes') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2-optional-fall-detection').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('yes') && theItemsList.includes('not-sure---may-want-optional-fall-detection') && theItemsList.includes('live-along-yes') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2-optional-fall-detection').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('yes') && theItemsList.includes('not-sure---may-want-optional-fall-detection') && theItemsList.includes('live-along-no') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('not-sure') && theItemsList.includes('yes---recent-fall-or-concern-about-falling') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2-fall-detection-verify-coverage').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('not-sure') && theItemsList.includes('no---steady-on-their-feet') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2-verify-coverage').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('not-sure') && theItemsList.includes('not-sure---may-want-optional-fall-detection') ) {
        $('.quiz-step .last-step--content .sos-all-in-one-2-optional-fall-detection-coverage-check').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('both-at-home-and-on-the-go') && theItemsList.includes('yes---recent-fall-or-concern-about-falling')  && theItemsList.includes('live-along-yes') ) {
        $('.quiz-step .last-step--content .sos-micro-360-bundle').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-all-in-one');
      }

      if(theItemsList.includes('mostly-out-and-away-from-the-home') && theItemsList.includes('yes---recent-fall-or-concern-about-falling')  && theItemsList.includes('live-along-yes') ) {
        $('.quiz-step .last-step--content .sos-micro-360-bundle').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-micro-images');
      }

      if(theItemsList.includes('mostly-out-and-away-from-the-home') && theItemsList.includes('yes---recent-fall-or-concern-about-falling')  && theItemsList.includes('live-along-no') ) {
        $('.quiz-step .last-step--content .sos-micro-fall-detection').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-micro-images');
      }

      if(theItemsList.includes('mostly-out-and-away-from-the-home') && theItemsList.includes('no---steady-on-their-feet')  && theItemsList.includes('live-along-yes') ) {
        $('.quiz-step .last-step--content .sos-micro-360-bundle-in-home-cellular').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-micro-images');
      }

      if(theItemsList.includes('mostly-out-and-away-from-the-home') && theItemsList.includes('no---steady-on-their-feet')  && theItemsList.includes('live-along-no') ) {
        $('.quiz-step .last-step--content .sos-micro').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-micro-images');
      }

      if(theItemsList.includes('mostly-out-and-away-from-the-home') && theItemsList.includes('not-sure---may-want-optional-fall-detection') ) {
        $('.quiz-step .last-step--content .sos-micro-fall-detection-update').addClass('is-active');
        $('.product-quiz--form-sec .images-wrap').addClass('sos-micro-images');
      }
    });


  }

  selectCorrectDisplay();


}(jQuery));