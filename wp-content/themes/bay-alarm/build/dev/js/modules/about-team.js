(function($) {

	function activeitemsMission(){
		var items = $('.about-team--mission .mission-dropdown-wrap .item');
		var active = 'is-active';

		items.click(function(){
			items.removeClass(active);
			$(this).addClass(active);
		});
	}

	activeitemsMission();


}(jQuery));