<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    
    <!-- Page Title  -->
    <title>Login | Oysterchecks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Oysterchecks Comprehensive and Exceptional background checks, KYC & AML compliance Solutions</" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}">
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('/assets/assets/css/dashlite.css?ver=2.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('/assets/assets/css/theme.css?ver=2.2.0')}}">
</head>

<body class="nk-body npc-default pg-auth">
 
    @yield('content')
    
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="ti-angle-up"></span>
    </button>
    <!--bottom to top button end-->
</body>


<script src="{{ mix('js/app.js') }}"></script>

<script src="{{asset('/assets/assets/js/bundle.js?ver=2.2.0')}}"></script>
<script src="{{asset('/assets/assets/js/scripts.js?ver=2.2.0')}}"></script>
<script src="{{asset('assets/assets/js/signinscripts.js')}}"></script>

</body>
</html>
