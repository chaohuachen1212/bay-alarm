// (function($) {
//     $(document).ready(function() {
//       // Filter news grid based on category
//       $('.filtering button').on('click', function() {
//         var category = $(this).data('category');
        
//         // Show all news cards
//         if (category === 'all') {
//           $('.news-card').fadeIn();
//         } else {
//           // Hide news cards that don't match the selected category
//           $('.news-card').each(function() {
//             var cardCategory = $(this).data('category');
//             if (cardCategory !== category) {
//               $(this).fadeOut();
//             } else {
//               $(this).fadeIn();
//             }
//           });
//         }
//       });
//     });
//   })(jQuery);

(function($) {
    const $searchForm = $('.search');
    const $searchInput = $searchForm.find('input[type="search"]');
    const $searchResults = $('.srg-search-results');

    $searchInput.on('input', function() {
        const searchTerm = $searchInput.val();
        if (searchTerm.length > 0) {
            fetchSearchResults(searchTerm);
        } else {
            $searchResults.empty().hide();
        }
    });

    $(document).on('click', function(e) {
        const $target = $(e.target);
        if (!$target.closest('.search').length) {
            $searchResults.empty().hide();
        }
    });

    function fetchSearchResults(searchTerm) {
        $searchResults.empty().addClass('loading');
        $.ajax({
            url: myThemeAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'search_articles',
                term: searchTerm,
            },
            success: function(response) {
                if (response) {
                    $searchResults.html(response).show();
                } else {
                    $searchResults.empty().hide();
                }
                $searchResults.removeClass('loading');
            },
            error: function() {
                $searchResults.html('<p>Error occurred. Please try again later.</p>').removeClass('loading');
            }
        });
    }

    // Hide search results on page load
    $searchResults.hide();
})(jQuery);
