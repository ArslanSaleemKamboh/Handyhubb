

/*------------------------------
	WINDOW SCROLL
------------------------------*/
$(window).scroll(function(){
	
	/*------------------------------
		FIXED NAVBAR
	------------------------------*/	
	if($(window).width() > 767) {
		if($(window).scrollTop() > 165) {
			$('header.navbar-default').addClass('navbar-small');
			if($('header.navbar-default').hasClass("navbar-static-top")) {
				$('header.navbar-default').removeClass('navbar-static-top');
				$('header.navbar-default').addClass('navbar-fixed-top');
				$('body').css("padding-top","100px");
			}
		}
		
		else if($(window).scrollTop() > 40) {
			$('header.navbar-default').removeClass('navbar-small');
			if($('header.navbar-default').hasClass("navbar-static-top")) {
				$('header.navbar-default').removeClass('navbar-static-top');
				$('header.navbar-default').addClass('navbar-fixed-top');
				$('body').css("padding-top","100px");
			}
		}
				
		else {
			$('header.navbar-default').removeClass('navbar-fixed-top');
			$('header.navbar-default').addClass('navbar-static-top');
			$('body').css("padding-top","0px");
		}
	}
	
	else {
		if($(window).scrollTop()) {
			if($('header.navbar-default').hasClass("navbar-static-top")) {
				$('header.navbar-default').addClass('navbar-offset');
				$('header.navbar-default').removeClass('navbar-static-top');
				$('header.navbar-default').addClass('navbar-fixed-top');
				$('body').css("padding-top","60px");
			}
		}
	}
	
	/*------------------------------
		TRANSPARENT NAVBAR
	------------------------------*/
	if($(window).width() > 1199) {
		if($(window).scrollTop() > 300) {
			$('header.navbar-transparent').addClass('navbar-offset');
		}
		else {
			$('header.navbar-transparent').removeClass('navbar-offset');
		}
	}
	else if($(window).width() > 991) {
		if($(window).scrollTop() > 200) {
			$('header.navbar-transparent').addClass('navbar-offset');
		}
		else {
			$('header.navbar-transparent').removeClass('navbar-offset');
		}
	}
	else if($(window).width() > 767) {
		if($(window).scrollTop() > 100) {
			$('header.navbar-transparent').addClass('navbar-offset');
		}
		else {
			$('header.navbar-transparent').removeClass('navbar-offset');
		}
	}
	else {
		if($(window).scrollTop()) {
			$('header.navbar-transparent').addClass('navbar-offset');
		}
	}
	
	/*------------------------------
		SCROLL TOP
	------------------------------*/
	if($(window).scrollTop() > 300) {
		$("#scrolltop").addClass("in");
	}
	else {
		$("#scrolltop").removeClass("in");
	}
});

