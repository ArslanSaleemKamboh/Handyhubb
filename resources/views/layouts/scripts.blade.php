<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('public/backend/plugins/intl-tel-input/build/js/intlTelInput.js')}}"></script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
            integrity=
"sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA="
            crossorigin="anonymous">
    </script>
    <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
    //   allowDropdown: false,
      autoHideDialCode: true,
    //   autoPlaceholder: "on",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      hiddenInput: "phone",
      formatOnDisplay:true,
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      separateDialCode: true,
      utilsScript: "{{asset('public/backend/plugins/intl-tel-input/build/js/utils.js')}}",
    });
  </script>
    <script>
        $(document).ready(function () {
          //called when key is pressed in textbox
          $('#phone').bind('paste', function(e) {
              e.preventDefault();
              $("#pherrormsgdv").html("<strong>Sorry you can't paste anything</strong>").show().fadeOut(2000);
                       return false;
            });
          $("#phone").on('keypress',function (e) {
                  var masking = $('#phone').attr("placeholder");
                  $('#phone').mask(masking.replace(new RegExp("[0-9]", "g"), "0"))
             //if the letter is not digit then display error and don't type anything
             if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $("#pherrormsgdv").html("<strong>Only Digits are allowed</strong>").show().fadeOut(2000);
                       return false;
            }
           });
           
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });

    </script>
      