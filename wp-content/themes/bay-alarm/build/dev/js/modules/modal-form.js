(function($) {
  if($(window).width() > 1024 && !$('body.fb-landing').length) {
    var $interval;
    var $timer = function(){
      $interval = setTimeout(function(){
        $('.modal-form').fadeIn(800, function(){
          $('.modal-form .form-wrap').addClass("active");
        });
      },1000);
    };
    $(document).mouseleave(function () {
      if(document.cookie.indexOf('abandonform=') === -1){
        $timer();
      }
    });
    $(document).mouseenter(function () {
      clearInterval($interval);
    });
    $(document).ready(function(){

      $('.modal-form input').each(function(){
        // add descriptive error message to required fields
        $(this).on('change invalid', function(){
          var textField = $(this).get(0);
          var placeHolderName = $(this).attr('placeholder');
          textField.setCustomValidity('');

          if(!textField.validity.valid) {
            textField.setCustomValidity(`${placeHolderName}: This field is required in order to submit the form.`);
          }

        });
      });

      $('.modal-form .no-thanks').click(function(){
        var now = new Date();
        var time = now.getTime();
        time += (3600 * 24) * 1000;
        now.setTime(time);
        $('.modal-form').fadeOut(800);
        $('.modal-form .form-wrap').removeClass("active");
        document.cookie = "abandonform=1; expires=" + now.toUTCString() + "; path=/";
      }).on('keyup', function(e) {
        if (e.keyCode === 13 || e.keyCode === 32) {
          e.preventDefault();
          $(this).click();
        }
      });
      $('.modal-form .close').click(function(){
        $('.modal-form').fadeOut(800);
        $('.modal-form .form-wrap').removeClass("active");
      });
    });
  }
}(jQuery));
