(function($) {
  var $phoneCol = $('.app-features-sec .mobile-col');
  var $container = $('.app-features-sec .listing-wrap');
  var isBottom = 'is-bottom';
  var isFixed = 'is-fixed';
  var isActive = 'is-active';

  $container.waypoint(function(direction) {
    $phoneCol.removeClass(isBottom);
    $phoneCol.toggleClass(isFixed);
  },{ offset:'10%' });


  if ($phoneCol.length) {
    var sectionsArr = $('.app-features-sec .content-col .list-tiem');
    var screenImg = $(".app-features-sec .screen-imgs-wrap img");

    for (var i = 0; i < sectionsArr.length; i++ ) {

      // Changing Image as scrolling
      // ========================================================
      function changeImg(section, img) {
        section.waypoint(function(direction) {
          if ( direction === 'down') {
            img.addClass(isActive);
            img.siblings().removeClass(isActive);
            section.addClass(isActive);
            section.siblings().removeClass(isActive);
          }
        },{ offset:'200px' });

        section.waypoint(function(direction) {
          if ( direction === 'up') {
            img.addClass(isActive);
            img.siblings().removeClass(isActive);
            section.addClass(isActive);
            section.siblings().removeClass(isActive);
          }
        },{ offset:'90px' });
      }
      changeImg( $(sectionsArr[i]), $(screenImg[i]));


      // Last Element:
      // when the phone img hits the last element, freeze its position
      // ========================================================
      var lastIndex = sectionsArr.length-1;

      $(sectionsArr[lastIndex]).waypoint(function(direction) {
        if ( direction === 'down') {
          var offsetTop = $phoneCol.find("img").offset().top - $container.offset().top - 11;
          var offsetArr = [];
          offsetArr.push(offsetTop);
          $phoneCol.css({
             'position' : 'absolute',
             'top' : offsetArr[0]+'px'
          });
        }
      },{ offset:'120px' });

      $(sectionsArr[lastIndex]).waypoint(function(direction) {
        if ( direction === 'up') {
          $phoneCol.removeAttr("style");
        }
      },{ offset:'120px' });
    }
  }


}(jQuery));