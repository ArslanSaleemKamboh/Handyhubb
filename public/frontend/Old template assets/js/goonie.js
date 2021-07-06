// JavaScript Document


/*

		var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		
		if(testEmail.test(join_e)){
		 		 //return true;
			$('input#join_email').removeClass("has-error active").addClass("has-success");
				console.log('Good Email');

		}else{
				console.log('Bad Email');
			
		 $('input#join_email').removeClass("has-success active").addClass("has-error");
		 alert('Sorry Your Email Is Not Valid');
		 
		 return false;
		}
		


*/

/iP/i.test(navigator.userAgent) && $('*').css('cursor', 'pointer');



		function ValidateEmail(mail) 
		{
		 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('input#usr_email_submit').val()))
		  {
			return (true)
			console.log('true');
		  }
			alert("You have entered an invalid email address!")
			console.log('false');
			return (false)
		}


$(document).ready(function(){



	
		$(document).on('click', 'a', function(){
			var href = $(this).attr('href');
			
			if(href == '#'){
				return false;
			}
		});
	
		$(document).on('click', '#hide_modal_advertising', function(){
				$('#modalAdvertising').modal('hide');
		});

		$(document).on('click', '#hide_modal_pin', function(){
				$('#modalPinVerify').modal('hide');
		});

		$(document).on('click', '#submit_pinverify', function(){
			
		var usr_hasa_pin = $('input#usr_hasa_pin').val().trim();
		var user_token = $('input#user_token').val();
		var user_cookie = $('input#user_cookie').val();
		var user_id = $('input#user_id').val();
		var visitor_id = $('input#visitor_id').val();
		var usr_hasa_pin_cnt = usr_hasa_pin.length;
		
		if(usr_hasa_pin_cnt < 3){
			alert('Sorry Not Enough Digits');
			return false;
			
		}
		
				$.post('models/script_verify_pin.php', {
						user_token: user_token,
						user_cookie: user_cookie,
						user_id: user_id,
						usr_hasa_pin: usr_hasa_pin,
						usr_hasa_pin_cnt: usr_hasa_pin_cnt,
						visitor_id: visitor_id
								
					}, function(data){
						console.log('data verify pin'+data);
						$('div#debug_console').html(data);
				});
		});



		

	
		if($("input#visitor_hide_adverts").val() == 1) {
			$('#modalAdvertising').modal('hide');
		}else{
			$('#modalAdvertising').modal('show');
		}

		//Validates Email When Changed.
		$(document).on('change', 'input#usr_email_submit', function(){
			
			console.log('change input#usr_email_submit: ');
			//ValidateEmail();
			 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val()))
			  {
				
				console.log('true');
				$(this).closest('.form-group').removeClass('has-error').addClass('has-success');
				return (true)
			  }
				$(this).closest('.form-group').addClass('has-error').removeClass('has-success');
				alert("You have entered an invalid email address!")
				console.log('false');
				return (false)
			
			
			

		});
		
		
		
		$(document).on('change', 'input#user_email',function(){
			
			console.log('change input#user_email ');
			//ValidateEmail();
			 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(this).val()))
			  {
				
				console.log('true');
				$(this).closest('div').removeClass('has-error').addClass('has-success');
				return (true)
			  }
				$(this).closest('div').addClass('has-error').removeClass('has-success');
				alert("You have entered an invalid email address!")
				console.log('false');
				return (false)
			
			
			

		});

		
		//Starts Cursor to go to the beginning when clicked.
		$(document).on('click', 'input#zipcode_search_home',function(){
			
			console.log('clicked input#zipcode_search_home: ');
			
			$("input#zipcode_search_home").focus();
			$("input#zipcode_search_home").get(0).setSelectionRange(0,0);

		});

		$(document).on('click', 'input#usrsrvc_zipcode',function(){
			
			console.log('clicked input#zipcode_search_home: ');
			
			$("input#usrsrvc_zipcode").focus();
			$("input#usrsrvc_zipcode").get(0).setSelectionRange(0,0);

			$('#usrsrvc_zipcode_style_res').removeClass("has-error");

		});

		$('input#usrsrvc_cellphone').on('click', function(){
			
			console.log('clicked input#zipcode_search_home: ');
			
			$("input#usrsrvc_cellphone").focus();
			$("input#usrsrvc_cellphone").get(0).setSelectionRange(0,0);

		});
		
		
		$(document).on('click', 'input#usrbill_cellphone', function(){
			
			console.log('clicked input#usrbill_cellphone: ');
			
			$("input#usrbill_cellphone").focus();
			$("input#usrbill_cellphone").get(0).setSelectionRange(0,0);

		});
		
		$(document).on('click', 'input#usr_cellnumber', function(){
			
			console.log('clicked input#usr_cellnumber: ');
			
			$("input#usr_cellnumber").focus();
			$("input#usr_cellnumber").get(0).setSelectionRange(0,0);

		});

		$(document).on('click', 'input#usrbill_zipcode', function(){
			
			console.log('clicked input#usrbill_zipcode: ');
			
			$("input#usrbill_zipcode").focus();
			$("input#usrbill_zipcode").get(0).setSelectionRange(0,0);

		});
		
		
		
	

	$(document).on('click', 'div#simplenewsletter-widgetTXT input#modal-hide', function(event){
			
			
			$('div#debug_console').html('');
			
			console.log('clicked input#modal-hide: ');
	
			var _this = $(this).html();
			console.log('_this: ' + _this);
			
	
			if ($('input#modal-hide').is(':checked')) {
			// if so, give value a 1 value for okay
				var hide_me = 1;
			}else{
				var hide_me = 0;
			}

			console.log('hide_me: ' + hide_me);


		var user_token = $('input#user_token').val();
		var user_cookie = $('input#user_cookie').val();
		var user_id = $('input#user_id').val();
		var visitor_id = $('input#visitor_id').val();
		

		$.post('/models/ajax-manage_public_advertisments.php', {
			user_token: user_token,
			user_cookie: user_cookie,
			user_id: user_id,
			hide_me: hide_me,
			visitor_id: visitor_id
			}, function(data){
			
			
			console.log('data: '+data);
			$('div#debug_console').html(data);
			
		});


		
		//$('div#modalAdvertising').hide();







	});








	
		$(document).on('click', 'a#cart_id.remove', function(){
			console.log('clicked remove from cart');
	
			var user_token = $('input#user_token').val();
			var user_cookie = $('input#user_cookie').val();
			var user_id = $('input#user_id').val();
			var visitor_id = $('input#visitor_id').val();
			
			var item_id = $(this).attr('rel');
			console.log('id: '+item_id);
			$(this).closest('li').hide();
			console.log('hid it: ');			
			
			$.post('/models/ajax-remove_cart.php', {
				user_token: user_token,
				user_cookie: user_cookie,
				user_id: user_id,
				visitor_id: visitor_id,
				item_id: item_id
				}, function(data){
				
				
				console.log('data: '+data);
				$('div#debug_console').html(data);
				
			});
	
			console.log('Reloading Shopping Cart to cart');
			reloadShoppingCart();
			//$(this).closest('li').hide();
			
		});
		
	
		
		
		$(document).on('click', 'button#submit_percentpromo', function(){
	
			if ($('input#modal-hide').is(':checked')) {
			// if so, give value a 1 value for okay
				var hide_me = 1;
			}else{
				var hide_me = 0;
			}
	
			console.log('hide_me: ' + hide_me);
	
			
			var discount_email_capture = $('input#discount_email_capture').val();
			
			var user_token = $('input#user_token').val();
			var user_cookie = $('input#user_cookie').val();
			
			
			
			$.post('/models/ajax-subscribe_capturediscount.php', {
				user_token: user_token,
				user_cookie: user_cookie,
				hide_me: hide_me,
				discount_email_capture: discount_email_capture
				}, function(data){
				
				
				
				$('div#debug_console').html(data);
				
			});
		});
	
		$(document).on('click', 'button#submit_newsletter_subscribe', function(){
			
			var newsletter_subscribe_email_capture = $('input#newsletter_subscribe_email_capture').val();
			
			var user_token = $('input#user_token').val();
			var user_cookie = $('input#user_cookie').val();
			var user_id = $('input#user_id').val();
			var visitor_id = $('input#visitor_id').val();
			
			
			
			$.post('/models/ajax-subscribe_newsletter.php', {
				user_token: user_token,
				user_cookie: user_cookie,
				user_id: user_id,
				visitor_id: visitor_id,
				newsletter_subscribe_email_capture: newsletter_subscribe_email_capture
				}, function(data){
				
				
				
				$('div#debug_console').html(data);
				
			});
		});
		
		
		$(document).on('click', '.product-quickview', function(event){
			
			console.log('Quick Modal View Clicked');
	
				var item_url = $(this).find('a').attr('rel');
				//var item_link = 'prospect.dealer.php?prospctdlrid='+propspect_id;
	
				console.log('showing: '+item_url);
	
				$("div#product_quickview_body").load('' + item_url + " article.product-item.product-single", function() {
					
					$.getScript("assets/js/custom.js");
					$.getScript("assets/js/page/custom.service.js");
					
					$("#product-quickview").find(".product-carousel-wrapper").removeClass('hidden');
			
					$("#product-carousel-modal").owlCarousel({
						items : 1,
						animateOut: 'fadeOut',
						animateIn: 'fadeIn',
					});
	
				}).show();
			
		})
		
		
		$('a#bookAppointment').on('click', function(data){
			
			
			
			$('div#modalBookAppointment').modal({
													backdrop: 'static',
													keyboard: false
												});
			
			
				//$('div#debug_console').html(''+data);
			
		});
	
	
		$('a#public_register_link').on('click', function(data){
			
			
			
			$('div#modalRegisterUser').modal({
													backdrop: 'static',
													keyboard: false
												});
			
			
				//$('ddiv#debug_console').html(''+data);
			
		});
		









		
		//open modal window
		$('#myAcctLogin').on('click', function(){
			
			$('div#modalLoginUser').modal('show');
			
		});


		//Login for modal window
		$(document).on('change', 'select#pick_aservice_jumpmenu', function(){
			var user_token = $('input#user_token').val();
			var user_cookie = $('input#user_cookie').val();
			
			var _url = $(this).val();
			
			
			document.location = '/services/'+_url;
	

	
	
		});


		//Login for modal window
		$('button#login_submit_btn').on('click', function(){
			var user_token = $('input#user_token').val();
			var user_cookie = $('input#user_cookie').val();
			var user_email = $('input#user_email_submit').val();
			var user_password = $('input#user_login_password').val();
	
			$.post('models/ajax-user-login.php', {
				user_token: user_token,
				user_cookie: user_cookie,
				user_email: user_email,
				user_password: user_password
				
				}, function(data){
					
					console.log('login_email + password submission: '+data);
					$('div#debug_console').html(data);
					
			});
	
	
		});


	

		
	
	
		$('button#btn_zipcode_search').on('click', function(){
	
			 processZipCodeInput();
		});
		
		
		$('button#btn-search').on('click', function(){
			var user_token = $('input#user_token').val();
			var user_cookie = $('input#user_cookie').val();
			var user_search_field = $('input#user_search_field').val();
			
			$.get('models/ajax-user-login.php', {
				user_token: user_token,
				user_cookie: user_cookie,
				user_search_field: user_search_field
				
				}, function(data){
					
					console.log('login_email + password submission: '+data);
					$('div#debug_console').html(data);
					
			});

		});
		

		$(document).on('click', 'button#btn_zipcode_validate', function(){
		
				process_entered_zipcode();
		
		});
								
								
								
								
								
		$('#zipcode_search_home').keypress(function (e)
			{
			 var key = e.which;
			 if(key == 13)  // the enter key code
			  {
				console.log('Pressed The enter key');
				
				process_entered_zipcode();
			  }
			});							






								
								
								
								
	
	
});

