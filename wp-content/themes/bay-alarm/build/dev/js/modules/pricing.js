(function($) {

  // Pricing table:
  // Automatically update the date to every next monday for Plan Feature 'Free bombas socks. Limited offer';
  var d             = new Date();
  var getMonday     = d.setDate(d.getDate() + (1 + 7 - d.getDay()) % 7);
  var $everyMonday  = new Date(getMonday);
  var $mondayFormat  = ($everyMonday.getMonth() + 1) + '/' + $everyMonday.getDate() + '/' +  $everyMonday.getFullYear();

  if ( '.expired-date'.length ) {
    $('.p-pricetable-d td .expired-date').text($mondayFormat);
    $('.p-pricetable-m .feature-row .expired-date').text($mondayFormat);
  }


  // Pricing Comparison Table
  // ============================================================================
  function cellHeight() {
    var $titleColCells = $(".col-title-wrap").find(".cell");
    var $brandColCells = $(".col-brand").find(".cell");

    for (var k=1; k< $titleColCells.length; k++) {
      var $theHeight = $titleColCells.eq(k).outerHeight();
      var j = k+1;
      $(".col-brand").find(".cell:nth-child("+j+")").css({"height": $theHeight+"px"});
    }
  }

  // Pricing Comparison: border-box
  function tableBorder() {
    var $table = $(".pricing-compare .col-title-wrap");
    var $tableH = $table.height();
    var $borderBox = $(".pricing-compare .border-box");
    var $tableBorder = $(".pricing-compare .frame-border");
    var $titleCellHeight = $(".pricing-compare .col-title-wrap");

    $borderBox.css({"height": $tableH+"px"});
    $tableBorder.css({"height": $tableH+"px"});
  }


  if ( $(".pricing-page, .comparison").length ) {
    $(window).resize(function(){
      cellHeight();
      tableBorder();
    });

    $(window).load(function(){
      cellHeight();
      tableBorder();
    });
  }

  if ($('.pricing-promo').length) {
    var $promoCTA = $('.pricing-promo-cta');
    $promoCTA.hover(function() {
      $promoCTA.css('color', $promoCTA.data('hex'));
    }, function() {
      $promoCTA.css('color', '#fff');
    });
  }

  function pricingActiveDesktopContent(){
    var navItems = $('.new-pricing--hero .product-nav-list .nav-item');
    var contents = $('.new-pricing--products-display .contents-display-wrap.desktop .content');
    var active = 'is-active';
    navItems.click(function(){
        navItems.removeClass(active);
        contents.removeClass(active);
      $(this).addClass(active);
      var currentIndex = $(this).index();
      contents.eq(currentIndex).addClass(active);

      $('html, body').animate({
              scrollTop: $("#step-2").offset().top - 65
      }, 600);
      
    });
  }

  pricingActiveDesktopContent();

  $(function() {
    pricingActiveDesktopContent();
  });

  function detectBrowserURL() {
    var hashTag = window.location.hash;
    var $pickerNav = $('.new-pricing--hero .product-nav-list .nav-item');
    var contents = $('.new-pricing--products-display .contents-display-wrap.desktop .content');
    var active = 'is-active';
  
    if ( hashTag !== '') {
      $pickerNav.each(function(){
        var thisVal = $(this).attr('planid');

        if ( thisVal === hashTag ) {
          $(this).click();
        }
      });
    }
  }

   if ( $('.pricing-page-new').length ) {
      // pricingDescktop();
      detectBrowserURL();
    }

  function pricingActiveMobileContent(){
    var navItems = $('.new-pricing--hero .product-nav-list .nav-item');
    var contents = $('.new-pricing--products-display .contents-display-wrap.mobile .content');
    var active = 'is-active';
    navItems.click(function(){
        navItems.removeClass(active);
        contents.removeClass(active);
      $(this).addClass(active);
      var currentIndex = $(this).index();
      contents.eq(currentIndex).addClass(active);
     
      mobilePricingContentsSlider();
    });
  }

  pricingActiveMobileContent();


   function mobilePricingContentsSlider() {
        var mobilePriceSlider = $('.contents-display-wrap.mobile .content.is-active .table-wrap');

        mobilePriceSlider.slick({
          dots: true,
          arrows: false,
          infinite: false,
          speed: 300,
          slidesToShow: 1,
          centerMode: true,
          centerPadding: '20%',
        });

      }

      mobilePricingContentsSlider();


  function paginationTable() {
    var items = $(".senior-resource-guide--main-content .blog-posts .blog-card");
    var tablaeBody = $(".senior-resource-guide--main-content .blog-posts ");
    var numItems = items.length;
    var perPage = 6;


    // Only show the first 20 (or first `per_page`) items initially.
    tablaeBody.html(items.slice(0, 6));
    // Now setup the pagination using the `.pagination-page` div.
    $("#pagination-page").pagination({
      items: numItems,
      itemsOnPage: perPage,
      cssStyle: "light-theme",

      // This is the actual page changing functionality.
      onPageClick: function (pageNumber) {
        // We need to show and hide `tr`s appropriately.
        var showFrom = perPage * (pageNumber - 1);
        var showTo = showFrom + perPage;
        tablaeBody.html(items.slice(showFrom, showTo));
      },
    });
  }
  if($('.senior-resource-guide--main-content').length) {
    paginationTable();
  }


}(jQuery));
