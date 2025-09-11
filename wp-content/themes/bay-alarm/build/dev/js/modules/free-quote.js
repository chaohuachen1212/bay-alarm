(function($) {

  function freeQuoteForm() {
    var $parentContainer = $('.fquote-sec-wrap'),
        $form = $('.fquote-form'),
        $stepPanels = $parentContainer.find('.step-panel'),
        $choices = $stepPanels.find('.q-choice'),
        $backButton = $parentContainer.find('.back-btn'),
        $dots = $('.fquote-steps-current div');

    if ($parentContainer.length) {
      // // get current PST time in 24hr
      // var datePST = new Date(new Date().toLocaleString('en-US', {timeZone: 'America/Los_Angeles'}));
      // var datePSTHour = datePST.getHours();

      // // check if after hours (not during 6am - 5pm)
      // if (!(datePSTHour >= 6 && datePSTHour < 17)) {
      //   // show the extra dot step if after hours
      //   $parentContainer.addClass('callback-time-enabled');
      // } else {
      //   // remove the elements if open hours
      //   $('.timeslot-step').remove();
      //   $('.timeslot-dot').remove();
      //   $('.callback-field').remove();
      // }

      // $form.on('submit', function() {
      //   $(this).find('button[type="submit"]').prop('disabled', true).addClass('is-submitted');
      // });
    }

    function nextStep($choice) {
      var $thisPanel = $choice.closest('.step-panel'),
          $nextPanel = $thisPanel.next();

      $stepPanels.removeClass('is-active');
      $dots.removeClass('is-active');
      $nextPanel.add($backButton).addClass('is-active');
      $dots.eq($nextPanel.index()).addClass('is-active');

      // store selected choice to hidden input
      var $storeChoices = $parentContainer.find('input.selected-choice');
      for (var k = 0; k < $storeChoices.length; k++) {
        if ($thisPanel.index() === k) {
          var $thisChoiceElem = $choice.find('span');
          var choiceValue = (typeof $thisChoiceElem.data('val') !== 'undefined') ? $thisChoiceElem.data('val') : $thisChoiceElem.text();
          $storeChoices.eq(k).attr('value', choiceValue);
        }
      }
    }

    function prevStep() {
      var $activePanel = $parentContainer.find('.step-panel.is-active'),
          $prePanel = $activePanel.prev();

      $stepPanels.removeClass('is-active');
      $dots.removeClass('is-active');
      $prePanel.addClass('is-active');
      $dots.eq($prePanel.index()).addClass('is-active');

      var $firstActivePanel = $parentContainer.find('.step-panel.is-active:first-child');

      if ($firstActivePanel.length) {
        $backButton.removeClass('is-active');
      }
    }


    // Choice Click
    // ===============================================
    $choices.on('click', function() {
      var $self = $(this);
      nextStep($self);
    });

    $choices.on('keypress', function(e) {
      if (e.key === 'Enter') {
        var $self = $(this);
        nextStep($self);
      }
    });


    // Back Button
    // ===============================================
    $backButton.on('click', function() {
      prevStep();
    });

    $backButton.on('keypress', function(e) {
      if (e.key === 'Enter') {
        prevStep();
      }
    });


    var heroParentContainer = $('.hero-slider--wrap');
    var $backButtonHero = heroParentContainer.find('.back');
    var slices = $('.free-quote--hero-form .slice');
    var dotsLi = $('.free-quote-hero--dots li');

    function nexthomeHeroStep($choice) {
      var $thisPanel = $choice.closest('.slice'),
          $nextPanel = $thisPanel.next();




      slices.removeClass('is-active');
      dotsLi.removeClass('is-active');
      $nextPanel.add($backButtonHero).addClass('is-active');
      dotsLi.eq($nextPanel.index()).addClass('is-active');

      // store selected choice to hidden input
      var $storeChoices = heroParentContainer.find('input.selected-choice');
      for (var k = 0; k < $storeChoices.length; k++) {
        if ($thisPanel.index() === k) {
          var $thisChoiceElem = $choice.find('span');
          var choiceValue = (typeof $thisChoiceElem.data('val') !== 'undefined') ? $thisChoiceElem.data('val') : $thisChoiceElem.text();
          $storeChoices.eq(k).attr('value', choiceValue);
        }
      }
    }

    function prevHeroStep() {
      var $activePanel = heroParentContainer.find('.slice.is-active'),
          $prePanel = $activePanel.prev();

      slices.removeClass('is-active');
      dotsLi.removeClass('is-active');
      $prePanel.addClass('is-active');
      dotsLi.eq($prePanel.index()).addClass('is-active');

      var $firstActivePanel = heroParentContainer.find('.slice.is-active:first-child');

      if ($firstActivePanel.length) {
        $backButtonHero.removeClass('is-active');
      }
    }

    var radioChoices = $('.free-quote--hero-form .slice .radio-box input');

    // Choice Click
    // ===============================================
    radioChoices.on('click', function() {
      var $self = $(this);
      nexthomeHeroStep($self);
    });

    radioChoices.on('keypress', function(e) {
      if (e.key === 'Enter') {
        var $self = $(this);
        nexthomeHeroStep($self);
      }
    });

    // Back Button
    // ===============================================
    $backButtonHero.on('click', function() {
      prevHeroStep();
    });

    $backButtonHero.on('keypress', function(e) {
      if (e.key === 'Enter') {
        prevHeroStep();
      }
    });

  }



  function homeHeroSlider(){
    var next = $('.free-quote--hero-form .slice .bottom-wrap .next');
    var slices = $('.free-quote--hero-form .slice');
    var dotsLi = $('.free-quote-hero--dots li');
    var active = 'is-active';
    next.click(function(){
      var slice = $(this).closest('.slice');
      var nextSlice = slice.next();
      slices.removeClass('is-active');
      dotsLi.removeClass('is-active');
      nextSlice.addClass('is-active');
      $backButtonHero.addClass('is-active');
      dotsLi.eq(nextSlice.index()).addClass('is-active');
    });

    // dotsLi.click(function(){
    //   var currentIndex = $(this).index();
    //   dotsLi.removeClass('is-active');
    //   $(this).addClass('is-active');
    //   slices.removeClass('is-active');
    //   slices.eq(currentIndex).addClass('is-active');
    // });
  }

  function homeCountdown(){
    var thePickTimeText = $('.night-form--hero-sec .hero-countdown-wrap .hidden-countdown-date').text();
    // Set the date we're counting down to
    var countDownDate = new Date(thePickTimeText).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = countDownDate - now;

      if (distance >= 0) {

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("countdown-days").innerHTML = days;
        document.getElementById("countdown-hours").innerHTML = hours;
        document.getElementById("countdown-minutes").innerHTML = minutes;
        document.getElementById("countdown-seconds").innerHTML = seconds;

      }

      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("countdown-days").innerHTML = "00";
        document.getElementById("countdown-hours").innerHTML = "00";
        document.getElementById("countdown-minutes").innerHTML = "00";
        document.getElementById("countdown-seconds").innerHTML = "00";
      }
    }, 1000);
  }

