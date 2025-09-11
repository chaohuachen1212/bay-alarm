(function($) {
  /*
    !!!!!PLEASE READ BEFORE DOING FORM STUFF!!!!!!

    This is the way to do our google form integration.

    inputFocus() : This adds the 'Drip Pan focus class
      * There are two different functions inside
        1. all() wich adds the focusing for all inputs that parents have the .input-wrap class.
        2. textarea() which adds focusing just to a textarea, this can be duplicated and changed for other elements
      This is done so if you want to default to invalid, optional fields can still be focused.

    validateKeyPress() : this validates text fields, emails, and phones when the user presses the keyboard. The .check-phone and .check-email classes must be added to the corresponding email and phone fields for them to use the regex validation.

    sendData() : this passes the data to google.

    formSubmit() : handles submissions and VALIDATION
    This function must be passed 3 parameters to work:
      1. The submit button class or ID.
      2. The form class or ID.
      3. The google form post url.
    If any of those are missing, the function will not work.

    The HTML markup must now have the google field value in the name slot, ie: name="entry.1373749609"
    The new formSubmit function serializes the data, which uses the name value (no longer the ID);

    If you want a field to be validated the input must have the class of .input-required

    If you have questions, please contact alex@kurtnoble.com
  */
  var $input = $('.input-required'),
    $phone = $('.check-phone'),
    $email = $('.check-email'),
    $inputWrap = $(
      '.input-wrap input, .input-wrap textarea, .input-wrap select'),
    $textWrap = $('.input-wrap textarea'),
    invalid = 'invalid',
    thePDFURL = $('.aging-place-guide--hero .pdf-file-link').attr('href'),
    active = 'is-active';

  // Give the URL parameters variable names
  var source = getParameterByName('utm_source');
  var medium = getParameterByName('utm_medium');
  var campaign = getParameterByName('utm_campaign');

  if (typeof(document.referrer) != "undefined" && !sessionStorage.getItem('referral')) {
    sessionStorage.setItem('referral', document.referrer);
  }

  // Put the variable names into the hidden fields in the form.
  $("input[name=00N34000005oWEe]").val(source);
  $("input[name=00N34000005oWEj]").val(medium);
  $("input[name=00N34000005oWEo]").val(campaign);

  $("input[name=referral_url]").val(sessionStorage.getItem('referral'));

  $('.select-multi option').mousedown(function(e) {
    e.preventDefault();
    $(this).prop('selected', !$(this).prop('selected'));
    return false;
  });

  function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }

  function isPhone(phone) {
    var regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
    return regex.test(phone);
  }

  function isEmail(email) {
    var regex =
      /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }

  function inputFocus() {
    function all() {
      $inputWrap.on('focus', function() {
        $(this).parent().addClass('is-active');
      });

      $inputWrap.on('blur', function() {
        $(this).parent().removeClass('is-active');
      });

      $inputWrap.change(function() {
        $(this).parent().removeClass('is-active');
      });
    }

    function textarea() {
      $inputWrap.on('focus', function() {
        $(this).parent().addClass('is-active');
      });

      $inputWrap.on('blur', function() {
        $(this).parent().removeClass('is-active');
      });
    }

    all();
  }

  function textareaFocus() {
    $textWrap.on('focus', function() {
      $(this).parent().addClass('is-active');
    });

    $textWrap.on('blur', function() {
      $(this).parent().removeClass('is-active');
    });
  }

  function validateKeyPress() {
    function fields() {
      $input.keyup(function(e) {
        if ($(this).val() === '') {
          $(this).parent().addClass(invalid);
        } else {
          $(this).parent().removeClass(invalid);
        }
      });
    }

    function phone() {
      $phone.keyup(function(e) {
        var value = $(this).val();

        if (isPhone(value) === false) {
          $(this).parent().addClass(invalid);
        } else if (value.length < 7) {
          $(this).parent().addClass(invalid);
        } else {
          $(this).parent().removeClass(invalid);
        }
      });
    }

    function email() {
      $email.keyup(function(e) {
        var value = $(this).val();

        if (isEmail(value) === false) {
          $(this).parent().addClass(invalid);
        } else {
          $(this).parent().removeClass(invalid);
        }
      });
    }

    fields();
    phone();
    email();
  }

  function validate() {
    $input.parent().removeClass(invalid);

    function valFields() {
      $input.each(function() {
        var $self = $(this),
          value = $self.val();

        if (value === '' || value === null) {
          $self.parent().addClass(invalid);
        }
      });
    }

    function valPhone() {
      $phone.each(function() {
        var $self = $(this),
          value = $self.val();

        if (isPhone(value) === false) {
          $self.parent().addClass(invalid);
        } else if (value.length < 7) {
          $self.parent().addClass(invalid);
        }
      });
    }

    function valEmail() {
      $email.each(function() {
        var $self = $(this),
          value = $self.val();

        if (isEmail(value) === false) {
          $self.parent().addClass(invalid);
        }
      });
    }

    valFields();
    valPhone();
    valEmail();
  }

  function download(url) {
    const a = document.createElement('a')
    a.href = url
    a.download = url.split('/').pop()
    document.body.appendChild(a)
    a.click()
    document.body.removeChild(a)
  }

  // FORM FUNCTIONS
  // ==================================================
  function sendData(form, formUrl, thankUrl) {
    var $form = $(form),
      data = $form.serialize(),
      homeURL = location.origin,
      thankURL = homeURL + thankUrl;

    $.ajax({
      url: formUrl,
      data: data,
      dataType: "xml",
      complete: function() {
        window.location = thankURL;
        // console.log(data);
      }
    });
  }

  function formSubmit(button, formSelector, googleUrl, thankUrl) {
    var $submit = $(button),
      form = formSelector,
      url = googleUrl;

    $(form).on('submit', function(e) {
      e.preventDefault();
      validate();

      var isValid = true;

      $(form).find('.input-required').each(function() {
        if ($(this).parent().hasClass('invalid')) {
          isValid = false;
        }
      });

      if (isValid === true) {
        sendData(form, url, thankUrl);
      }
      return isValid;
    });
  }

    inputFocus();

    formSubmit('#contact-submit', '.contact-form', 'https://webto.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8', '/thank-you/');

    formSubmit('#customer-service-submit', '.customer-service-form', 'https://webto.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8', '/thank-you/');

    formSubmit('#brochure-submit', '.brochure-form', 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8', '/thank-you-brochure/');


    $('.fquote-form, .b2b-form').submit(function(event) {
          event.preventDefault();

          $form = $(this);

          grecaptcha.ready(function() {
              grecaptcha.execute('6Ld5mp8mAAAAAPK1W-QIuTKNqmDb4sejGHhfZZ3l', {action: 'free_quote_submission'}).then(function(token) {
                  $form.prepend('<input type="hidden" name="token" value="' + token + '">');
                  $form.prepend('<input type="hidden" name="action" value="free_quote_submission">');
                  $form.unbind('submit');
                  $form.find('#quote-submit').trigger('click');
              });
          });
    });

    $('.aging-form').submit(function(event) {
      event.preventDefault();
      download(thePDFURL);
      $form = $(this);
      grecaptcha.ready(function() {
          grecaptcha.execute('6Ld5mp8mAAAAAPK1W-QIuTKNqmDb4sejGHhfZZ3l', {action: 'aging_form_submission'}).then(function(token) {
              $form.prepend('<input type="hidden" name="token" value="' + token + '">');
              $form.unbind('submit');
              $form.find('.form-submit').trigger('click');
          });
      });
});



}(jQuery));
