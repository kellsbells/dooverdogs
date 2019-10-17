(function($) {

	var Site = {
		challengeElement: null,
		context: null,
		currentDiv: '',
		backgroundImages: [],
		scrollHeight: 0,

		/**
		 * Initialize site
		 */
		init: function() {
			Site.smoothScroll();
			Site.mobileNav();
			Site.testimonialSlider();
			Site.stickyNav();
			Site.setActiveImage();
			Site.updateActiveImage();
		},


		smoothScroll: function() {
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
		},

		

		setActiveImage: function() {
			var activeImgSrc = $('.file-list-image.active .attachment-square').attr("src");
			var firstImage = $('.file-list-image')[0];

			if(!activeImgSrc){
				activeImgSrc = firstImage;
			}

			var newImageStyle = "background: url(" + activeImgSrc + ") no-repeat center center; background-size: cover;"

			$('.active-image').attr("style", newImageStyle);
		},

		updateActiveImage: function() {
			
			$(".file-list-image").on('click', function() {

				var currentlyActive = $(".file-list-image.active");

				currentlyActive.removeClass('active');
				$(this).addClass('active');

				Site.setActiveImage();
			});
		},


		debounce: function( fn, delay ) {
			var timer = null;

			return function() {
				var context = this,
					args = arguments;

				clearTimeout( timer );
				
				timer = setTimeout( function() {
					fn.apply(context, args);
				}, delay );
			};
		},

		mobileNav: function(){
			$('.hamburger-helper').on('click', function() {
				$(this).find('.hamburger').toggleClass('active');
				$('.dropdown').toggleClass('active');
			});

			$('.dropdown a').on('click', function() {
				$('.dropdown').removeClass('active');
				$('.hamburger').removeClass('active');
			});
		},

		stickyNav: function() {
			var yourNavigation = $(".home .header-desktop");

			if(yourNavigation.offset()){

				var num = yourNavigation.offset().top; //number of pixels before modifying styles

				$(window).bind('scroll', function () {
				    if ($(window).scrollTop() > num) {
				        yourNavigation.addClass("sticky");
				    } else {
				        yourNavigation.removeClass("sticky");
				    }
				});
			}
		},

		testimonialSlider: function() {
			$('.js-testimonials').slick({
				infinite: true,
				slidesToShow: 2,
				slidesToScroll: 1,
				autoplay: true,
  				autoplaySpeed: 2000,
  				arrows: false,
  				dots: true,
  				adaptiveHeight: true,
  				responsive: [
  					{
  						breakpoint: 800,
  						settings: {
  							slidesToShow: 1,
  						}
  					}
  				]
			});
		},
	};

	$(document).ready(function() {
		Site.init();
	});

	// Chain any click events here

})(jQuery);