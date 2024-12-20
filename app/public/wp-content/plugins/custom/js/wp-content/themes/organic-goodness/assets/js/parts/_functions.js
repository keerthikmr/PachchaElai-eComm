(function($) {

	"use strict";

	$.fn.attachDragger = function() {
		var attachment = false, lastPosition, position, difference;
		$( $( this ).selector ).on(
			"mousedown mouseup mousemove",
			function(e){
				if ( e.type === "mousedown" ) {
					attachment = true;
					lastPosition = [e.clientX, e.clientY];
				}
				if ( e.type === "mouseup" ) {
					attachment = false;
				}
				if ( e.type === "mousemove" && attachment === true ) {
					position   = [e.clientX, e.clientY];
					difference = [ (position[0] - lastPosition[0]), (position[1] - lastPosition[1]) ];
					$( this ).scrollLeft( $( this ).scrollLeft() - difference[0] );
					$( this ).scrollTop( $( this ).scrollTop() - difference[1] );
					lastPosition = [e.clientX, e.clientY];
				}
			}
		);
		$( window ).on(
			"mouseup",
			function(){
				attachment = false;
			}
		);
	};

	$.fn.element_on_screen = function () {
		// if the element doesn't exist, abort
		if ($(this).length === 0) {
			return;
		}
		var $window = jQuery(window);
		var viewport_top = $window.scrollTop();
		var viewport_height = $window.height();
		var viewport_bottom = viewport_top + viewport_height;
		var top = $(this).offset().top;
		var height = $(this).height();
		var bottom = top + height;

		return (top >= viewport_top && top < viewport_bottom) ||
			(bottom > viewport_top && bottom <= viewport_bottom) ||
			(height > viewport_height && top <= viewport_top && bottom >= viewport_bottom);
	};

})( jQuery );
