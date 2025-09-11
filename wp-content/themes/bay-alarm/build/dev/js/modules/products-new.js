(function($) {


  function faqAccordion() {
    var questions = $('.prod-new--faq .q-box');

    questions.click(function(){
      var thisQ = $(this);
      var thisRow = thisQ.closest('.row');
      var thisA = thisRow.find('.a-box');

      thisRow.toggleClass('is-active');
      thisA.slideToggle();
    });
  }
  faqAccordion();

  function productsFeatures() {
    var navItem = $('.product--features .list-wrap .item');
    var images = $('.product--features .display-wrap img');
    var active = 'is-active';

    navItem.click(function(){
      var currentIndex = $(this).index();

      navItem.removeClass(active);
      $(this).addClass(active);

       images.removeClass(active);
       images.eq(currentIndex).addClass(active);
    });
  }

  productsFeatures();



}(jQuery));