function nightHeroForm () {
  var $parentContainerNew = $('.home-hero--form-sec'),
      $formNew = $('.home-hero--form-sec .fquote-form'),
      $stepPanelsNew = $parentContainerNew.find('.slice'),
      $nextNew = $stepPanelsNew.find('.next'),
      $backButton = $parentContainerNew.find('.back');

  // if ($parentContainerNew.length) {
  //
  //   $formNew.on('submit', function() {
  //     $(this).find('button[type="submit"]').prop('disabled', true).addClass('is-submitted');
  //   });
  // }

  function nextStep($choice) {
    var $thisPanel = $choice.closest('.slice'),
        $nextPanel = $thisPanel.next();

    $stepPanelsNew.removeClass('is-active');
    $nextPanel.add($backButton).addClass('is-active');

    // store selected choice to hidden input
    var $storeChoices = $parentContainerNew.find('input.selected-choice');
    for (var k = 0; k < $storeChoices.length; k++) {
      if ($thisPanel.index() === k) {
        var $thisChoiceElem = $choice.find('span');
        var choiceValue = (typeof $thisChoiceElem.data('val') !== 'undefined') ? $thisChoiceElem.data('val') : $thisChoiceElem.text();
        $storeChoices.eq(k).attr('value', choiceValue);
      }
    }
  }

  function prevStep($choice) {
    var $thisPanel = $choice.closest('.slice'),
        $prevtPanel = $thisPanel.prev();

    $stepPanelsNew.removeClass('is-active');
    $prevtPanel.addClass('is-active');

    // var $activePanel = $parentContainerNew.find('.slice.is-active'),
    //     $prePanel = $activePanel.prev();

    // $stepPanelsNew.removeClass('is-active');
    // $prePanel.addClass('is-active');

    // var $firstActivePanel = $parentContainerNew.find('.slice.is-active:first-child');

    // if ($firstActivePanel.length) {
    //   $backButton.removeClass('is-active');
    // }
  }

  var radioChoices = $('.home-hero--form-sec .slice .radio-box input');

  // Choice Click
  // ===============================================
  // radioChoices.on('click', function() {
  //   var $self = $(this);
  //   nextStep($self);
  // });
  //
  // radioChoices.on('keypress', function(e) {
  //   if (e.key === 'Enter') {
  //     var $self = $(this);
  //     nextStep($self);
  //   }
  // });


  // Back Button
  // ===============================================
  $backButton.on('click', function() {
    var $self = $(this);
    prevStep($self);
  });

  $backButton.on('keypress', function(e) {
    if (e.key === 'Enter') {
      prevStep();
    }
  });
}

