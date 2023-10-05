<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign Up</title>
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
                <a href="#">
                    <img src="{{asset ('template/assets/images/logo/Xeno.svg')}}" alt="Logo"/>
                </a>
            </div>
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">
              Input your data to register to our website.
            </p>

            <form action="{{route('createRegis')}}" method="POST">
                @csrf
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  name="email"
                  class="form-control form-control-xl"
                  placeholder="Email"
                  value="{{old('email')}}"
                />
                <div class="form-control-icon">
                  <i class="bi bi-envelope"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  name="nama_lengkap"
                  class="form-control form-control-xl"
                  placeholder="Nama"
                  value="{{old('nama_lengkap')}}"
                />
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  name="username"
                  class="form-control form-control-xl"
                  placeholder="Username"
                  value="{{old('username')}}"
                />
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  name="no_telp"
                  class="form-control form-control-xl"
                  placeholder="No Telephone"
                  value="{{old('no_telp')}}"
                />
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  class="form-control form-control-xl"
                  placeholder="password"
                  value="{{old('password')}}"
                  name="password"
                />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              {{-- <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  class="form-control form-control-xl"
                  placeholder="Confirm Password"
                />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div> --}}
              <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                Sign Up
              </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Already have an account?
                <a href="{{route('login')}}" class="font-bold">Log in</a>.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right"></div>
        </div>
      </div>
    </div>
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
