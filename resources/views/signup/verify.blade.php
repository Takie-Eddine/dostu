<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Verify Email</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- verify email basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="brand-logo">
                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" style="width: 35.11px; height: 24px;" viewBox="0 0 35.11 24"><defs><style>.cls-1{fill:none;}.cls-2{fill:#f35a24;}</style></defs><title>icon</title><rect class="cls-1" x="-2797.6051" y="-2766.3185" width="3134.1432" height="4723.3185"/><rect class="cls-1" x="-637.3891" y="-2766.3185" width="3134.1432" height="4723.3185"/><rect class="cls-1" x="-1710.003" y="-2766.3185" width="3134.1432" height="4723.3185"/><path class="cls-2" d="M16.2682,8.1933l1.3411,9.5028a.5641.5641,0,0,0,.4985.6121h6.5681c4.4578-.1027,5.6919-2.8226,4.6845-6.1384-1-3.2929-3.6-7.5042-10.0217-9.0621C16.0942,2.3206,8.4143,3.0307,5.44,4.8051A12.2052,12.2052,0,0,0,0,11.3253,16.5953,16.5953,0,0,1,7.3961,2.46,17.2389,17.2389,0,0,1,20.4447.5074c8.6486,2.0983,11.39,7.336,12.0065,11.9475a8.1852,8.1852,0,0,1-1.28,5.9018c-1.4387,1.81-3.8945,2.3169-6.2067,2.3169H15.4923a.5642.5642,0,0,1-.4985-.6121L16.2682,8.1933"/><circle class="cls-2" cx="16.3679" cy="22.7587" r="1.2413"/><circle class="cls-2" cx="28.8125" cy="22.7587" r="1.2413"/></svg>
                                    <h2 class="brand-text text-primary ms-1">Doshtu</h2>
                                </a>

                                <h2 class="card-title fw-bolder mb-1">Verify your email ✉️</h2>
                                <p class="card-text mb-2">
                                    We've sent a link to your email address: <span class="fw-bolder">hello@pixinvent.com</span> Please follow the
                                    link inside to continue.
                                </p>

                                <a href="{{route('details')}}" class="btn btn-primary w-100">Skip for now</a>

                                <p class="text-center mt-2">
                                    {{-- <span>Didn't receive an email? </span><a href="Javascript:void(0)"><span>&nbsp;Resend</span></a> --}}
                                </p>
                            </div>
                        </div>
                        <!-- / verify email basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