function dayTimeTopForm(){
  var next = $('.day-form-wrap form .bottom-wrap .next');
  var wrap = $('.day-form-wrap article');
  var back = $('.day-form-wrap .back-wrap');
  var active = 'is-active';
    next.click(function(){
      validationTopFormRadioBtn();
      checkTopFormRadioBtn();
    });
    back.click(function(){
      wrap.addClass(active);
    });
}
dayTimeTopForm();

function crConsumerForm(){
  var next = $('.cr-consumer--sec form .bottom-wrap .next');
  var wrap = $('.cr-consumer--sec article');
  var back = $('.cr-consumer--sec .back-wrap');
  var active = 'is-active';
    next.click(function(){
      validationDayRadioBtn();
      checkDayRadioBtn();
    });
    back.click(function(){
      wrap.addClass(active);
    });
}
crConsumerForm();

function hideHeaderBtn() {
  var theItem = $('.new-night-form--hero');
  var hero = $('.free-quote--hero');

  if($('.new-style-night-form--hero').length) {
    $('header .header-info .header-call').hide();
  }
}

hideHeaderBtn();


// function validationNewDayRadioBtn(){
//   var radioBox = $('.cr-consumer--sec article .slice.is-active .radio-box-wrap .radio-box');
//   radioBox.each(function(){
//     var name = $(this).find('input').attr('name');
//     var currentItem = $(this);
//     if($('.cr-consumer--sec input:radio[name="'+ name + '"]').is(':checked')){
//      currentItem.closest('.radio-box-wrap').removeClass('invalid');
//    }else {
//      currentItem.closest('.radio-box-wrap').addClass('invalid');
//    }
//   });
// }

// function crConsumerForm(){
  
//   var next = $('.cr-consumer--sec form .bottom-wrap .next');
//   var wrap = $('.cr-consumer--sec article');
//   var slices = $('.cr-consumer--sec .radio-row .slice');
//   var back = $('.cr-consumer--sec .back-wrap');
//   var lastNext = $('.cr-consumer--sec .form-bottom-wrap .next');
//   var article = $('.cr-consumer--sec article');
//   var backStep = $('.cr-consumer--sec .slice .back-btn');
//   var active = 'is-active';

//   next.click(function(){
//    validationNewDayRadioBtn();

//     var isValid = true;
//     var currentRadioBox = $(this).closest('.slice').find('.radio-box-wrap');
//     var slice = $(this).closest('.slice');
//     var nextSlice = slice.next();

