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

    

    @include('layouts.styles')

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
                            <a href="{{route('main')}}">
                            <img class="w-75" src="{{asset('public/frontend/images/logo.svg')}}" alt="">
                            </a>
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
                            <a href="{{route('main')}}">
                            <img class="w-75" src="{{asset('public/frontend/images/logo.svg')}}" alt="">
                            </a>
</div>


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
        Unknown - <span class="footer-nav" style="font-weight: 400;">Approximate geo location</span>
      </h4>
    </div>
    <!-- Grid column -->
  </div>


  <!-- Grid row-->
  <div class="row pb-3">

    <!-- Grid column -->
    <div class="col-md-12 text-center icons">

      <div class="mb-3 flex-center">

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
    <div class="col-md-4 d-flex justify-content-around justify-content mb-1">
    <a href="#" class="text-decoration-none text-dark footer-nav ">About Us</a>
    <a href="#" class="text-decoration-none text-dark footer-nav">Help</a>
    <a href="#" class="text-decoration-none text-dark footer-nav">Terms & conditions</a>
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

    @include('layouts.scripts')
</body>



</html>