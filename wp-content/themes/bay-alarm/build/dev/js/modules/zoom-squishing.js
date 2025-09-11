(function($){
		/* from https://www.bennadel.com/blog/3811-looking-at-how-browser-zoom-affects-css-media-queries-and-pixel-density.htm
		*/

		// Listen for "resize" events.
		window.addEventListener( "resize", handleResizeEvent );
		// Listen for Media Query "change" events.
		// setupMediaQueryListeners();

		// --------------------------------------------------------------------------- //
		// --------------------------------------------------------------------------- //

		// I handle window resize events.
		function handleResizeEvent( event ) {

			// console.group( "%cResize Event", "color: red" );
			// console.log( "Window width:", window.innerWidth );
			// console.log( "Pixel density:", window.devicePixelRatio );
			// NOTE: Safari seems to report the devicePixelRatio as "1" (on my laptop)
			// regardless of what the Zoom is doing. Chrome and Firefox, on the other
			// hand, seem to show an increased pixel density as the Zoom increases.
			// console.groupEnd();

      if (window.devicePixelRatio >= 1.75 && window.devicePixelRatio < 2 && window.innerWidth >= 960) {
       $('html').addClass('zoom-squish-200');

      } else if(window.devicePixelRatio >= 2 && window.devicePixelRatio < 4 && window.innerWidth >= 960) {
        $('html').removeClass('zoom-squish-200');
        //$('html').addClass('zoom-squish-400');

      } else if(window.devicePixelRatio >= 4 && window.innerWidth >= 960) {
				$('html').removeClass('zoom-squish-400');
				$('html').addClass('zoom-squish-ultra');
			} else {
        $('html').removeClass('zoom-squish-200');
        $('html').removeClass('zoom-squish-400');
				$('html').removeClass('zoom-squish-ultra');
      }


		}

		// handle media-query change events.
		function handleMediaQueryChangeEvent( event ) {

			// console.group( "%cMediaQueryList Event", "color: purple" );
			// console.log( "Condition:", event.media );
			// console.log( "Matches:", event.matches );
			// console.groupEnd();

		}

		// --------------------------------------------------------------------------- //
		// --------------------------------------------------------------------------- //

		// I look through the document StyleSheet and setup watchers for any Media Rule
		// in the CSS rule list.
		function setupMediaQueryListeners() {

			var rules = document.styleSheets[ 0 ].cssRules;
			var length = rules.length;

			for ( var i = 0 ; i < length ; i++ ) {

				var rule = rules[ i ];
				var conditionText = ( rule.media && rule.media[ 0 ] );

				// If this isn't a CSS Media Rule, skip it.
				if ( ! conditionText ) {

					continue;

				}

				// Create a watcher for the given CSS Media Rule condition. The condition
				// text will be something like, "screen and (min-width: 900px)". The
				// resultant object allows us to listen for "change" events on that
				// condition relative to the state of the document.
				var mediaQueryList = window.matchMedia( conditionText );

				// CAUTION: You can also use .addEventListener(change); however, that
				// method does not appear to work for Safari. Classic Safari!
				mediaQueryList.addListener( handleMediaQueryChangeEvent );

				// In addition to listening for changes on the media query, we can also
				// check to see if the initial state of the media query matches the
				// current document state.
				// console.group( "Setting up media listener" );
				// console.log( "Condition:", conditionText );
				// console.log( "Initial match:", mediaQueryList.matches );
				// console.groupEnd();

			}

		}
}(jQuery));
