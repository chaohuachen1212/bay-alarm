// B2B Scripts
(function($) {

    // Partners slider
    let $part = $('.partner-logos');

    // Initialize
    $part.slick({
		dots: false,
		infinite: true,
		slidesToShow: 5,
		arrows: false,
        centerMode: false,
		responsive: [
        {
    	    breakpoint: 1024,
            settings: {
                centerPadding: '40px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 991,
            settings: {
                arrows: false,
                centerPadding: '40px',
                slidesToShow: 1,
                dots: true
            }
        }
        ] 
	});

    
    // Our Inovations slider
    let $inn = $('.our-innovations-container');
    
    
    // Initialize
    $inn.slick({
		dots: false,
		infinite: true,
		slidesToShow: 3,
		arrows: false,
        centerMode: false,
		responsive: [
        {
    	    breakpoint: 1024,
            settings: {
                centerPadding: '40px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 991,
            settings: {
                arrows: false,
                centerPadding: '40px',
                slidesToShow: 1,
				centerMode: false,
                dots: true
            }
        }
        ] 
	});

    function countUp() {

        const w = $(window).width(); // get the window width
		
		// Function to add comma after 3 digits
		$.fn.digits = function(){ 
    		return this.each(function(){ 
        		$(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "1,") ); 
    		})
		}

		const stat = $('.single-stat');
		
		// If window is wider than 769 px do the count up animation
		if( w > 769 ) {
			
			// Target the stats
	  		$(stat).each(function() {
				var $this = $(this),
			  	countTo = $this.attr('data-count');
			  	$({ countNum: $this.text()}).animate({
					countNum: countTo
				},
				
				{
					duration: 2000,
					easing:'linear',
					
					step: function() {
						$this.text(Math.floor(this.countNum));
					},
					
					complete: function() {
						$this.text(this.countNum).digits();
					}
				});
			});

		} else {

		// Don't play the animation on phones.  It's annoying.
	  	$(stat).each(function() {

  			var $this = $(this),
			  countTo = $this.attr('data-count');
			  $({ countNum: $this.text()}).animate({
				  countNum: countTo
				},
				
				{
					duration: 0, // set duration to zero to eliminate animation
					easing:'linear',
					
					step: function() {
						$this.text(Math.floor(this.countNum));
					},
					
					complete: function() {
						$this.text(this.countNum).digits();
					}
				});
			});
		} // end if statement
		
	} // end countUp function


    $(document).ready(function () {
		countUp();
  	});

}(jQuery));