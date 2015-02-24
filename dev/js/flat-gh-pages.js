(function($) {
  "use strict";

  $.getJSON( "https://api.github.com/repos/yoarts/flat/contributors?per_page=100", function( data ) {
  	var contributors = [];
		$.each( data, function(i, item) {
	    contributors.push( '<div class="col-sm-2"><p><img src="' + data[i].avatar_url + '" class="img-responsive img-circle"><br><a href="' + data[i].html_url + '">' + data[i].login + '</a><br>' + data[i].contributions + ' contributions</p></div>' );
	  });

	  $( "<div/>", {
	    "class": "row text-center",
	    html: contributors.join( "" )
	  }).appendTo( "#contributor-list" );
	});

  // // Add "loaded" class when a section has been loaded
  // $(window).scroll(function() {
  //   var scrollTop = $(window).scrollTop();
  //   $(".section").each(function() {
  //     var elementTop = $(this).offset().top - $('#header').outerHeight();
  //     if(scrollTop >= elementTop) {
  //       $(this).addClass('loaded');
  //     }
  //   });
  // });

  // // One Page Navigation Setup
  // $('.one-page-nav #navigation').singlePageNav({
  //   offset: $('.one-page-nav').outerHeight(),
  //   filter: ':not(.external)',
  //   speed: 750,
  //   currentClass: 'active',

  //   beforeStart: function() {
  //   },
  //   onComplete: function() {
  //   }
  // });

  // // Sticky Navbar Affix
  // $('.one-page-nav').affix({
  //   offset: {
  //     top: $('#topbar').outerHeight(),
  //   }
  // });

  // // Smooth Hash Link Scroll
  // $('.smooth-scroll').click(function() {
  //   if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {

  //     var target = $(this.hash);
  //     target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  //     if (target.length) {
  //       $('html,body').animate({
  //         scrollTop: target.offset().top
  //       }, 1000);
  //       return false;
  //     }
  //   }
  // });

  // $('.nav a').on('click', function(){
  //   if($('.navbar-toggle').css('display') !=='none'){
  //     $(".navbar-toggle").click();
  //   }
  // });

  // var $container = $('.portfolio-isotope');
  // $container.imagesLoaded(function(){
  //   $container.isotope({
  //     itemSelector : '.portfolio-item',
  //     resizable: true,
  //     resizesContainer: true
  //   });
  // });

  // // filter items when filter link is clicked
  // $('#filters a').click(function(){
  //   var selector = $(this).attr('data-filter');
  //   $container.isotope({ filter: selector });
  //   return false;
  // });

  // $('#contactform').submit(function() {
  //   var action = $(this).attr('action');
  //   var values = $(this).serialize();

  //   $.post(action, values, function(data) {
  //     $('.results').hide().html(data).slideDown('slow');
  //     $('#contactform').find('.form-control').val('');
  //   });
  //   return false;
  // });

  // $('.iphone-carousel').on('slid.bs.carousel', function () {
  //   var carouselData = $(this).data('bs.carousel');
  //   var currentIndex = carouselData.getActiveIndex();
  //   $('.section-iphone-features .feature-block').removeClass('active');
  //   $(".section-iphone-features").find("[data-slide-to='" + currentIndex + "']").addClass('active');
  // });
})(jQuery);
