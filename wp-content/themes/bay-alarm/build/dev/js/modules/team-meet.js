(function($) {

  //
  // Downdown Sorting
  //==============================================================================
  function dropDownSorting() {
    var $teamDropdown = $(".team--meet-sec").find('.tm-dep-dropdown select');

    $teamDropdown.change(function(){
      var $selectedDropdownVal =  $(this).find(":selected").val();
      var $listingContainer = $(".team--meet-sec .tm-member-list");
      var $listingItem = $listingContainer.find('.tm-member-box');
      var $catNames = $listingItem.find('.mem-cat');
      var $selectedCatElems = $listingContainer.find('[data-memcat="'+ $selectedDropdownVal +'"]');
      var isShow = 'is-shown';

      if ( $selectedCatElems.length > 0 ) {
        $catNames.each(function(){
          var $thisCatname = $(this).data('memcat');
          if ( $selectedDropdownVal === $thisCatname ) {
            $listingItem.removeClass(isShow);
            $selectedCatElems.closest(".tm-member-box").addClass(isShow);
          }
        });
      } else {
        $selectedDropdownVal === 'all' ? $listingItem.addClass(isShow) : $listingItem.removeClass(isShow);
      }
    })
  };
  dropDownSorting();



  //
  // Detail Panel
  //==============================================================================
  function detailsPanel() {
    var $teamSection = $(".team--meet-sec .team-members-container");
    var $detailsContainer = $(".team-details-container");
    var $backButton = $detailsContainer.find('.td-backbtn');
    var $staff = $(".tm-member-list").find(".tm-member-box");
    var isActive = 'is-active';

    $staff.on('click', function(){

      // smooth scroll
      var offset;
      var mobileL = 640;
      var windowW = $(window).width();
      (windowW > mobileL) ? offset = 72 : offset = 55;
      $('html,body').animate({
        scrollTop: $(".team--meet-sec").offset().top - offset
      }, 600);

      // panel height
      var memberIndex = $(this).index();
      var $selectedPanel = $detailsContainer.eq(memberIndex);
      var $panelHeight = $selectedPanel.outerHeight();
      $selectedPanel.addClass(isActive);
      $teamSection.css('height', $panelHeight+"px");

      $(window).resize(function(){
        if ( $('.team-details-container.is-active').length ) {
          var $panelHeight = $selectedPanel.outerHeight();
          $teamSection.css('height', $panelHeight+"px");
        } else {
          $teamSection.removeAttr( "style" );
        }
      });
    })

    $backButton.on('click', function(){
      $detailsContainer.removeClass(isActive);
      $teamSection.removeAttr( "style" );
    })
  };
  detailsPanel();


  //
  // URL Anchor
  //==============================================================================
  function urlAnchor() {
    if ( $('.meet-the-team').length ) {
      var hashName = window.location.hash,
          hashName = hashName.replace('#', ""),
          $currentContainer = $('.team-details-container[data-authorname="'+hashName+'"]');

      $currentContainer.addClass('is-active');
    }
  };

  $(window).load(function() {
    urlAnchor();
  });

}(jQuery));