(function (jQuery) {
	"use strict";
	jQuery(window).on('load', function (e) {
	/*==================================================
					[ Page-Loader ]
     ==================================================*/
        jQuery("#pq-loading").fadeOut();
        jQuery("#pq-loading").delay(0).fadeOut("slow");

        var Scrollbar = window.Scrollbar;
	/*================================================
            			[humburger]
	================================================*/
	$('.humburger').click(function(){
		$('.header-area .nav-bar').addClass("side-menu-show");
		$(".nv-open-bg").addClass('d-block');
	})
	$('.cls-menu').click(function(){
		$('.header-area .nav-bar').removeClass("side-menu-show");
		$(".nv-open-bg").removeClass('d-block');
	})
	$('.nv-open-bg').click(function(){
		$('.header-area .nav-bar').removeClass("side-menu-show");
		$(".nv-open-bg").removeClass('d-block');
	})
	/*================================================
           			 [banner-slider]
	================================================*/
	var swiper = new Swiper('.banner-area .swiper', {
		slidesPerView: 1,
		spaceBetween: 5,
		loop: true,
		effect: "creative",
		creativeEffect: {
			prev: {
			  shadow: true,
			  translate: [0, 0, -400],
			},
			next: {
			  translate: ["100%", 0, 0],
			},
		  },
		autoplay: {
			delay: 3000,
			disableOnInteraction: false,
		  },
		navigation: {
			nextEl: ".banner-area .swiper-button-next",
			prevEl: ".banner-area .swiper-button-prev",
		  },
		pagination: {
			el: ".banner-area .swiper-pagination",
        	dynamicBullets: true,
			clickable: true,
		  },
	  });
	/*================================================
           			 [testimonial-slider]
	================================================*/
	var swiper = new Swiper('.testi-slider .swiper', {
		slidesPerView: 1,
		spaceBetween: 10,
		centeredSlides: true,
		loop: true,
		breakpoints: {
		  320: {
			slidesPerView: 1,
		  },
		  768: {
			slidesPerView:2.5,
		  },
		  992: {
			slidesPerView:4.5,
			spaceBetween: 10,
		  },
		},
	  });
	/*================================================
           			 [each-special-slider]
	================================================*/
	var swiper = new Swiper('.each-special-slider .swiper', {
		slidesPerView: 1,
		spaceBetween: 10,
		loop: true,
		autoplay: {
			delay: 3500,
			disableOnInteraction: false,
		  },
	  });
	/*================================================
           			 [collectie-slider]
	================================================*/
	var swiper = new Swiper('.collectie-slider .swiper', {
		slidesPerView: 1,
		spaceBetween: 30,
		loop: true,
		navigation: {
			nextEl: ".collectie-slider .swiper-button-next",
			prevEl: ".collectie-slider .swiper-button-prev",
		},
		breakpoints: {
		  320: {
			slidesPerView: 1,
		  },
		  768: {
			slidesPerView:2,
		  },
		  1200: {
			slidesPerView:4,
			spaceBetween: 30,
		  },
		},
	  });
    /*==================================================
    				[ Back To Top ]
    ==================================================*/
    jQuery('#back-to-top').fadeOut();
    jQuery(window).on("scroll", function () {
        if (jQuery(this).scrollTop() > 250) {
            jQuery('#back-to-top').fadeIn(1400);
        } else {
            jQuery('#back-to-top').fadeOut(400);
        }
    });
    jQuery('#top').on('click', function () {
        jQuery('top').tooltip('hide');
        jQuery('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
	/*================================================
           			[ Sticky Header ]
	================================================*/
	var view_width = jQuery(window).width();
	if (jQuery('header').hasClass('pq-has-sticky')) {
		jQuery(window).scroll(function () {
			var scrollTop = jQuery(window).scrollTop();
			if (scrollTop > 50) {
				jQuery('header').addClass('pq-header-sticky animated fadeInDown animate__faster');
			} else {
				jQuery('header').removeClass('pq-header-sticky animated fadeInDown animate__faster');
			}
		});
	}
	/*================================================
           			 [sub-menu]
	================================================*/
	if ($(window).width() < 991) {
		$('.header-area .nav-bar ul li').click(function(){
			$(".sub-menu",this).slideToggle(200);
		})
	}
	if ($(window).width() > 991) {
		$('.header-area .nav-bar ul li').on( "mouseenter", function(){
			$(".sub-menu",this).stop().slideDown(300);
		})
		$('.header-area .nav-bar ul li').on( "mouseleave", function(){
			$(".sub-menu",this).stop().slideUp(300);
		})
	
	}
	document.addEventListener("touchstart", function(){}, true);
	
	AOS.init();

});

})(jQuery);





  