<!DOCTYPE html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Shop</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/crumina-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/styles.css') }}">
         {{-- Notification --}}
         <link href="{{ asset('css/toaster.css') }}" rel="stylesheet">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/primary-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="{{ asset('app/css/rtl.css') }}">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>


<body class=" ">




    @include('includes.header');




    <div class="content-wrapper">

        <div class="container">
            <div class="row pt120">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="heading align-center mb60">
                        <h4 class="h1 heading-title">Enjoy the Freedom of Open Source</h4>
                        <p class="heading-text">Buy Mobile, and we will ship to you.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Books products grid -->

        @yield('page')


    </div>

    <!-- Footer -->

    <footer class="footer">
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="{{ asset('app/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('app/js/crum-mega-menu.js') }}"></script>
    <script src="{{ asset('app/js/swiper.jquery.min.js') }}"></script>
    <script src="{{ asset('app/js/theme-plugins.js') }}"></script>
    <script src="{{ asset('app/js/main.js') }}"></script>
    <script src="{{ asset('app/js/form-actions.js') }}"></script>

    <script src="{{ asset('app/js/velocity.min.js') }}"></script>
    <script src="{{ asset('app/js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('app/js/animation.velocity.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- ...end JS Script -->

    <script>
        @if(Session::has('success'))
        toastr.success('{{ Session::get('
            success ') }}');
        @endif
        @if(Session::has('info'))
        toastr.info('{{ Session::get('
            info ') }}');
        @endif

    </script>

</body>

<!-- Mirrored from theme.crumina.net/html-seosight/16_shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:04 GMT -->


<script src="{{ asset('js/toster.js') }}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get ('success')}}")
    @endif

</script>

<script>
    @if(Session::has('error'))
    toastr.error("{{ Session::get ('error')}}")
    @endif

</script>

<script>
    @if(Session::has('info'))
    toastr.info("{{ Session::get ('info')}}")
    @endif

</script>
<script>
    @if(Session::has('warning'))
    toastr.warning("{{ Session::get ('warning')}}")
    @endif

</script>
</html>
