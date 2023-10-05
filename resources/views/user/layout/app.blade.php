<!DOCTYPE html>
<html lang="en">


<!-- molla/index-10.html  22 Nov 2019 09:58:04 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset ('template-user/assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset ('template-user/assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset ('template-user/assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset ('template-user/assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset ('template-user/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset ('template-user/assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset ('template-user/assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset ('template-user/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset ('template-user/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset ('template-user/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset ('template-user/assets/css/plugins/jquery.countdown.css')}}">
    <link rel="stylesheet" href="{{asset ('template/assets/extensions/sweetalert2/sweetalert2.min.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset ('template-user/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('template-user/assets/css/skins/skin-demo-10.css')}}">
    <link rel="stylesheet" href="{{asset ('template-user/assets/css/demos/demo-10.css')}}">
</head>

<body>
    <div class="page-wrapper">
        @include('user.layout.header')
        <!-- End .header -->

        @yield('konten')
        <!-- End .main -->

        @include('user.layout.footer')
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        @include('user.layout.mobile')
        <!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    {{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="{{asset ('template-user/assets/images/popup/newsletter/logo.png')}}" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="{{asset ('template-user/assets/images/popup/newsletter/img-1.jpg')}}" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Plugins JS File -->
    <script src="{{asset ('template-user/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset ('template/assets/extensions/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset ('template-user/assets/js/main.js')}}"></script>
    <script src="{{asset ('template-user/assets/js/demos/demo-10.js')}}"></script>

    <Script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </Script>

    <script>
    // Logout
        function logout() {
        Swal.fire({
            icon: 'warning',
            title: 'Apakah Anda Yakin Ingin Logout?',
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Yakin!',
        }).then((result) => {

            if (result.value) {

                // Toast.fire({
                //     icon: 'success',
                //     title: 'berhasil',
                // })

            window.location.replace("{{ route('logout') }}");
            }
        });
        }
    </script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if (Session::has('status'))
        @if (Session::get('status') == 'success')
            Toast.fire({
            icon: '{{ Session::get('status') }}',
            title: '{{ Session::get('message') }}',
            })
        @else
            Toast.fire({
            icon: '{{ Session::get('status') }}',
            title: '{{ Session::get('message') }}',
            })
        @endif
        @endif
    </script>

    @yield('script')

</body>


<!-- molla/index-10.html  22 Nov 2019 09:58:22 GMT -->
</html>
