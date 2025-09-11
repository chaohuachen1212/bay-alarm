(function($) {

  // Dasari Srinivas - 2014
  // blog.sodhanalibrary.com/2014/01/responsive-menu-or-navigation-bar-with.html
  function alignMenu() {
    var w = 0,
        // mw = $('#horizontal').width() - 95,
        mw = 1024 - 95,
        i = -1,
        menuhtml = ''; 

    $('#horizontal').children().each(function() {
      i++;
      w += $(this).outerWidth(true);
      if (mw < w) {
        menuhtml += $('<div>').append($(this).clone()).html();
        $(this).remove();
      }
    });

    $('#horizontal').append(
      '<li style="position: relative;" class="hideshow">' +
      '<a href="#!" class="more">more '+
      '<svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.22781 1.23456C1.53155 0.922139 2.02401 0.922139 2.32775 1.23456L8 7.06887L13.6722 1.23456C13.976 0.922139 14.4685 0.922139 14.7722 1.23456C15.0759 1.54698 15.0759 2.05351 14.7722 2.36593L8.54997 8.76593C8.24623 9.07835 7.75377 9.07835 7.45003 8.76593L1.22781 2.36593C0.924065 2.05351 0.924065 1.54698 1.22781 1.23456Z" fill="#3C3A42" stroke="#3C3A42" stroke-linecap="round" stroke-linejoin="round"/></svg>' +
      '</a><ul>' + menuhtml + '</ul></li>'
    );

    $('#horizontal li.hideshow ul').css('top',
      $('#horizontal li.hideshow').outerHeight(true) + 'px'
    );

    $('#horizontal li.hideshow').on('click', function() {
      $(this).children('ul').toggleClass('is-active');
    });

    if (menuhtml === '') {
        $("#horizontal li.hideshow").hide();
    } else {
        $("#horizontal li.hideshow").show();
    }
  }

  if ($('.blog-categories').length) {

    alignMenu();

    // $(window).resize(function() {
    //   $('#horizontal').append($('#horizontal li.hideshow ul').html());
    //   $('#horizontal li.hideshow').remove();
    //   alignMenu();
    // });

    $(document).ready(function() {
      $('.blog-categories > ul').addClass('is-active');
    });
  }

}(jQuery));