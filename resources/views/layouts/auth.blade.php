<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width='device-width', initial-scale=1.0">

    <title>
    @yield('title')
    </title>

    <!-- CSS only -->

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/intl-tel-input/build/css/intlTelInput.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('public/backend/plugins/intl-tel-input/build/css/demo.css')}}"> -->
    <style>

        .leftside,

        .rightside {

            height: 100vh;

            width: 100%;

        }



        .leftside {

            position: relative;

        }



        .rightside {

            position: relative;

            background-color: #cfcfcf;

        }



        .center {

            position: absolute;

            top: 50%;

            left: 50%;

            transform: translate(-50%, -50%);

        }



        .auth-form {

            width: 100%;

        }
        .checkbox-color:checked{
            background-color: #cfcfcf;
            border-color:black;
        }
        .checkbox-color:focus{
             border-color:black;
            box-shadow:none;
        }
        .icons a{
            text-decoration: none;
        }
        .icons a i{
            text-decoration: none;
            font-size: 50px;
            margin-right: 20px;
            color: black;
        }

    </style>

</head>



<body>

    <div class="row g-0">

        <div class="col-md-6">

            <div class="leftside">

                @yield('content')

            </div>

        </div>

        <div class="col-md-6 ">

            <div class="rightside">

                <div class="container center">

                    <div class="d-flex justify-content-center mt-5">

                        <div class="w-md-50 w-sm-75">

                            @if(Route::currentRouteName()=='login')

                            <div class="auth-form mb-5">

                            <div class="auth-logo text-center mb-3">
<img src="{{asset('public/frontend/images/logo.png')}}">
</div>

                                <p class="text-center">Don't have an account? Register one!</p>

                                <div class="form-group row mt-2">

                                    <div class="col-md-12 text-center">

                                        <a href="{{ route('register') }}" class="btn rounded-pill px-5 btn-light">

                                            {{ __('Register') }}

                                        </a>

                                    </div>

                                </div>

                            </div>

                            @endif

                            @if(Route::currentRouteName()=='register' || Route::currentRouteName()=='password.request' )

                            <div class="auth-form mb-5">

                            <div class="auth-logo text-center mb-3">
<img src="{{asset('public/frontend/images/logo.png')}}">
</div>
>

                                <p class="text-center"> have an account? Login here!</p>

                                <div class="form-group row mt-2">

                                    <div class="col-md-12 text-center">

                                        <a href="{{ route('login') }}" class="btn rounded-pill px-5 btn-light">

                                            {{ __('Login') }}

                                        </a>

                                    </div>

                                </div>

                            </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- Footer -->
<footer class="page-footer font-small">

<!-- Footer Links -->
<div class="container">

  <!-- Grid row-->
  <div class="row text-center d-flex justify-content-center pt-5 mb-3">

    <!-- Grid column -->
    <div class="col-md-12 text-center mb-3">
      <h4 class="font-weight-bold">
        Unknown - <span style="font-weight: 400;">Approximate geo location</span>
      </h4>
    </div>
    <!-- Grid column -->
  </div>


  <!-- Grid row-->
  <div class="row pb-3">

    <!-- Grid column -->
    <div class="col-md-12 text-center icons">

      <div class="mb-5 flex-center">

        <!-- Facebook -->
        <a class="fb-ic">
          <i class="fa fa-facebook-f fa-lg white-text mr-4"> </i>
        </a>
        <!-- Twitter -->
        <a class="tw-ic">
          <i class="fa fa-twitter fa-lg white-text mr-4"> </i>
        </a>
        <!--Instagram-->
        <a class="ins-ic">
          <i class="fa fa-instagram fa-lg white-text mr-4"></i>
        </a>
        <!--Pinterest-->
        <a class="pin-ic">
          <i class="fa fa-pinterest fa-lg white-text"></i>
        </a>

      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row-->
    <div class="container">
  <div class="row ">

    <!-- Grid column -->
    <div class="col-md-4"></div>
    <div class="col-md-4 d-flex justify-content-around ">
    <h5>About Us</h5>
    <h5>Help</h5>
    <h5>Terms & conditions</h5>
    </div>
    <div class="col-md-4 ">
    </div>
    <!-- Grid column -->
    </div>
  </div>
  <!-- Grid row-->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class=" border-secondary border-top footer-copyright text-center py-3">Copyright © 2021 Handyhubb. All right reserved
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->


    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('public/backend/plugins/intl-tel-input/build/js/intlTelInput.js')}}"></script>
    <script>
        $(document).ready(function () {
          //called when key is pressed in textbox
          $("#phone").keypress(function (e) {
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
      <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      autoHideDialCode: true,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
    //   hiddenInput: "full_number",
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
</body>



</html>