/*------------------------------
	DOCUMENT READY
------------------------------*/
$(document).ready(function() {

	var date = new Date();
	date.setDate(date.getDate());
	$(".form_datetime").datetimepicker({
		format: 'yyyy-mm-dd hh:ii',
		autoclose: true,
		startDate: date
	});	
    
    
    
    
    
    
    
    
    
    
    
   /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
     $('#lugimx').val(ratingValue);
    
  });


   /* 1. Visualizing things on Hover - See next part for action on click */
  $('#mystars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });

  /* 2. Action to perform on click */
  $('#mystars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#mystars li.selected').last().data('value'), 10);
     $('#mylugimx').val(ratingValue);
    
  });  




    
    
    
    
    
    
    
    
    
    
		
	/*------------------------------
		SCROLL FUNCTION
	------------------------------*/
	function scrollToObj(target, offset, time) {
		$('html, body').animate({scrollTop: $( target ).offset().top - offset}, time);
	}
	
	$("a.scroll[href^='#']").click(function(){
		scrollToObj($.attr(this, 'href'), 80, 1000);
		return false;
	});
	
	$("#scrolltop").click(function() {
		scrollToObj('body',0, 1000);
    });
	
	/*------------------------------
		COMPARE TABLE
	------------------------------*/
	$('#table-compare').dragtable({
		dragHandle:'.fa-arrows',
		dragaccept:'.accept'
	});
	
	/*------------------------------
		TOOLTIP INIT
	------------------------------*/
	$('.widget-color .checkbox label').tooltip();
	
	/*------------------------------
		SCROLLSPY INIT
	------------------------------*/
	$('body').scrollspy({ target: '#scrollspy-nav', offset:100 });
	
	/*------------------------------
		GRID/LIST TOGGLE
	------------------------------*/
	$('#toggle-grid').click(function(e) {
        $(this).addClass('active');
		$('#toggle-list').removeClass('active');
		$('#products').fadeOut(300, function() {
			$(this).addClass('grid').removeClass('list').fadeIn(300);
		});
    });
	
	$('#toggle-list').click(function(e) {
        $(this).addClass('active');
		$('#toggle-grid').removeClass('active');
		$('#products').fadeOut(300, function() {
			$(this).addClass('list').removeClass('grid').fadeIn(300);
		});
    });
	
	/*------------------------------
		NAVBAR SEARCH
	------------------------------*/
	$('.navbar-search').click(function(e) {
		if($(this).hasClass("open")) {
			$(this).find("i").removeClass("fa-times");
			$(this).find("i").addClass("fa-search");
		}
		else {
			$(this).find("i").removeClass("fa-search");
			$(this).find("i").addClass("fa-times");
		}
	});
	
	$('.navbar-search').on('hide.bs.dropdown', function () {
		$(this).find("i").removeClass("fa-times");
		$(this).find("i").addClass("fa-search");
	});
	
	/*------------------------------
		OWL CAROUSEL
	------------------------------*/
	$("#homepage-1-carousel").owlCarousel({
    	items : 1,
		loop : true,
		autoplay : true,
		nav : true,
		navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn'
  	});
	
	$("#homepage-2-carousel").owlCarousel({
    	items : 1,
		loop : true,
		autoplay : true,
		nav : true,
		navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn'
  	});
	
	$("#homepage-3-carousel").owlCarousel({
    	items : 1,
		loop : true,
		autoplay : true,
		nav : true,
		navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn'
  	});
	
	$("#homepage-4-carousel").owlCarousel({
    	items : 1,
		loop : true,
		autoplay : true,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn'
  	});
	
	$("#homepage-6-carousel").owlCarousel({
    	items : 1,
		loop : false,
		autoplay : false,
		dots : false,
  	});
	
	$("#testimonials-carousel").owlCarousel({
    	items : 1,
		loop : true,
		autoplay : true,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn'
  	});
	
	$("#blog-post-gallery").owlCarousel({
    	items : 1,
		loop : true,
		nav : true,
		dots : false,
		autoplay : true,
		navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
 	});
	
	$("#brands-carousel").owlCarousel({
		loop : true,
		autoplayHoverPause : true,
		autoplay : true,
		autoplayTimeout : 2000,
		smartSpeed : 1000,
		dots : false,
		responsive:{
			0:{
				items:2,
			},
			480:{
				items:3,
			},
			600:{
				items:4,
			},
			768:{
				items:5,
			},
			1200:{
				items:6,
			}
		}
  	});
	
	$("#product-carousel").owlCarousel({
    	items : 1,
		loop : true,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn'
  	});
	
	$('#product-quickview').on('shown.bs.modal', function (e) {
		
		$("#product-quickview").find(".product-carousel-wrapper").removeClass('hidden');
		
		$("#product-carousel-modal").owlCarousel({
			items : 1,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
		});
		
		
	})
	
	$("#default-carousel").owlCarousel({
    	items : 1,
		loop : true,
		autoplay : true,
		nav : true,
		navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
  	});
	
	$("#default-carousel-fade").owlCarousel({
    	items : 1,
		loop : true,
		autoplay : true,
		nav : true,
		navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn'
  	});
	
	/*------------------------------
		PRODUCT QUANTITY
	------------------------------*/			
	
	//$(document).on('click', '#qty-plus', function(e){
	$('#qty-plus').click(function(e) {
		console.log('Clicked Qty-plus');
		var temp = $('input#qty').val();
		$('#qty').attr("value",parseInt(temp) + 1);
	});
	
	//$(document).on('click', '#qty-minus', function(e){	
	$('#qty-minus').click(function(e) {	
		console.log('Clicked Qty-minus');
		var temp = $('#qty').val();
		if(parseInt(temp) > 0) {
			$('#qty').attr("value",parseInt(temp) - 1);
		}
	});
	
	//$(document).on('click', '#modal-qty-plus', function(event){
	$('#modal-qty-plus').click(function(e) {
		console.log('Clicked modal Qty-plus');
		//var temp = $('input#modal-qty').val();
		var qty_plus_amount = $(e.target).parent().find('input#modal-qty').val();
		console.log('qty_plus_amount: '+qty_plus_amount);
		var qty_plus_amount = parseInt(qty_plus_amount) + 1;

		//$('input#modal-qty').attr("value",parseInt(temp) + 1);
		$(e.target).parent().find('input#modal-qty').val(qty_plus_amount);
		
		console.log('qty_plus_amount final: '+qty_plus_amount);
		return false;
	});
	
	//$(document).on('click', '#modal-qty-minus', function(e){
	$('#modal-qty-minus').click(function(e) {
		console.log('Clicked modal Qty-mius');
		//var temp = $('#modal-qty').val();
		var qty_plus_amount = $(e.target).parent().find('input#modal-qty').val();
		console.log('qty_plus_amount: '+qty_plus_amount);
		var qty_plus_amount = parseInt(qty_plus_amount) - 1;

		if(parseInt(qty_plus_amount) > 0) {
					console.log('qty_plus_amount > greater: '+qty_plus_amount);

					$(event.target).parent().find('input#modal-qty').val(qty_plus_amount);

		}
	});
	
	/*------------------------------
		WIDGET - PRICE FILTER
	------------------------------*/			
	var minimum = 20;
	var maximum = 300;
	
	$( "#slider-range" ).slider({
      range: true,
      min: minimum,
      max: maximum,
      values: [ minimum, maximum ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] );
		$( "#amount2" ).val( "$" + ui.values[ 1 ] );
      }
    });
	
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ));
	$( "#amount2" ).val( "$" + $( "#slider-range" ).slider( "values", 1 ));
	
	/*------------------------------
		YOUTUBE VIDEO BACKGROUND
	------------------------------*/
	$(".player").YTPlayer();
	
	
	/*------------------------------
		GOOGLE MAP
	------------------------------*/	
	var regions = [
		{lat: 33.7224618, lng: -84.5074994},
		//{lat: 40.715915, lng: -73.994263},
		//{lat: 52.526258, lng: 13.430727},
		{lat: 33.7678358, lng: -84.4906438}
	];

	var coordinates = [
		//[{lat: 33.7224618, lng: -84.5074994}, "1180 Utoy Springs Rd SW\nAtlanta, GA 30331"], //Atlanta
		[{lat: 33.7224618, lng: -84.5074994}, "1180 Utoy Springs Rd SW\nAtlanta, GA 30331"] //Atlanta
	];
	
	var markers = [];
	
	var map;
	
	var zoom = 13;
	if($(window).width() < 768) {
		zoom = zoom - 1;
	}
	
	// GOOGLE MAP INIT
	function initialize($) {
		var mapOptions = {
		  	zoom: zoom,
		  	center: regions[0],
		  	navigationControl: false,
		  	mapTypeControl: false,
		  	scaleControl: false,
		  	draggable: true,
			scrollwheel: false
		}
		map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
		google.maps.event.addListenerOnce(map, 'idle', putmarkers);
	}
	
	function putmarkers($) {	
		for (var i = 0; i < coordinates.length; i++) {
			addMarkerWithTimeout(coordinates[i][0], coordinates[i][1], i+1, i * 400);
		}
	}
	
	if($("#map-canvas").length) {
		google.maps.event.addDomListener(window, 'load', initialize);
	}
	
	function addMarkerWithTimeout(position, text, store, timeout) {
	  	window.setTimeout(function() {
			
			var marker = new google.maps.Marker({
				position: position,
		  		map: map,
				title: text,
				url: "#marker-" + store,
		  		animation: google.maps.Animation.DROP
			});
					
			google.maps.event.addListener(marker, 'click', function() {
				scrollToObj(marker.url, 80, 800);
			});
			
			google.maps.event.addListener(marker, 'mouseover', function (event) {
				$("#map-tooltip").html("<p>" + marker.title + "</p>");
			});
			
			google.maps.event.addListener(marker, 'mouseout', function (event) {
				$("#map-tooltip").html('');
			});
						
			markers.push(marker);
	  	}, timeout);
	}
				
	$('#change-region').change(function(e) {
		var res = $(this).val();
		map.panTo(regions[res-1]);
		activaTab("region-" + res.toString());
    });
	
	function activaTab(tab){
		$('#tabs-regions .nav-tabs a[href="#' + tab + '"]').tab('show');
		
	};
	

	
	
	
});