function clearDebug(){
	//console.log('Clearing Debug Console');
	
	setTimeout(function(){ 
		
		$('div#debug_console').html('');
		
	}, 2000);
	
}



function process_entered_zipcode(){
	
		var zipcode_search_home = $('input#zipcode_search_home').val();
			
			var street_country = 'USA';
		
					console.log('Pulling Google Map');
		
				var combined_string = zipcode_search_home+'+'+street_country;
		
						var address = encodeURIComponent(''+combined_string);
						console.log('zipcode_search_home: '+zipcode_search_home);
						console.log('zipcode_search_home combined_string: '+combined_string);
						
						  $.ajax({
									type: "GET",
									url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + zipcode_search_home + "&key=" + 'AIzaSyCtOVvFx5BRUCh7Az5m84uGh3IpkLLandQ',
									dataType: "json",
									success: processJSON,
									error: function()
									{
										console.log('error on request');
									}
								 }).done(function(data)
									{
										console.log('data: '+data);
										processJSON(data);
									});
									
}




function processJSON(json) {
			// Do stuff here
			console.log(json);
			
			
			//alert("Postal Code:" + json.results[0].address_components[1].long_name);
			
			var status = json.status;
			console.log('status: '+status);
			
			if(json.status == 'OK'){
				
						$('input#zip_code_geostatus').val(json.status);
			
						var  this_length =  json.results.length;
						console.log('Length Of Results: '+this_length);
			
						for (var i=0; i < this_length; i++)
						{
						    console.log('Addy Component Static: '+json.results[0].address_components[1].long_name);
						    console.log('Addy Component Static+Dynamic: '+json.results[0].address_components[i].long_name);

							console.log('Address Component Dynamic+Dynamic: '+json.results[i].address_components[i].long_name);

						    console.log('Address_short_name Componnet Static: '+json.results[0].address_components[1].short_name);
							console.log('Address_short_name Component Static+Dynamic: '+json.results[0].address_components[i].short_name);

							console.log('Address_short_name Component Dynamic+Dynamic: '+json.results[i].address_components[i].short_name);
							
							
						}
			






						// https://stackoverflow.com/questions/4390872/implementing-an-address-lookup-with-google-geocoding-api-or-similar/54041902#54041902
						// Format/Find Address Fields
						var address = json.results[0].address_components;
						// Loop through each of the address components to set the correct address field
						$.each(address, function () {
							var address_type = this.types[0];
							switch (address_type) {
								
								case 'locality':
									var zip_code_city = this.long_name;
									console.log('locality: '+zip_code_city);
									$('input#zip_code_city').val(zip_code_city);
									break;
								case 'political':
									var political = this.short_name;
									console.log('country: '+political);
									break;
								case 'administrative_area_level_2':
									var county = this.long_name;
									console.log('administrative_area_level_2: '+county);
									$('input#zip_code_county').val(county);
									break;
								case 'administrative_area_level_1':
									var zip_code_state = this.short_name;
									console.log('administrative_area_level_1: '+zip_code_state);
									$('input#zip_code_state').val(zip_code_state);

									break;
								case 'country':
									var country = this.long_name;
									break;
							}
						});
						// Sometimes the county is set to the postal town so set to empty if that is the case
						
						// Display the results
						
						
						
						




			
						
						var listing_address = json.results[0].address_components[1].formatted_address;
						if(listing_address){
							//$('input#address').val(listing_address);
						}
						
						
						var zip_code_city = json.results[0].address_components[3].long_name;
						console.log('zip_code_city: '+zip_code_city);
						if(zip_code_city){
							//$('input#zip_code_city').val(zip_code_city);
						}
						

					
						
						var zip_code_geolatitude = json.results[0].geometry.location.lat;
						if(zip_code_geolatitude){
							console.log('zip_code_geolatitude: '+zip_code_geolatitude);
							$('input#zip_code_geolatitude').val(zip_code_geolatitude);
						}
						var zip_code_geolongitude = json.results[0].geometry.location.lng;
						if(zip_code_geolongitude){
							console.log('zip_code_geolongitude: '+zip_code_geolongitude);
							$('input#zip_code_geolongitude').val(zip_code_geolongitude);
						}
						
						$('button#btn_zipcode_validate').hide();
						$('button#btn_zipcode_search').show();
						
						setTimeout(function() { 
        					
							processZipCodeInput();
							
						}, 2000); 
						 
			
				}else{
					
					$('input#zip_code_geostatus').val('NO');
					alert('There Was A Problem With The Address Sorry Try Again!!!');
			}
			
			
			
			

}


