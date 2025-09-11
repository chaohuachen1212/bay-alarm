(function($) {

  var $heroBtn = $('.home-hero .start-btn');
  var btnColor = $heroBtn.data('color');

  function newHomeSlider() {
    const $gallery = $('.home-testimonials-slider').flickity({
      prevNextButtons: false,
      wrapAround: true,
      pageDots: false,
      adaptiveHeight: false,
    });

    

    const $prevButton = $('.home-testimonials .heading-wrap .arrow-l');
    const $nextButton = $('.home-testimonials .heading-wrap .arrow-r');
    const $buttons = $('.home-testimonials .heading-wrap .arrow');

    $buttons.on('click', function () {
      $('.home-testimonials-slider').addClass('is-active');
    });

    $prevButton.on('click', function () {
      $gallery.flickity('previous');
    });

    $nextButton.on('click', function () {
      $gallery.flickity('next');
    });
  }

  newHomeSlider();


  $heroBtn.hover(function() {
    $(this).children('span').css('color', btnColor);
  }, function() {
    $(this).children('span').css('color', '#fff');
  });

  // $('.home-testimonials-slider').slick({
  //   infinite: true,
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   arrows: true,
  //   dots: true,
  //   responsive: [
  //     {
  //       breakpoint: 1024,
  //       settings: {
  //         infinite: true,
  //         centerMode: true,
  //         arrows: false
  //       }
  //     }
  //   ]
  // });



  var $promoBanner = $('.home-promo-banner');

  if ($promoBanner.length) {
    var bannerHeight = $promoBanner.outerHeight(true);
    $('.new-home--hero').css('margin-top', bannerHeight + 'px');

    $(window).resize(function() {
      var bannerHeight = $promoBanner.outerHeight(true);
      $('.new-home--hero').css('margin-top', bannerHeight + 'px');
    });
  }

  if ($('.index').length || $('.home').length) {

     // Dropdown and tab functionality
    const dropdownBtn = document.querySelector('.dropdown-btn');
    const dropdownArrow = document.querySelector('.dropdown-arrow');
    const dropdownContent = document.querySelector('.dropdown-content');
    const tabs = document.querySelectorAll('.tab');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const tabText = tab.textContent;

        // Remove 'active' class from all tabs and tab contents
        tabs.forEach(t => t.classList.remove('active'));

        // Apply 'active' class to the clicked tab
        tab.classList.add('active');

        // Update dropdown button text and close dropdown
        dropdownBtn.textContent = tabText;
        dropdownContent.classList.remove('show');
        dropdownArrow.classList.remove('show');
      });
    });

    dropdownBtn.addEventListener('click', () => {
      dropdownContent.classList.toggle('show');
      dropdownArrow.classList.toggle('show');
    });

    // Set initial dropdown button text and add 'active' class to the first tab
    if (tabs.length > 0) {
      dropdownBtn.textContent = tabs[0].textContent;
      tabs[0].classList.add('active');
    }

    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const index = tab.getAttribute('data-index');
        tabContents.forEach(content => {
          content.classList.remove('active');
        });
        tabContents[index].classList.add('active');
      });
    });

    // Show the first tab initially
    if (tabContents.length > 0) {
      tabContents[0].classList.add('active');
    }
  }

}(jQuery));
