(function($) {

  // DESKTOP: Pricing Table
  // ============================================================================


  function pricingDescktop() {
    var productOption = $('.pricing-nav-item'),
        tableWrap = $('.p-pricetable-d'),
        tableBody = $('.pricing-table-body'),
        tdTerm = $('thead td');

    // *** function expression for populating data into DOM
    // ----------------------------------------------------------------------
    var populateData = function(element) {
      var $self                   = element;

      var $priceAnnualDollar      = $self.data('price-1'),
          $priceSemilDollar       = $self.data('price-2'),
          $priceMonthlylDollar    = $self.data('price-3');

      var $imgBasic               = $self.data('prodimg-1'),
          $imgPreferred           = $self.data('prodimg-2'),
          $imgPremium             = $self.data('prodimg-3');

      var $permonthAnnual         = $self.data('permonth-1'),
          $permonthSemi           = $self.data('permonth-2'),
          $permonthMonthly        = $self.data('permonth-3');

      var $urlAnnual              = $self.data('orderlink-1'),
          $urlSemi                = $self.data('orderlink-2'),
          $urlMonthly             = $self.data('orderlink-3');

      var $textAnnual              = $self.data('ordertext-1'),
          $textSemi                = $self.data('ordertext-2'),
          $textMonthly             = $self.data('ordertext-3');

      var $stepTitle              = $self.data('step2title'),
          $stepNote               = $self.data('stepnote');

      var $tagoptionAnnual        = $self.data('tagoption-1'),
          $tagoptionSemi          = $self.data('tagoption-2'),
          $tagoptionMonthly       = $self.data('tagoption-3');

      var $tagTextAnnual          = $self.data('tagtext-1'),
          $tagTextSemi            = $self.data('tagtext-2'),
          $tagTextMonthly         = $self.data('tagtext-3');

      var $smallPerMonthAnnual             = $self.data('small-permonth-1'),
          $smallPerMonthSemi             = $self.data('small-permonth-2'),
          $smallPerMonthMonthly             = $self.data('small-permonth-3');

      var $promoAnnual          = $self.data('promoption-1'),
          $promotSemi            = $self.data('promoption-2'),
          $promoMonthly         = $self.data('promoption-3');

      var $promoName = $self.data('promoname');

      tableWrap.find('.new-tag').remove();
      if(! ($promoName === ',,,')) {
        var arrayPromoName = $promoName.split(',');

        if ($promoAnnual === "yes") {
          // tableWrap.find('.new-tag').remove();
          tableWrap.find('.thead-annual').prepend('<p class="new-tag">'+arrayPromoName[0]+'</p>');
        }
        if ($promotSemi === "yes") {
          // tableWrap.find('.new-tag').remove();
          tableWrap.find('.thead-semi').prepend('<p class="new-tag">'+arrayPromoName[1]+'</p>');
        } if ($promoMonthly === "yes") {
          // tableWrap.find('.new-tag').remove();
          tableWrap.find('.thead-monthly').prepend('<p class="new-tag">'+arrayPromoName[2]+'</p>');
        }
      }

      function updatePlanTerms(planTerms) {
        planTerms.pop();
        for (var i = 0; i < planTerms.length; i++) {
          tdTerm.eq(i + 1).find('.term').text(planTerms[i]);
        }
      }

      // Activate the first product
      // +++++++++++++++++++++++++++++++++++++++++++
      $self.addClass('is-active');
      $self.siblings().removeClass('is-active');

      tableWrap.find('.tag').remove();
      // 'most popular' Tag Option and Text
      // +++++++++++++++++++++++++++++++++++++++++++
      if ($tagoptionAnnual === "yes") {
        tableWrap.find('.tag').remove();
        tableWrap.find('.thead-annual').prepend('<p class="tag">'+$tagTextAnnual+'</p>');
      } else if ($tagoptionSemi === "yes") {
        tableWrap.find('.tag').remove();
        tableWrap.find('.thead-semi').prepend('<p class="tag">'+$tagTextSemi+'</p>');
      } else if ($tagoptionMonthly === "yes") {
        tableWrap.find('.tag').remove();
        tableWrap.find('.thead-monthly').prepend('<p class="tag">'+$tagTextMonthly+'</p>');
      }

      // Plan Terms
      // +++++++++++++++++++++++++++++++++++++++++++
      updatePlanTerms($self.data('termname').split(','));


      // Plan Price
      // +++++++++++++++++++++++++++++++++++++++++++
      tableWrap.find('.thead-annual .price').text($priceAnnualDollar);
      tableWrap.find('.thead-semi .price').text($priceSemilDollar);
      tableWrap.find('.thead-monthly .price').text($priceMonthlylDollar);

      tableWrap.find('.thead-annual .prod-img').attr('src', $imgBasic);
      tableWrap.find('.thead-semi .prod-img').attr('src', $imgPreferred);
      tableWrap.find('.thead-monthly .prod-img').attr('src', $imgPremium);

      tableWrap.find('.thead-annual .prod-img-btn').attr('href', $urlAnnual);
      tableWrap.find('.thead-semi .prod-img-btn').attr('href', $urlSemi);
      tableWrap.find('.thead-monthly .prod-img-btn').attr('href', $urlMonthly);
    
      tableWrap.find('.thead-annual .prod-img-btn').text($textAnnual);
      tableWrap.find('.thead-semi .prod-img-btn').text($textSemi);
      tableWrap.find('.thead-monthly .prod-img-btn').text($textMonthly);

      tableWrap.find('.thead-annual .prod-img-btn').removeClass('no-link');

      if ($urlAnnual==='') {
        tableWrap.find('.thead-annual .prod-img-btn').addClass('no-link');
      }

      if ($urlSemi==='') {
        tableWrap.find('.thead-annual .prod-img-btn').addClass('no-link');
      }

      if ($urlMonthly==='') {
        tableWrap.find('.thead-annual .prod-img-btn').addClass('no-link');
      }

      // Plan Price per month
      // +++++++++++++++++++++++++++++++++++++++++++
      tableWrap.find('.thead-annual .per-mo').text($permonthAnnual);
      tableWrap.find('.thead-semi .per-mo').text($permonthSemi);
      tableWrap.find('.thead-monthly .per-mo').text($permonthMonthly);

      // Button URL
      // +++++++++++++++++++++++++++++++++++++++++++
      tableWrap.find('.o-btn-annual').attr('href', $urlAnnual);
      tableWrap.find('.o-btn-semi').attr('href', $urlSemi);
      tableWrap.find('.o-btn-monthly').attr('href', $urlMonthly);

      // Button Text
      // +++++++++++++++++++++++++++++++++++++++++++
      tableWrap.find('.o-btn-annual').text($textAnnual);
      tableWrap.find('.o-btn-semi').text($textSemi);
      tableWrap.find('.o-btn-monthly').text($textMonthly);

      //Button show
      if($urlAnnual==='') {
        tableWrap.find('.o-btn-annual').hide();
      }else {
        tableWrap.find('.o-btn-annual').show();
      }

      if($urlSemi==='') {
        tableWrap.find('.o-btn-semi').hide();
      }else {
        tableWrap.find('.o-btn-semi').show();
      }

      if($urlMonthly==='') {
        tableWrap.find('.o-btn-monthly').hide();
      }else {
        tableWrap.find('.o-btn-monthly').show();
      }

      // Step2 title and note
      // +++++++++++++++++++++++++++++++++++++++++++
      tableWrap.find('.step2-cell h4').text($stepTitle);
      tableWrap.find('.step2-cell .plan-note').text($stepNote);

      // Small permonth
      // +++++++++++++++++++++++++++++++++++++++++++
      tableWrap.find('.thead-annual .small-permonth').text($smallPerMonthAnnual );
      tableWrap.find('.thead-semi .small-permonth').text($smallPerMonthSemi);
      tableWrap.find('.thead-monthly .small-permonth').text($smallPerMonthMonthly);
    }


    // *** Execute populating data into DOM
    // ----------------------------------------------------------------------
    // if (window.location.hash.length) {
    //   var hash = window.location.hash;
    //   console.log(hash);
    //   if (hash.indexOf('#') > -1) {
    //     productOption.removeClass('is-active');
    //     tableBody.removeClass('is-active');
    //     productOption.eq(1).addClass('is-active');
    //     tableBody.eq(1).addClass('is-active');
    //   } else if (hash.indexOf('#mobile') > -1) {
    //     productOption.removeClass('is-active');
    //     tableBody.removeClass('is-active');
    //     productOption.eq(2).addClass('is-active');
    //     tableBody.eq(2).addClass('is-active');
    //   } else if (hash.indexOf('#bundle') > -1) {
    //     productOption.removeClass('is-active');
    //     tableBody.removeClass('is-active');
    //     productOption.eq(3).addClass('is-active');
    //     tableBody.eq(3).addClass('is-active');
    //   }
    // }

    populateData($('.pricing-nav-item.is-active'));

    productOption.click(function(){
      var thisIndex = $(this).index();
      var planTerms = $(this).data('termname').split(',');
      var planPromo = $(this).data('promoname').split(',');

      tableBody.removeClass('is-active');
      tableBody.eq(thisIndex).addClass('is-active');
      populateData($(this));
      hideColumnFn();
      hightLightBox();
    });

    // *** Expands description
    // ----------------------------------------------------------------------
    tableWrap.find('.exclamation-btn').click(function() {
      var $self = $(this);
      var $expansion = $self.parents('td').find('.desc-box');
      var height = $expansion.children('.desc-box-inner').outerHeight(true) + 8;

      $('.desc-box').css('height', '0px');
      if ($expansion.height() === 0) {
        $expansion.css('height', height + 'px');
      } else {
        $expansion.css('height', '0px');
      }
      $self.toggleClass('is-active');
      $self.parents('tr').siblings().find('.exclamation-btn').removeClass('is-active');
    });


    // *** Hide Column Option
    // ----------------------------------------------------
    function hideColumnFn() {
      var navItems = $('.pricing-nav-item');

      navItems.each(function(){
        if ( $(this).is('.is-active') ) {
          var tableIndex      = $(this).index();
          var hiddenColNum    = $(this).data('hidecol');
          var tableHead = tableWrap.find('thead');
          var tableBody = tableWrap.find('tbody').eq(tableIndex);
          var tableFoot = tableWrap.find('tfoot');

          if ( hiddenColNum > 0 ) {
            tableHead.find('tr td:nth-child(' + hiddenColNum + ')').hide();
            tableBody.find('tr td:nth-child(' + hiddenColNum + ')').hide();
            tableFoot.find('tr td:nth-child(' + hiddenColNum + ')').hide();
          } else {
            tableHead.find('tr td').show();
            tableBody.find('tr td').show();
            tableFoot.find('tr td').show();
          }
        }
      });
    }
    // hideColumnFn();


    // *** Highlight Box
    // ----------------------------------------------------
    var hightLightBox = function () {
      var theWidth;
      var theOffset;
      var activeTable = $('.pricing-table-body.is-active');

      $('.highlight-box').hide();

      if (tableWrap.find('.thead-annual .tag').length) {
        theWidth = activeTable.find("td").outerWidth();
        theOffset = $(".thead-annual").position().left;

        $('.highlight-box').show();
         $('.highlight-box').css('width', theWidth);
         $('.highlight-box').css('left', theOffset);
      }

      else if (tableWrap.find('.thead-semi .tag').length) {
        theWidth = activeTable.find("td").outerWidth();
        theOffset = $(".thead-semi").position().left;

        $('.highlight-box').show();
        $('.highlight-box').css('width', theWidth);
        $('.highlight-box').css('left', theOffset);
      }

      else if (tableWrap.find('.thead-monthly .tag').length) {
        theWidth = activeTable.find("td").outerWidth();
        theOffset = $(".thead-monthly").position().left;

        $('.highlight-box').show();
        $('.highlight-box').css('width', theWidth);
        $('.highlight-box').css('left', theOffset);
      }

      else {
        $('.highlight-box').hide();
      }


    };

    // productOption.click(function() {
    //   hightLightBox();
    // });
    // hightLightBox();


    // $(window).resize(function(){
    //   hightLightBox();
    // });

  }


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
          // $pickerNav.removeClass(active);
          // contents.removeClass(active);
          // $(this).addClass(active)
          // var thisIndex = $(this).index();
          // contents.eq(thisIndex).addClass(active);
        }
      });
    }
  }

  $(window).load(function() {
    // $('#chat-widget-container').addClass('is-active');
    $('.video-modal').addClass('is-load');
  });

  // if ( $('.pricing-page-new').length ) {
  //   // pricingDescktop();
  //   detectBrowserURL();
  // }

  //---aria-selected---//
  var tableItem = $('.pricing-table-body'),
      tableNavItem = $('.pricing-nav-item');

  tableItem.each(function(){
    $(this).hasClass('is-active') ?
    $(this).attr('aria-selected', 'true'):
    $(this).attr('aria-selected', 'false');
  });

  tableNavItem.each(function(){
    $(this).hasClass('is-active') ?
    $(this).attr('aria-selected', 'true') :
    $(this).attr('aria-selected', 'false');
  });

  tableNavItem.click(function(){
    let theIndex = $(this).index();

    tableItem.attr('aria-selected', 'false');
    tableItem.eq(theIndex).attr('aria-selected', 'true');
  });


}(jQuery));
