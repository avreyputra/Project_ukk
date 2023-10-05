{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset ('template/assets/css/main/app.css')}}" />
    <link rel="stylesheet" href="{{asset ('template/assets/css/pages/auth.css')}}" />
    <link
      rel="shortcut icon"
      href="{{asset ('template/assets/images/logo/favicon.svg')}}"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="{{asset ('template/assets/images/logo/favicon.png')}}"
      type="image/png"
    />
    <link
    rel="stylesheet"
    href="{{asset ('template/assets/extensions/sweetalert2/sweetalert2.min.css')}}"
    />
  </head>

  <body>
    <div id="auth">
      <div class="row h-100">
        <div class="col-lg-5 col-12">
          <div id="auth-left">
            <div class="auth-logo">
              <a href="index.html"
                ><img src="{{asset ('template/assets/images/logo/Xeno.svg')}}" alt="Logo"
              /></a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">
              Log in with your data that you entered during registration.
            </p>

            <form action="{{route('postLogin')}}" method="POST">
                @csrf
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  class="form-control form-control-xl"
                  name="email"
                  placeholder="E-mail"
                />
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  class="form-control form-control-xl"
                  name="password"
                  placeholder="Password"
                />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                Log in
              </button>
              <a href="{{route('userDashboard')}}" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Kembali</a>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Don't have an account?
                <a href="{{route('register')}}" class="font-bold">Sign up</a>.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right"></div>
        </div>
      </div>
    </div>
    <!-- sweetalert -->
    <script src="{{asset ('template/assets/extensions/sweetalert2/sweetalert2.all.min.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // const Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 3000,
        //     timerProgressBar: true,
        //     didOpen: (toast) => {
        //         toast.addEventListener('mouseenter', Swal.stopTimer)
        //         toast.addEventListener('mouseleave', Swal.resumeTimer)
        //     }
        // });

        // @if (Session::has('status'))
        //   @if (Session::get('status') == 'success')
        //     Toast.fire({
        //       icon: '{{ Session::get('status') }}',
        //       title: '{{ Session::get('message') }}',
        //     })
        //   @else
        //     Toast.fire({
        //       icon: '{{ Session::get('status') }}',
        //       title: '{{ Session::get('message') }}',
        //     })
        //   @endif
        // @endif
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

  </body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Xeno -LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset ('Login_v3/images/icons/Xeno.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset ('Login_v3/css/main.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{asset ('template/assets/extensions/sweetalert2/sweetalert2.min.css')}}">
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('Login_v3/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{route('postLogin')}}">
          @csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="text-left mb-2">
                        <p class="txt1">
                            Don't have an account?
                            <a class="txt1 font-bold" href="{{route('register')}}"> Sign Up </a>
                        </p>
					</div>

					<div class="container-login100-form-btn mt-3">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					{{-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> --}}
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{asset ('Login_v3/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('Login_v3/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('Login_v3/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset ('Login_v3/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('Login_v3/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('Login_v3/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset ('Login_v3/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('Login_v3/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset ('Login_v3/js/main.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset ('template/assets/extensions/sweetalert2/sweetalert2.all.min.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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

</body>
</html>
