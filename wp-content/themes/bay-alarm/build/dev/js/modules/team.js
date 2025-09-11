(function($) {
  var $railNav = $('.team-nav');
  var $navImgContainer = $('.team-nav-image');
  var $navImg = $('.team-nav-image').find('figure');
  var isBottom = 'is-bottom';
  var isActive = 'is-active';

  // Nav Img Height
  // ===============================================================
  function navImgHeight() {
    var railNavHeight = $railNav.outerHeight();
    var headerHeight = $("header .header-wrap").outerHeight();
    var totalHeight = $(window).height() - (railNavHeight + headerHeight);
    $navImgContainer.css('height', totalHeight+"px");
  };
  navImgHeight();

  $(window).resize(function(){
    navImgHeight();
  })


  // Team Rail Waypoints
  // ===============================================================
  $(".team-page section.team-container").waypoint(function(direction) {
    $(".team-rail").toggleClass(isBottom);
  },{ offset:'bottom-in-view' });



  // Team Rail Image changes with waypoints
  // ===============================================================
  if ( $('.team-page').length ) {
    var sectionsArr = ['.team-lander', '.team-mission', '.team-social'];
    var railImgs = $(".team-nav-image figure");

    for ( var i=0; i < sectionsArr.length; i++ ) {
      function changeRailImg(section, img) {
        section.waypoint(function(direction) {
          img.toggleClass(isActive);
        },{ offset:'50%' });
      }
      changeRailImg( $(sectionsArr[i]), $(railImgs[i]) );
    }
  }


  // Dropdown fake click
  // ===============================================================
  var $navDropdown = $('.team-nav-dropdown select');

  $navDropdown.change(function(){
    var selectedItemIndex = $(this).find('option:selected').index();
    var selectedItemIndex = selectedItemIndex - 1;
    $(".team-nav ul").find('li').eq(selectedItemIndex).click();
  })


  // hero image height
  // ===============================================================
  function heroImageHeight() {
    var headerHeight = $('header > .header-wrap').outerHeight();
    var railNavHeight = $('.team-rail .team-nav').outerHeight();
    var windowH = $(window).height();
    var windowW = $(window).width();
    var tabletL = 1024;
    var applyHeight;

    if ( windowW > tabletL ) {
      applyHeight = windowH - headerHeight;
    } else {
      applyHeight = windowH - (headerHeight + railNavHeight );
    }

    $('.team-lander .team-hero').css('height', applyHeight + "px");
  };

  heroImageHeight();

  $(window).resize(function(){
    heroImageHeight();
  })



}(jQuery));