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
        .logo-width{
          width: 25%;
        }
        .auth-card-width{
          width: 50% !important;
        }
        .footer-nav{
          font-size: 1.25rem;
          font-weight: 500;
        }
        .iti__country-list{
          width: 380px;
          margin-top: 5px;
        }
        
        @media (max-width: 575.98px) { 
          .auth-card-width{
          width: 75% !important;
        }
        .reset-card-width{
          width: 75% !important;
        }
        .logo-width{
          width: 50%;
        }
        .footer-nav{
          font-size: 1.2rem;
          font-weight: 500;
        }
        .reset-btn{
          width: 100% !important;
          margin-bottom: 5px;
        }
        .iti__country-list{
          width: 268px;
          margin-top: 5px;
        }
         }
        @media (max-width: 767.98px) {
          .auth-card-width{
          width: 75% !important;
        }
        .reset-card-width{
          width: 75% !important;
        }
        .logo-width{
          width: 50%;
        }
        .footer-nav{
          font-size: 1.2rem;
          font-weight: 500;
        }
        .reset-btn{
          width: 100% !important;
        }
        .iti__country-list{
          width: 268px;
          margin-top: 5px;
        }
         }
        .checkbox-color:checked{
            background-color: black;
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
        .iti{
          width: 100% !important;
          z-index: 5;
        }


    </style>