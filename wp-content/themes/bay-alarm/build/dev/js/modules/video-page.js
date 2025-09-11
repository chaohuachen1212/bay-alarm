(function($) {

  var $container = $('.videos-page .video-grid');

  var $grid = $container.isotope({
    itemSelector: '.video-item',
    layoutMode: 'fitRows',
    getSortData: {
      lengthasc: '[data-length] parseInt',
      lengthdesc: '[data-length] parseInt',
      dateasc: '[data-date] parseInt',
      datedesc: '[data-date] parseInt'
    },
    sortAscending: {
      lengthasc: true,
      lengthdesc: false,
      dateasc: true,
      datedesc: false
    }
  });

  // ==================================================================
  // Filter Select
  // ==================================================================
  var $filterSelects = $('.filters-button-group select');
  $filterSelects.change( function() {
    var exclusives = [];
    var inclusives = [];

    $filterSelects.each( function( i, elem ) {
      if ( $(elem).find("option:selected").attr('data-filter') ) {
        exclusives.push( $(elem).find("option:selected").attr('data-filter') );
      }
    });

    exclusives = exclusives.join('');

    var filterValue;
    if ( inclusives.length ) {
      filterValue = $.map( inclusives, function( value ) {
        return value + exclusives;
      });
      filterValue = filterValue.join(', ');
    } else {
      filterValue = exclusives;
    }

    $grid.isotope({ filter: filterValue });
  });


  // ==================================================================
  // Sorting Select
  // ==================================================================
  var $sortSelects = $('.sort-by-button-group select');
  $sortSelects.change( function() {
    var exclusives = [];
    var inclusives = [];

    $sortSelects.each( function( i, elem ) {
      if ( $(elem).find("option:selected").attr('data-sort-value') ) {
        exclusives.push( $(elem).find("option:selected").attr('data-sort-value') );
      }
    });

    exclusives = exclusives.join('');

    var filterValue;
    if ( inclusives.length ) {
      filterValue = $.map( inclusives, function( value ) {
        return value + exclusives;
      });
      filterValue = filterValue.join(', ');
    } else {
      filterValue = exclusives;
    }

    $grid.isotope({ sortBy: filterValue });
  });


  // $('.filters-button-group button').on( 'click', function() {
  //   var filterValue = $(this).attr('data-filter');
  //   $grid.isotope({ filter: filterValue });
  // });


  // $('.sort-by-button-group button').on( 'click', function() {
  //   var sortValue = $(this).attr('data-sort-value');
  //   $grid.isotope({ sortBy: sortValue });
  // });



  // ==================================================================
  // Load more button
  // ==================================================================
  var initShow = 6; //number of items loaded on init & onclick load more button
  var counter = initShow; //counter for load more button
  var iso = $grid.data('isotope'); // get Isotope instance

  function loadMore(toShow) {
    $grid.find(".hidden").removeClass("hidden");

    var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
      return item.element;
    });

    $(hiddenElems).addClass('hidden');
    $grid.isotope('layout');

    //when no more to load, hide show more button
    if (hiddenElems.length === 0) {
      jQuery("#load-more").hide();
    } else {
      jQuery("#load-more").show();
    }
  }

  // if ($container.length) {
  //   loadMore(initShow); //execute function onload
  // }

  //append load more button
  // $grid.after('<button id="load-more" class="v-load-more btn-outline blue">Load More</button>');

  //when load more button clicked
  // $("#load-more").click(function() {
  //   if ($('#filters').data('clicked')) {
  //     //when filter button clicked, set initial value for counter
  //     counter = initShow;
  //     $('#filters').data('clicked', false);
  //   } else {
  //     counter = counter;
  //   }

  //   counter = counter + initShow;

  //   loadMore(counter);
  // });



  // ==================================================================
  // Search
  // ==================================================================
  var qsRegex;

  // init Isotope
  var $grid1 = $container.isotope({
    itemSelector: '.video-item',
    layoutMode: 'fitRows',
    filter: function() {
      return qsRegex ? $(this).text().match( qsRegex ) : true;
    }
  });

  

  // debounce so filtering doesn't happen every millisecond
  function debounce( fn, threshold ) {
    var timeout;
    return function debounced() {
      if ( timeout ) {
        clearTimeout( timeout );
      }
      function delayed() {
        fn();
        timeout = null;
      }
      timeout = setTimeout( delayed, threshold || 100 );
    };
  }


  // use value of search field to filter
  var $quicksearch = $('#v-search-bar').keyup( debounce( function() {
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );
    $grid1.isotope();
  }, 200 ) );

}(jQuery));
