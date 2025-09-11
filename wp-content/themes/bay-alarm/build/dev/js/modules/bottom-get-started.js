(function($) {

  $(".bottom-get-started .prods-container").slick({
    dots: false,
    infinite: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 4000,
    slidesToShow: 1,
    //adaptiveHeight: true,
    asNavFor: '.bottom-get-started .prods-btn-container'
  });

  $(".bottom-get-started .prods-btn-container").slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    //adaptiveHeight: true,
    asNavFor: '.bottom-get-started .prods-container'
  });


}(jQuery));