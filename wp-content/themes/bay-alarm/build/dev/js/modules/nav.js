(function($) {

  // Sliding Menu on tablet-l and below
  // ====================================================================
  var $menuButton = $(".header-menu-btn"),
      $menuOverlay = $('.header-menu-overlay'),
      $menuPanel = $(".header-slide-menu"),
      $menuCloseBtn = $(".header-menu-close"),
      $langToggle = $('.language-toggle, .m-language-toggle'),
      $mobileSubNavTrigger = $('.mobile-menu-item-wrap .is-parent'),
      $body = $('body'),
      active = 'is-active',
      lockBody = 'is-locked-mobile',
      noTouch = 'disable-scrolling';


  // Trap Focus in Panel
  //=============================================================
  // function trapFocus(element) {
  //   var focusableEls = element.find('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled]), [tabindex]');
  //   var firstFocusableEl = focusableEls[0];
  //   var lastFocusableEl = focusableEls[focusableEls.length - 1];
  //   var KEYCODE_TAB = 9;
  //
  //   element.on('keydown', function(e) {
  //     var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);
  //
  //     if (!isTabPressed) {
  //       return;
  //     }
  //
  //     if ( e.shiftKey ) /* shift + tab */ {
  //       if (document.activeElement === firstFocusableEl) {
  //         lastFocusableEl.focus();
  //           e.preventDefault();
  //         }
  //       } else /* tab */ {
  //       if (document.activeElement === lastFocusableEl) {
  //         firstFocusableEl.focus();
  //           e.preventDefault();
  //         }
  //       }
  //   });
  // }

  // Open Panel
  //=============================================================
  function openPanel() {
    $menuOverlay.addClass('is-active');
    $menuPanel.addClass('is-active');
    $body.addClass(lockBody + ' ' + noTouch);
    // prevent body from scrolling on iOS
    // http://stackoverflow.com/questions/10238084/ios-safari-how-to-disable-overscroll-but-allow-scrollable-divs-to-scroll-norma
    var selScrollable = '.mobile-menu-item-wrap';
    // Uses document because document will be topmost level in bubbling
    $(document).bind('touchmove',function(e){
      e.preventDefault();
    });
    // Uses body because jQuery on events are called off of the element they are
    // added to, so bubbling would not work if we used document instead.
    $body.on('touchstart', selScrollable, function(e) {
      if (e.currentTarget.scrollTop === 0) {
        e.currentTarget.scrollTop = 1;
      } else if (e.currentTarget.scrollHeight === e.currentTarget.scrollTop + e.currentTarget.offsetHeight) {
        e.currentTarget.scrollTop -= 1;
      }
    });
    // Stops preventDefault from being called on document if it sees a scrollable div
    $body.on('touchmove', selScrollable, function(e) {
      e.stopPropagation();
    });
    // trapFocus($menuPanel);
  }

  // Close Panel
  //=============================================================
  function closePanel() {
    $menuOverlay.removeClass('is-active');
    $menuPanel.removeClass('is-active');
    $body.removeClass(lockBody + ' ' + noTouch);

    $(document).unbind('touchmove');
  }

  // Window Resize
  //=============================================================
  $(window).resize(function(){
    if ( $(window).width() >= 1028 ) {
      closePanel();
    }
  });

  $menuPanel.click(function(e) { e.stopPropagation(); });
  $menuButton.click(function() { openPanel(); });
  $menuOverlay.click(function() { closePanel(); });
  $menuCloseBtn.click(function() { closePanel(); });


  // Hover item with submenu to appear black overlay.
  //=============================================================
  var $itemHasSubmenu = $('.header-nav').find('.has-submenu'),
      $pageOverlay = $('.page-overlay'),
      $myAccountWrap = $('.header-wrap').find('.my-account-wrap'),
      $myAccount = $('.header-wrap').find('.my-account'),
      showDropdown = 'show-dropdown';


  $myAccount.click(function(){
    $pageOverlay.toggleClass('is-active');
    $(this).closest('.my-account-wrap').find('.submenue-wrap').toggleClass(showDropdown);
  });

  $itemHasSubmenu.each(function(){
    var $self = $(this);
    $self.on('click', function(){
      $self.siblings().removeClass(showDropdown);
      $self.toggleClass(showDropdown);
      ($self.is('.'+showDropdown)) ? $pageOverlay.addClass('is-active') : $pageOverlay.removeClass('is-active');
    });
  });

  $pageOverlay.on('click', function(){
    var $self = $(this);
    $self.removeClass('is-active');
    $itemHasSubmenu.removeClass(showDropdown);
    $myAccountWrap.find('.submenue-wrap').removeClass(showDropdown);
  });


  // Product Submenu Panel Width
  //=============================================================
  function prodSubmenuWidth() {
    var $prodSubmenu = $('.header-nav').find('.has-prod-submenu .submenu-wrap');
    var $windowW = $(window).width(),
        $appliedWidth = $windowW - 80;

    if( $(window).width() <= 1470 ) {
      $prodSubmenu.css('width', $appliedWidth + "px");
    }
  }

  prodSubmenuWidth();
  $(window).resize(function(){ prodSubmenuWidth(); });


  // subnav item active ==> root item active
  //=============================================================
  var $prodSubItem = $('.header-nav .prod-sub-col');
  var $subItem = $('.header-nav .submenu-item');

  $prodSubItem.each(function(){
    if ( $(this).is('.is-active') ) {
      $(this).parents('.menu-item').addClass('is-active');
    }
  });

  $subItem.each(function(){
    if ( $(this).is('.is-active') ) {
      $(this).parents('.menu-item').addClass('is-active');
    }
  });

  $langToggle.on('click', function() {
    $(this).parent().toggleClass('is-active');
  });

  $mobileSubNavTrigger.on('click', function() {
    $(this).toggleClass('is-active');
    $(this).siblings('ul').toggleClass('is-active');
  });

  // hamburger icon activate
  var $hamburgerIcon = $('.hamburger-icon');
  $hamburgerIcon.on('keyup', function(e){
    if (e.keyCode === 13 || e.keyCode === 32) {
      e.preventDefault();
      $(this).click();
    }
  });


  $('.menu-item.has-submenu.has-prod-submenu').on('focusin mouseover', function(){
    $(this).addClass('is-active show-dropdown');
    $('.page-overlay').addClass('is-active');
  });

  $('.menu-item.has-submenu.has-prod-submenu').on('focusout mouseout', function(){
    $(this).removeClass('is-active show-dropdown');
    $('.page-overlay').removeClass('is-active');
  });

  // $('.my-account-wrap .my-account').on('focusin mouseover', function(){
  //   $('.submenue-wrap').addClass('show-dropdown');
  //   $('.page-overlay').addClass('is-active');
  //   $('.my-account .submenu').focusin();
  // });
  //
  // $('.my-account .show-dropdown li:last-child a').on('focusout', function(){
  //   console.log('there\'s a snake in my boot!');
  //     $('.submenue-wrap').removeClass('show-dropdown');
  //     $('.page-overlay').removeClass('is-active');
  // });



  // Mini nav submenu 
  $('.header-stick--nav .menu-item.has-submenu').hover(
    function() {
        $('.header-stick--overlay').addClass('is-active');
    },
    function() {
        $('.header-stick--overlay').removeClass('is-active');
    }
  );



}(jQuery));