//     if(currentRadioBox.hasClass('invalid')){
//       isValid = false;
//     }

//     if (isValid === true) {
//       slices.removeClass('is-active');
//       nextSlice.addClass('is-active');
//     }
    
//   });

//   backStep.click(function(){
//     var slice = $(this).closest('.slice');
//     var previousSlice = slice.prev();
//     slices.removeClass('is-active');
//     previousSlice.addClass('is-active');
//   });

//   lastNext.click(function(){
//     article.removeClass(active);
//   });
  
//     back.click(function(){
//       wrap.addClass(active);
//     });
// }
// crConsumerForm();

function crConsumerNightForm(){
  var next = $('.night-form--hero-sec form .bottom-wrap .next');
  var wrap = $('.night-form--hero-sec .col-l');
  var back = $('.night-form--hero-sec .back-wrap');
  var active = 'is-active';
    next.click(function(){
      validationNightRadioBtn();
      checkNightRadioBtn();
    });
    back.click(function(){
      wrap.addClass(active);
    });
}
crConsumerNightForm();

function validationNightRadioBtn(){
  var radioBox = $('.night-form--hero-sec .radio-box');
  radioBox.each(function(){
    var name = $(this).find('input').attr('name');
    if($('.night-form--hero-sec input:radio[name="'+ name + '"]').is(':checked')){
     $(this).closest('.raido-box-wrap').removeClass('invalid');
   }else {
     $(this).closest('.raido-box-wrap').addClass('invalid');
   }
  });
}

function checkNightRadioBtn(){
  var isValid = true;
  var active = 'is-active';
  var wrap = $('.night-form--hero-sec .col-l');
  $('.night-form--hero-sec .raido-box-wrap').each(function(){
    if($(this).hasClass('invalid')){
      isValid = false;
    }
  });

  if (isValid === true) {
    wrap.removeClass(active);
  }
}

function validationTopFormRadioBtn(){
  var radioBox = $('.day-form-wrap article .radio-box-wrap .radio-box');
  radioBox.each(function(){
    var name = $(this).find('input').attr('name');
    var currentItem = $(this);
    if($('.day-form-wrap input:radio[name="'+ name + '"]').is(':checked')){
     currentItem.closest('.radio-box-wrap').removeClass('invalid');
   }else {
     currentItem.closest('.radio-box-wrap').addClass('invalid');
   }
  });
}

function checkTopFormRadioBtn(){
  var isValid = true;
  var active = 'is-active';
  var wrap = $('.day-form-wrap article');
  $('.day-form-wrap .radio-box-wrap').each(function(){
    if($(this).hasClass('invalid')){
      isValid = false;
    }
  });

  if (isValid === true) {
    wrap.removeClass(active);
  }
}

function validationDayRadioBtn(){
  var radioBox = $('.cr-consumer--sec article .radio-box-wrap .radio-box');
  radioBox.each(function(){
    var name = $(this).find('input').attr('name');
    var currentItem = $(this);
    if($('.cr-consumer--sec input:radio[name="'+ name + '"]').is(':checked')){
     currentItem.closest('.radio-box-wrap').removeClass('invalid');
   }else {
     currentItem.closest('.radio-box-wrap').addClass('invalid');
   }
  });
}

function checkDayRadioBtn(){
  var isValid = true;
  var active = 'is-active';
  var wrap = $('.cr-consumer--sec article');
  $('.cr-consumer--sec .radio-box-wrap').each(function(){
    if($(this).hasClass('invalid')){
      isValid = false;
    }
  });

  if (isValid === true) {
    wrap.removeClass(active);
  }
}

function addTargetLink() {
  var theItem = $('.free-quote-page .logos-wrap .image-wrap a');
  theItem.attr('target','_blank');
}

if ($('.free-quote-page').length) {
  setInterval(addTargetLink, 3000);
}

if ($('.hero-countdown-wrap').length) {
  homeCountdown();
}

  if ($('.free-quote-page').length) {
    nightHeroForm();
    // freeQuoteForm();
    homeHeroSlider();
  }

}(jQuery));