function processZipCodeInput(){

		var user_token = $('input#user_token').val();
		var user_cookie = $('input#user_cookie').val();
		
		var zipcode_search_home = $('input#zipcode_search_home').val();
		var zip_code_city = $('input#zip_code_city').val();
		var zip_code_state = $('input#zip_code_state').val();
		var zip_code_county = $('input#zip_code_county').val();
		var zip_code_geolatitude = $('input#zip_code_geolatitude').val();
		var zip_code_geolongitude = $('input#zip_code_geolongitude').val();
		
		
		$.post('models/script_capture_zipcode_search.php', {
			user_token: user_token,
			user_cookie: user_cookie,
			zipcode_search_home: zipcode_search_home,
			zip_code_city: zip_code_city,
			zip_code_state: zip_code_state,
			zip_code_county: zip_code_county,
			zip_code_geolatitude: zip_code_geolatitude,
			zip_code_geolongitude: zip_code_geolongitude
			
			}, function(data){
				
				console.log('zipcode_search'+data);
				$('div#debug_console').html(data);
				
		});


}




function reloadShoppingCart(){
		var visitor_id = $('input#visitor_id').val();

		var user_token = $('input#user_token').val();
		var user_cookie = $('input#user_cookie').val();
		var user_id = $('input#user_id').val();
	
	$.get('models/ajax-pull-shopping-cart.php', {
		visitor_id: visitor_id,
		user_id: user_id,
		user_token: user_token,
		user_cookie: user_cookie
		}, function(data){
		   $('li#navbar_shopping_cart_list').html(data);
	});
	

}

