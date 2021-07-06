/*  ---------------------------------------------------
XIMRX
---------------------------------------------------------  */

'use strict';
(function ($) {

$(window).on('load', function () {
});


$('button#logme_in_btn').on('click', function(){
    var user_email = $('input#user_email').val();
    var user_password = $('input#user_password').val();
    $.post('/src/api/login.php', {
        user_email: user_email,
        user_password: user_password        
        }, function(data){            
            if(data == '0'){
                alert('Invalid email or password');
            } 
            else if(data == 'a'){
                window.setTimeout( function(){
                    window.location = "/admin";
                }, 1000 );
                //window.location = "/admin";
            }   
            else{
                window.setTimeout( function(){
                    window.location = window.location.href+"?user#loggedin";
                }, 1000 );
                //window.location = window.location.href+"?user#loggedin"                
            }         
    });
});
if(window.location.hash == "#loggedin") {
    showmessage('success', "You have successfully loggedin!");
    window.location.hash = "";
  }


$('.newslettersignup').on('click', function(){
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if (testEmail.test(  $('.newsletteremail').val() )){
        alert('You have subscribed for our newsletters.');
    }
});




$('button#register_submit_btn').on('click', function(){
    var usr_register_password = $('input#usr_register_password').val().trim();
    var usr_register_password_confirm = $('input#usr_register_password_confirm').val().trim();    
    if(usr_register_password_confirm != usr_register_password){
        alert('Sorry Passwords Dont Match Try Again');
         $('input#usr_register_password_confirm').val('');
        return false;
    }    
});

$('.placebidbtn').click(function(){
        var data_bid_id = $(this).attr('data_bid_id');
        var data_price = $("#"+$(this).attr('data_price_id')+'_input'+data_bid_id).val();
        var sessionuserid = $('#user_id').val();
        if(data_price == ''){
            alert('Please add the price');
            return false;
        }
        $('#emdfail').val(data_price);
        $('#emdtype').val($(this).attr('data_price_id'));
        $('#emdgail').val(data_bid_id);
        $('#add-quote-neo').modal();
        // $.ajax({
        //     url:"/src/api/bidplacement.php",
        //     type: "POST",
        //     data:{
        //         "data_bid_id": data_bid_id, 
        //         "data_price": data_price,
        //         "sessionuserid":sessionuserid
        //     },
        //     success:function(data)
        //     {
        //       if(data == true){
        //         alert('Bid has been places successfully');
        //       }else{
        //         alert("Some error occure");
        //       }
        //     }
        // });
    });
    $('#Bid_form').submit(function(e){
        e.preventDefault();
        var data_price = $('#emdfail').val();
        var data_bid_id = $('#emdgail').val();
        var emdtype = $('#emdtype').val();
        var sessionuserid = $('#emailquote').val();
        var commentquote = $('#commentquote').val();
        $.ajax({
            url:"/src/api/bidplacement.php",
            type: "POST",
            data:{
                "data_bid_id": data_bid_id, 
                "data_price": data_price,
                "emdtype": emdtype,
                "commentquote": commentquote,
                "sessionuserid":sessionuserid
            },
            success:function(data)
            {
              if(data == true){
                alert('Bid has been places successfully');
                //alert('#'+emdtype+data_bid_id);
                // $('body').find('#'+emdtype+data_bid_id).prop("disabled",true);
                $('#'+emdtype+data_bid_id).hide();
                $('#add-quote-neo').modal('hide');
              }else{
                alert("Some error occure");
              }
            }
        });
    });

(function($) {
$.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

$(".intTextBox10000").inputFilter(function(value) {
  return /^[0-9]*$/i.test(value)&& (value === "" || parseInt(value) <= 10000); });
$(".uintTextBox").inputFilter(function(value) {
  return /^\d*$/.test(value); });
$(".intLimitTextBox500").inputFilter(function(value) {
  return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500); });

$("#placebidcoster").keyup(function(){
    if($.isNumeric( $("#placebidcoster").val() )){
        $("#popthequote").attr("data-target", "#add-quote-neo");
    }
    else{
        $("#popthequote").attr("data-target", "#none");
    }
});     
$('#popthequote').on('click', function(){
    $('#emdfail').val( $("#placebidcoster").val() );
    $('#emdgail').val( $("#popthequote").attr('data-id') );
});


$(".costmult").keyup(function(){
    if($.isNumeric( $(this).val() )){
        $(this).siblings('.butnmultq').attr("data-target", "#add-quote-neo");
    }
    else{
        $(this).siblings('.butnmultq').attr("data-target", "#none");
    }
});    


$('.butnmultq').on('click', function(){
    $('#emdfail').val( $(this).siblings('.costmult').val() );
    $('#emdgail').val( $(this).attr('data-id') );
});


$('#boxhilmand a').on('click', function(){
    $('#boxhilmand a').removeClass('sulectod');
    $(this).addClass('sulectod');
    $('#quimcato').val( $(this).attr('data-id') );
    $("#dropdownMenuButton").dropdown('toggle');
    $('#dropdownMenuButton').html( $(this).html() );
});


$('body').on('click', '.customcheckbox', function (e) {
    e.stopPropagation();
});




$('.topdam').on('click', function(){
    $('.topdam').removeClass('btn-white');
    $('.topdam').addClass('btn-primary');
    $('.alldam').removeClass('btn-primary');
    $('.alldam').addClass('btn-white');
    $('#dammam').val('top');
});
$('.alldam').on('click', function(){
    $('.alldam').removeClass('btn-white');
    $('.alldam').addClass('btn-primary');
    $('.topdam').removeClass('btn-primary');
    $('.topdam').addClass('btn-white');
    $('#dammam').val('all');
});





var slider = document.getElementById("ggg");
var output = document.getElementById("gggv");
output.innerHTML = slider.value;
slider.oninput = function() {
  output.innerHTML = this.value;
  $('#girvat').text(this.value)
}


var sliderb = document.getElementById("hhh");
var outputb = document.getElementById("hhhv");
outputb.innerHTML = sliderb.value;
sliderb.oninput = function() {
  outputb.innerHTML = this.value;
}




$('#clozer').click(function() {
    $(".copyright-footer").trigger("click");
  });

  $('.searcher').click(function(e) {
      e.preventDefault();

      var gimu = '';
      $('input.vogi[type=checkbox]:checked').each(function(index){
        //part where the magic happens
        gimu += '_' + $(this).val();
      });


    location.href = "listings?duration="+$('#hhhv').text()+"&budget="+$('#gggv').text()+"&feature="+$('#dammam').val()+"&zipcode="+$('#plumdig').val()+"&type="+$('#jhim').val()+"&category="+gimu;
  }); 
  
  



  $('#html').click(function() {
    if ($(this).is(':checked')) {
        $("#html2").prop("checked", false);
        $('#jhim').val('bid');

    }
  });
  $('#html2').click(function() {
    if ($(this).is(':checked')) {
        $("#html").prop("checked", false);
        $('#jhim').val('service');
    }
  });

  $('.vogi').click(function() {
    if ($(this).is(':checked')) {
        $(".vogi").prop("checked", false);
        $(this).prop("checked", true);
    }
  });



//
$.post('/src/api/isprovider.php', {
    userid: $('#userid').val()        
    }, function(data){            
        if(data != '0'){
            document.body.classList.add("provider");
        }   
        else{
            document.body.classList.add("notprovider");
        }         
});
//







//messengur start

$('#imposter').click(function() {
    
    if( $('#glotad').val() != ''){
        
    $.post('/src/api/messenger.php', {
        message: $('#glotad').val(),
        fromer: $('#userid').val(),
        tooer: $('#poorid').val()        
        }, function(data){           
            
            
            $('#dissloder').append('<div class="outgoing_msg msg"><div class="sent_msg"><p>'+$('#glotad').val()+'</p><span class="time_date"> Now</span> </div><div class="incoming_msg_img outgoinimgposition"> <img src='+$('#my_image').val()+'> </div></div>');
            $('#glotad').val('');
    });
}

  });

  





  if (typeof newestid !== 'undefined') {
    // your code here

  setInterval(function(){       
    $.post('/src/api/checkmessage.php', {
        newestid: newestid,
        userid: $('#userid').val(),
        otheri: $('#poorid').val()        
        }, function(data){              
            if(data == '0'){
            }
            else{
            var msdu = data.split('#####')[0];
            msdu = msdu.replace("/src/images/user-profile.png", threadimage);
            
            $('#dissloder').append(msdu);
            newestid = data.split('#####')[1];
            }
            
    }); 
   }, 8000);

}








$('#chikdal').click(function() {
    $.post('/src/api/oldmessage.php', {
        oldestid: oldestid,
        userid: $('#userid').val(),
        otheri: $('#poorid').val()        
        }, function(data){              
            if(data==''){
                $('#chikdal').hide();
            }
            else {
            $('#dissloder').prepend(data.split('#####')[0]);
            oldestid = data.split('#####')[1];
            }
    });
});





$('#dfsddrdsd').click(function() {
    if(    ($("#caca").val())&&  ($("#cacb").val())&&  ($("#cacc").val())&&  ($("#cacd").val())&&  ($("#cace").val())&&  ($("#cacf").val())&&  ($("#cacg").val())&& ($("#cach").val())     ){
    $.post('/src/api/carttocheckout.php', {
        userid: $('#userid').val(),
        databuild: "<h4>Vehicle Address</h4><p>"+$("#caca").val()+" "+$("#cacb").val()+" "+$("#cacc").val()+" "+$("#cacd").val()+"</p><h4>Billing Address</h4><p> "+$("#cace").val()+" "+$("#cacf").val()+" "+$("#cacg").val()+" "+$("#cach").val()+"</p><h4>Additional Details</h4><p> "+$("#caci").val()+"</p>"     
        }, function(data){              
            if(data=='1'){
                $("#caca").prop("readonly", true);
                $("#cacb").prop("readonly", true);
                $("#cacc").prop("readonly", true);
                $("#cacd").prop("readonly", true);
                $("#cace").prop("readonly", true);
                $("#cacf").prop("readonly", true);
                $("#cacg").prop("readonly", true);
                $("#cach").prop("readonly", true);
                $("#caci").prop("readonly", true);

                $('#dfsddrdsd').hide();
                $('#paymentbage').show();
            }
            else {
            alert("Invalid details, please refill form");
            }
    });
    }
    else {
        alert("Invalid details, please fill all fields");
        }
});







    $("#formhi").on('submit',(function(e) {
     e.preventDefault();
     $.ajax({
            url: "/src/api/ajaxupload.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
            cache: false,
      processData:false,
      beforeSend : function()
      {
       
      },
      success: function(data)
         {
       if(data=='invalid')
       {
        
       }
       else
       {
        //''
        $.post('/src/api/messenger.php', {
            message: data,
            fromer: $('#userid').val(),
            tooer: $('#poorid').val()        
            }, function(datad){                                       
                $('#dissloder').append('<div class="outgoing_msg"><div class="sent_msg"><p>'+data+'</p><span class="time_date"> Now</span> </div></div>');
                //$('#glotad').val('');
        });
        //''
        $("#form")[0].reset(); 
       }
         },
        error: function(e) 
         {
      
         }          
       });
    }));






    
    $('#logmexmnvcnnn').click(function() {
        //''
        var datad = "<p class='sehs'><b>I-DEAL</b><br/>Budget:"+$('#hsdids').val()+"<br/>Time Duration:"+$('#hsdesdids').val()+"<br/>Details:"+$('#adeedgd').val()+"<br/><a href='/src/api/addcustom.php?c="+$('#hsdids').val()+"&t="+$('#hsdesdids').val()+"&d="+$('#adeedgd').val()+"&s="+$('#userid').val()+"&b="+$('#poorid').val()+"' class='dealaccept'>Accept</a></p>";
        $.post('/src/api/messenger.php', {
            message: datad,
            fromer: $('#userid').val(),
            tooer: $('#poorid').val()        
            }, function(datadr){                                       
                $('#dissloder').append('<div class="outgoing_msg"><div class="sent_msg">'+datad+'<span class="time_date"> Now</span> </div></div>');
                $('#CustomOfferModal').modal('toggle');
        });
        //''
    });





//messenger end





$('#pricecanso').click(function() {

    if($('#pricecanso').text() == "Disable"){
        $('#pricecanso').text('Enable');
        $('#glimds').hide();
        $('#glimds').val('');
        $('#glimds').removeAttr('required');
    }
    else{
        $('#pricecanso').text('Disable');
        $('#glimds').show();
        $("#glimds").attr("required", true);
    }

});







$('.cc_checkbox_val').click(function() {
    $('#gilsdf').val(
    $('#gilsdf').val() + ' ' + $(this).parent('.category_list').attr('data-value')
    );
    $(this).parent('.category_list').addClass('requestedni');
    $(this).removeClass('hichu');
});

$('.hichu').click(function() {
    $('#gilsdf').val(
    $('#gilsdf').val() + ' ' + $(this).parent('.category_list').attr('data-value')
    );
    $(this).parent('.category_list').addClass('requestedni');
    $(this).parent('.category_list').find('[type=checkbox]').prop('checked', true);
    $(this).removeClass('hichu');
    // $(this).text(' (Requested)');
});

$('body').on('click', '.bandana', function() {
    $(this).parent().remove();
});






$('#ledszhcrnnn').click(function(e) {
e.preventDefault();
    if( $('#hsdfjbfids').val() != ''){
        if(window.location.href.indexOf("?") !== -1){ location.replace( window.location.href+'&zipcode='+$('#hsdfjbfids').val() );  }
        else { location.replace( window.location.href+'?zipcode='+$('#hsdfjbfids').val() );  }
    }

});




$('.kusdimsas').click(function(e) {
    if($('#bandinss').text() == "$0.00"){
        e.preventDefault();
        showmessage('error', 'You have insufficient balance.')
    }
});




    $('input.timepicker').timepicker({});


    $('#yesgate').on('change', function() {
        if( this.value == 'none'){
            $('.nongate').show();
            $(".dimpliad").prop('required',true);
        }
        else{
            $(".dimpliad").prop('required',false);
        }
      });



////////////////

if (typeof arrofcities !== 'undefined') {
$("#myTags").tagit({
    availableTags: arrofcities,
    allowSpaces : true,
    singleFieldDelimiter : "|",
    singleField : true,
    placeholderText: "Cities you serve",
    fieldName: "cities",
    caseSensitive: true,
    showAutocompleteOnFocus: false,
    beforeTagAdded: function(event, ui) {
        if(!arrofcities.includes(ui.tagLabel)){
            $('.ui-autocomplete-input').val(ui.tagLabel+",");
            return false;
        }
    }
});
}


$("#lumpsum").submit(function(e) {
    e.preventDefault(); 
    var form = $(this);
    var url = form.attr('action');    
    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(),
           success: function(data)
           {
            $('#managecities').modal('toggle');
           }
         });    
});
////////////////













})(jQuery);




function searchbox(typer){
    location.href = "listings?zipcode="+$('#quimbox').val()+"&type="+typer+"&category="+$('#quimcato').val();
}


function showmessage(typer, texted){

if(typer == 'error'){
    var hicon = "times";
    var didle = "Error!";
    var ghilass = "errodin";
}
if(typer == 'success'){
    var hicon = "check";
    var didle = "Success!";
    var ghilass = "successd";   
}
if(typer == 'warning'){
    var hicon = "exclamation-triangle";
    var didle = "Warning!";
    var ghilass = "warndd";
}
$('body').append('<div class="pulpani '+ghilass+'"><div class="kanari"></div><div class="fontari"><i class="fa fa-'+hicon+'"></i></div><div class="clozari bandana">x</div><h3>'+didle+'</h3><p>'+texted+'</p><button class="bandana">OK</button></div>');

setTimeout(function(){ $('.pulpani').remove(); }, 2000);


}