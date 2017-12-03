function resize() {
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	// STICKY FOOTER
	var footerHeight = $('.page-footer').outerHeight();
	var footerTop = (footerHeight) * -1;
	$('.page-footer').css({marginTop: footerTop});
	$('#main-wrapper').css({paddingBottom: footerHeight});
}

$(window).resize(function() {
	resize();
});

var UI = {};

UI.home_page = function(){
};

$(document).ready(function() {
	resize();

	switch($('body').attr('rel')){
		case 'home-page':
			UI.home_page();
		break;
	}

  if($('.slider-home').length > 0){
  	$('.slider-home').flexslider({
  	 animation: "fade",
  	 controlNav: false
   });
  }


	 $("a[href='#top']").click(function() {
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});


		var windowH = $(window).height();
		$('.banner-holder').height(windowH);
		backgroundResize();


		// Add smooth scrolling to all links
  $(".terms .quick-links a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

	// if($(".menu-listing" ).length > 0){
 //    $(".menu-listing" ).accordion({
 //      collapsible: true,
 //      heightStyle: "content",
 //      header: "> ul > li > a"
 //    });
 //  }

});

$( ".sort-link" ).click(function() {
  $( ".sort" ).slideToggle( "slow", function() {
    // Animation complete.
  });
});
$( ".advanced-link" ).click(function() {
  $( ".advanced-holder" ).slideToggle( "slow", function() {
    // Animation complete.
  });
});

$(window).resize(function() {
});


$(window).load(function() {

	resize();

});


/* resize background images */
function backgroundResize(){



    $(".bg").each(function(i){
        var path = $(this);
        // variables
        var contW = path.width();
        var contH = path.height();
        var imgW = path.attr("data-img-width");
        var imgH = path.attr("data-img-height");
        var ratio = imgW / imgH;
        // overflowing difference
        var diff = parseFloat(path.attr("data-diff"));
        diff = diff ? diff : 0;
        // remaining height to have fullscreen image only on parallax
        var remainingH = 0;
        if(path.hasClass("parallax")){
            var maxH = contH > windowH ? contH : windowH;
            remainingH = windowH - contH;
        }
        // set img values depending on cont
        imgH = contH + remainingH + diff;
        imgW = imgH * ratio;
        // fix when too large
        if(contW > imgW){
            imgW = contW;
            imgH = imgW / ratio;
        }
        //
        path.data("resized-imgW", imgW);
        path.data("resized-imgH", imgH);
        path.css("background-size", imgW + "px " + imgH + "px");
    });
}

$(window).resize(backgroundResize);
$(window).focus(backgroundResize);

backgroundResize();
