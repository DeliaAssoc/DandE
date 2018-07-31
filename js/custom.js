$( document ).ready( function() {

	// VARIABLES
	$modal = $( '.modal-search-window' ),
	$modalClose = $( '.modal-search-window .close' ),
	$mobSearch = $( 'a.mobile-search' ),
	$dsktpSearch = $( 'a.dsktp-search' ),
	$modalVidBtn = $( '.see-how-we-work' ),
	$modalVid = $( '.modal-video-window' ),
	$ModalVidClose = $( '.modal-video-window .close' ),
	$headerHeight = $( '.site-header' ).height(),
	$siteCont = $( '.content-area' ),
	$tb = $( '.team-block' );

	$siteCont.css( 'paddingTop', $headerHeight - 5 );

	// OPEN/CLOSE MOBILE SEARCH
	$mobSearch.on( 'click', function( e ){

		e.preventDefault();
		$modal.fadeIn();

	});

	$dsktpSearch.on( 'click', function( e ){

		e.preventDefault();
		$modal.fadeIn();

	});

	( $modalClose ).on( 'click', function( e ){
		$modal.fadeOut();
	});

	// OPEN/CLOSE VIDEO MODAL
	$modalVidBtn.on( 'click', function( e ){

		e.preventDefault();
		$modalVid.fadeIn();

	});

	( $ModalVidClose ).on( 'click', function( e ){
		$modalVid.fadeOut();
	});

	// OPEN SEARCH FORM
	// $( 'a.search' ).on( 'click', function( e ){

	// 		e.preventDefault();
			
	// 		if ( $('.search-field').hasClass( 'opened' ) ) {
	// 			$('.search-field').removeClass( 'opened' );
	// 		} else {
	// 			$('.search-field').addClass( 'opened' );
	// 		}
	// });

	// DEFAULT PAGE SLIDER
	$( '.hero-slider' ).slick({
		arrows: false
	});

	// CLIENT MODULE SLIDER
	$( '.client-slider' ).slick({
		slidesToShow: 4,
		slideToScroll: 4,
		responsive: [
			{
				breakpoint: 959,
				settings: {
					slidesToShow: 2,
					slideToScroll: 2,
					arrows: false
				}
			},
			{
				breakpoint: 567,
				settings: {
					slidesToShow: 1,
					slideToScroll: 1,
					arrows: false
				}
			}
		]
	});

	// TESTIMONIALS MODULE SLIDER
	$( '.testimonial-slider' ).slick({
		arrows: false,
		dots: true
	});

	// TEAM BLOCK FUNCTIONALITY
	$tb.find( 'a.bio-btn' ).on( 'click', function( e ){
		e.preventDefault();
		$( this ).closest( '.team-block' ).find( '.team-bio-block' ).addClass( 'active' )
	});

	$( '.team-bio-block' ).find( '.close-bio' ).on( 'click', function( e ){
		e.preventDefault();
		$( this ).closest( '.team-bio-block' ).removeClass( 'active' );
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

