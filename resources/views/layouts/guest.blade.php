<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8" />
         <title>{{ config('app.name', 'Oysterchecks Comprehensive and Exceptional background checks') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Oysterchecks Comprehensive and Exceptional background checks, KYC & AML compliance Solutions</" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}">
          <link href="{{asset('/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css">
        <!-- jvectormap -->
        <link href="{{asset('/plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
        <!-- App css -->
        <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
         <link href="{{asset('plugins/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" /><meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="{{asset('plugins/datatables/buttons.bootstrap5.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/datatables/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
        
        @yield('style')
        <link href="{{asset('/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
  </head>
  <body class="dark-sidenav navy-sidenav">
    <body class="dark-sidenav navy-sidenav">
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <!-- LOGO -->
            <div class="brand">
                <a href="{{route('index')}}" class="logo">
                    <span>
                        <img src="{{asset('/assets/images/logo.png')}}"  width="150px" alt="logo-large" class="logo-light"> 
                    </span>  
                </a>
            </div>
            <!--end logo-->
     
      
        </div>
        <!-- end left-sidenav-->
    <div class="page-wrapper">
        <div class="topbar">   
            <nav class="navbar-custom">    
              
                <ul class="list-unstyled topbar-nav mb-0">                        
                    <li>
                        <button class="nav-link button-menu-mobile">
                            <i data-feather="menu" class="align-self-center topbar-icon"></i>
                        </button>
                    </li> 
                 
                    <li class="creat-btn">
                        <div class="nav-link">
                    Welcome to Oysterchecks
                  Candidate Reference verification 
                        </div>
                    </li>                
               
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        @yield('content')
          <footer class="footer text-center text-sm-start">
            &copy; <script>document.write(new Date().getFullYear())</script> 
            All Rights Reserved, Oysterchecks.com 
            <span class="float-end">
        <a href="{{route('faqs')}}" class="btn btn-sm btn-outline-blue"> FAQ </a>  
        <a class="btn btn-sm btn-outline-blue" href="{{route('terms')}}"> Privacy Policy</a> 
        &nbsp; &nbsp;
            <span class="text-muted d-none d-sm-inline-block float-end"> By Morgans Consortium</span>
          </footer><!--end footer-->
        </div>
    </div>
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/js/effects.min.js')}}"></script>
    <script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/assets/js/metismenu.min.js')}}"></script>
    <script src="{{asset('/assets/js/waves.js')}}"></script>
    <script src="{{asset('/assets/pages/jquery.form-upload.init.js')}}"></script>
    <script src="{{asset('/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('/assets/js/feather.min.js')}}"></script>
    <script src="{{asset('/assets/js/simplebar.min.js')}}"></script>
    <script src="{{asset('/assets/js/moment.js')}}"></script>
    <script src="{{asset('/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('/plugins/select2/select2.min.js')}}"></script>
        <!-- Required datatable js -->
    <script src="{{asset('/assets/pages/jquery.datatable.init.js')}}"></script>
    <script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/dataTables.bootstrap5.min.js')}}"></script>
    
       <!-- Buttons examples -->
    <script src="{{asset('/plugins/datatables/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/buttons.html5.min.js')}}"></script>
      <!-- Responsive examples -->
    <script src="{{asset('/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/assets/pages/jquery.forms-advanced.js')}}"></script>

    <script src="{{asset('/plugins/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('/assets/pages/jquery.clipboard.init.js')}}"></script>
        <!-- Session timeout js -->


    <script src="{{asset('/plugins/bootstrap-session-timeout/bootstrap-session-timeout.min.js')}}"></script>
        
    <script src="{{asset('/assets/pages/jquery.animate.init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- App js -->
    <script src="{{asset('/assets/js/app.js')}}"></script> 

<!--End of Tawk.to Script-->
    </body>
</html>