function check_cookie(){
		
		var visitor_id_check = 0;
		var visitor_cookie_check = 0;
		
		var user_id = $('input#user_id').val();
		
		var visitor_id = $('input#visitor_id').val();
		
		var user_token = $('input#user_token').val();
		var user_cookie = $('input#user_cookie').val();
		
		if(!visitor_id || visitor_id == ''){
			//console.log('Visitor ID Not Set Cookie');
			var visitor_id_check = 1;
		}
		
		if(!user_cookie || user_cookie == ''){
			//console.log('Cookie Empty Set Cookie');
			var visitor_cookie_check = 1;
			
		}

		if(visitor_id_check == 0 && visitor_cookie_check == 0 ){
			//console.log('Cookie And Visitor ID Set! ');
			return false;
		}
		
		

			// $.post('models/ajax-cookie_set.js.php', {
			// 	visitor_id: visitor_id,
			// 	user_id: user_id,
			// 	user_token: user_token,
			// 	user_cookie: user_cookie,
			// 	visitor_id_check: visitor_id_check,
			// 	visitor_cookie_check: visitor_cookie_check
				
			// 	}, function(data){
					
			// 	   $('div#debug_console').html(data);
			// });
		
		
}

setTimeout(function(){
	check_cookie();
	//console.log('Coooke Check Activated');
}, 100);
