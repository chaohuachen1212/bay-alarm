(function($) {
  var active = 'is-active';

  function calculatorPriceCompare() {
    var by1 = $('.price-compare--table .table.is-active .cost-row.bam .bam-row-wrap .one p').text().split(",").join('');
    var dy1 = $('.price-compare--table .table.is-active .cost-row .cel-wrap.is-active .one p').text().split(",").join('');
    var sav1 = dy1 - by1;
    $('.price-compare--table .cost-row.savings .price-cell.one p').text(sav1.toFixed(2));

    var by2 = $('.price-compare--table .table.is-active .cost-row.bam .bam-row-wrap .two p').text().split(",").join('');
    var dy2 = $('.price-compare--table .table.is-active .cost-row .cel-wrap.is-active .two p').text().split(",").join('');
    var sav2 = dy2 - by2;
    $('.price-compare--table .cost-row.savings .price-cell.two p').text(sav2.toFixed(2));

    var by3 = $('.price-compare--table .table.is-active .cost-row.bam .bam-row-wrap .three p').text().split(",").join('');
    var dy3 = $('.price-compare--table .table.is-active .cost-row .cel-wrap.is-active .three p').text().split(",").join('');
    var sav3 = dy3 - by3;
    $('.price-compare--table .cost-row.savings .price-cell.three p').text(sav3.toFixed(2));
  }

  function showValCompare() {
    var activeItem = $('.price-compare--table .table.is-active .cost-row .comp-dropdown li.is-active').html();
    var showItem = $('.price-compare--table .table.is-active .cost-row .show-val');
    showItem.html(activeItem);
  }


  function drodownPriceCompare(){
    var selectItem = $('.price-compare--table .table.is-active .cost-row .show-val-wrap');
    var items = $('.price-compare--table .table.is-active .cost-row .comp-dropdown li');
    var showItem = $('.price-compare--table .table.is-active .cost-row .show-val');
    selectItem.click(function(){
      $('.price-compare--table .table.is-active .cost-row .comp-dropdown').addClass(active);
    });

    items.click(function(){
      items.removeClass(active);
      $(this).addClass(active);
      var currentIndex = $(this).index();
      var cols = $('.price-compare--table .table.is-active .cost-row.comp .cel-wrap');
      var currentItem = $(this).html();
      var currentVal = $(this).attr('data-item');
      var bamRows = $('.price-compare--table .table.is-active .cost-row.bam .bam-row-wrap');


      showItem.html(currentItem);
      cols.removeClass(active);
      cols.each(function(){
        var dataComp =  $(this).attr('data-comp');
        var currentCol = $(this);
        if (dataComp === currentVal ) {
          currentCol.addClass(active);
        }
      });

      bamRows.removeClass(active);
      bamRows.eq(currentIndex).addClass(active);
      $('.price-compare--table .table.is-active .cost-row .comp-dropdown').removeClass(active);
      calculatorPriceCompare();
    });
  }


  function calculatorPriceCompareMobile() {
    var by1 = $('.price-compare--mobile .box-wrap.is-active .cost-row.bam .bam-row-wrap .one p').text().split(",").join('');
    var dy1 = $('.price-compare--mobile .box-wrap.is-active .cost-row.comp.is-active .one p').text().split(",").join('');
    var sav1 = dy1 - by1;
    $('.price-compare--mobile .box-wrap.is-active .cost-row.savings .price-cell.one p').text(sav1.toFixed(2));

    var by2 = $('.price-compare--mobile .box-wrap.is-active .cost-row.bam .bam-row-wrap .two p').text().split(",").join('');
    var dy2 = $('.price-compare--mobile .box-wrap.is-active .cost-row.comp.is-active .two p').text().split(",").join('');
    var sav2 = dy2 - by2;
    $('.price-compare--mobile .box-wrap.is-active .cost-row.savings .price-cell.two p').text(sav2.toFixed(2));

    var by3 = $('.price-compare--mobile .box-wrap.is-active .cost-row.bam .bam-row-wrap .three p').text().split(",").join('');
    var dy3 = $('.price-compare--mobile .box-wrap.is-active .cost-row.comp.is-active .three p').text().split(",").join('');
    var sav3 = dy3 - by3;
    $('.price-compare--mobile .box-wrap.is-active .cost-row.savings .price-cell.three p').text(sav3.toFixed(2));
  }


  function drodownPriceCompareMobile() {
    var selectItem = $('.price-compare--mobile .box-wrap.is-active .empty-click');
    var dropWrap = $('.price-compare--mobile .box-wrap.is-active .select');
    var items = $('.price-compare--mobile .box-wrap.is-active .mobile-comp-dropdown li span');
    var lis = $('.price-compare--mobile .box-wrap.is-active .mobile-comp-dropdown li');
    selectItem.click(function(){
      dropWrap.addClass(active);
    });

    items.click(function(){
      lis.removeClass(active);
      $(this).closest('li').addClass(active);
      $(this).closest('.select').removeClass(active);
      var cols = $('.price-compare--mobile .box-wrap.is-active .comp-rows-wrap .cost-row');
      var currentItem = $(this).text();
      var currentVal = $(this).closest('li').attr('data-item');
      var bamRows = $('.price-compare--mobile .box-wrap.is-active .cost-row.bam .bam-row-wrap');
      var currentIndex = $(this).closest('li').index();

      bamRows.removeClass(active);
      bamRows.each(function(){
        var currentColIndex = $(this).index() - 1;
        if (currentColIndex === currentIndex ) {
          $(this).addClass(active);
        }
      });

      cols.removeClass(active);
      cols.each(function(){
        var dataComp =  $(this).attr('data-comp');
        var currentCol = $(this);
        if (dataComp === currentVal ) {
          currentCol.addClass(active);
        }
      });

      calculatorPriceCompareMobile();
    });
  }

  function choosetabClick() {
    var navItems = $('.product-nav-list .nav-item');
    var desktopTable = $('.price-compare--table .table');
    var boxWrap = $('.price-compare--mobile .box-wrap');
    // var mobileDropdownItems = $('.price-compare--mobile .box-wrap.is-active .mobile-comp-dropdown li');

    navItems.click(function(){
      var currentIndex = $(this).index();
      desktopTable.removeClass(active);
      desktopTable.eq(currentIndex).addClass(active);
      drodownPriceCompare();
      showValCompare();
      calculatorPriceCompare();

      boxWrap.removeClass(active);
      boxWrap.eq(currentIndex).addClass(active);
      calculatorPriceCompareMobile();
      drodownPriceCompareMobile();
      // dropdownItems.eq(currentIndex).click();
    });


  }



  if ($('.pricing-page').length || $('.pricing-page-new').length) {
    calculatorPriceCompare();
    showValCompare();
    drodownPriceCompare();
    calculatorPriceCompareMobile();
    drodownPriceCompareMobile();
    choosetabClick();
  }


}(jQuery));
