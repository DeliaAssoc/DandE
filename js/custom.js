jQuery( document ).ready( function( $ ) {

	// VARIABLES
	$modal = $( '.modal-search-window' ),
	$modalClose = $( '.modal-search-window .close' ),
	$mobSearch = $( 'a.mobile-search' ),
	$dsktpSearch = $( 'a.dsktp-search' );


	// OPEN/CLOSE MOBILE SEARCH
	$mobSearch.on( 'click', function( e ){

		e.preventDefault();
		$modal.fadeIn();

	});

	$dsktpSearch.on( 'click', function( e ){

		e.preventDefault();
		$modal.fadeIn();

	});

	( $modal || $modalClose ).on( 'click', function( e ){
		$modal.fadeOut();
	});

	// Open search form
	$( 'a.search' ).on( 'click', function( e ){

			e.preventDefault();
			
			if ( $('.search-field').hasClass( 'opened' ) ) {
				$('.search-field').removeClass( 'opened' );
			} else {
				$('.search-field').addClass( 'opened' );
			}
	});


	// Smooth Scroll for Back To Top Button *Thank you CSS-TRICKS*
	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html, body').animate({
				scrollTop: target.offset().top
			}, 1000);
				return false;
			}
		}
	});


});

