<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>Blogy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link href="{{ asset('css/homestyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <!-- prealoader area start -->
    <div id="preloader">
        <div class="spiner"></div>
    </div>
    <!-- prealoader area end -->
    <!-- Crumbs area start -->
    <div class="crumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="crumbs-header">
                        <h2 class="cd-headline letters rotate-3">
                            <span class="cd-words-wrapper">
                                <b class="is-visible">Blogy  Home</b>
                                <b>Welcome !!</b>
                            </span>
                        </h2>
                        <p>Blogy is a SaaS &amp; App Landing Startups Template</p>
                        <div class="btn-area">
                          <a href="{{ route('register') }}">Signup Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- footer area start -->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="footer-content text-center">
                    <h2>CREATE YOUR OWN WEBSITE TODAY !</h2>
                    <div class="btn-area">
                      <a href="{{ route('login') }}">Login</a>
                    </div>
                    <p class="copy-right"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/animatedheadline.js') }}"></script>
    <script src="{{ asset('js/counterup.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>
</body>

</html>