/*------------------------------
	CUSTOM FUNCTIONS
------------------------------*/
function print_window(){
	var e=window;
	e.document.close(),
	e.focus(),
	e.print(),
	e.close()
}


function runemail_check(){


				var register_email = $('input#register_email').val();
				var register_email_length = register_email.length;
				
				if(register_email_length < 7) return false;
				
				if(!register_email) {
					$('button#register_userButton').attr("disabled", "disabled")
					.addClass('btn-danger').removeClass('btn-warning');
					
					$('button#register_userButton').text('Email Missing');
					  return false; 
				 }


}

function rundiscountemail_check(){


				var register_email = $('input#discount_email_capture').val();
				var register_email_length = register_email.length;
				// discountmodal-hide
				
				if(register_email_length < 7) return false;
				
				if(!register_email) {
					$('button#discount_email_capture').attr("disabled", "disabled")
					.addClass('btn-danger').removeClass('btn-warning');
					
					$('button#register_userButton').text('Email Missing');
					  return false; 
				 }


}

// toaster
function showSaveToCart(){

	console.log('showSaveSuccess Move to a toaster!');

	Command: toastr["success"]("Added To Cart.", "THANKS!")
	
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": false,
	  "positionClass": "toast-top-center",
	  "preventDuplicates": true,
	  "onclick": null,
	  "showDuration": "30",
	  "hideDuration": "60",
	  "timeOut": "5",
	  "extendedTimeOut": "5",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn"
	  
	}
}

function showSaveSuccess(){

	console.log('showSaveSuccess Move to a toaster!');

	Command: toastr["success"]("Saving Was Successful", "GREAT!")
	
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": false,
	  "positionClass": "toast-top-center",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
}

// toaster
function showCartItemRemoved(){

	console.log('showCartItemRemoved Move to a toaster!');

	Command: toastr["success"]("That It Was Removed", "Sorry!")
	
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": false,
	  "positionClass": "toast-top-center",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
}





