<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon" />
  <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

  <!-- ========== All CSS files linkup ========= -->
  {{--
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/lineicons.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/main.css') }}" /> --}}

  @vite([
  'resources/css/bootstrap.min.css',
  'resources/css/lineicons.css',
  'resources/css/materialdesignicons.min.css',
  'resources/css/fullcalendar.css',
  'resources/css/mitra.css',
  'resources/css/main.css',
  'resources/css/style.css',
  'resources/css/responsive.css',
  'resources/js/bootstrap.bundle.min.js',
  'resources/js/Chart.min.js',
  'resources/js/dynamic-pie-chart.js',
  'resources/js/moment.min.js',
  'resources/js/fullcalendar.js',
  'resources/js/jvectormap.min.js',
  'resources/js/world-merc.js',
  'resources/js/polyfill.js',
  'resources/js/main.js',
  'resources/js/mitra.js'
  ])

</head>

<body>
  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper-signin">
    <!-- ========== signin-section start ========== -->
    <section class="signin-section">
      <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title">
                <h2>Sign in Admin</h2>
              </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
              <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#0">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#0">Auth</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Sign in
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->

        <div class="row g-0 auth-row">
          <div class="col-lg-6">
            <div class="auth-cover-wrapper bg-primary-100">
              <div class="auth-cover">
                <div class="title text-center">
                  <h1 class="text-primary mb-10">Welcome Back</h1>
                  <p class="text-medium">
                    Sign in to your Existing account to continue
                  </p>
                </div>
                <div class="cover-image">
                  <img src="{{ asset('/images/auth/signin-image.svg') }}" alt="" />
                </div>
                <div class="shape-image">
                  <img src="{{ asset('/images/auth/shape.svg') }}" alt="" />
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
          <div class="col-lg-6">
            <div class="signin-wrapper">
              <div class="form-wrapper">
                <h6 class="mb-15">Sign In Form</h6>
                <p class="text-sm mb-25">
                  Start creating the best possible user experience for you
                  customers.
                </p>

                @if($errors->any())
                <div>
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                <form action="{{ route('login.action') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label for="username">Username</label>
                        <input type="text" placeholder="Username" name="username" required />
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                      <div class="input-style-1">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Password" name="password" required />
                      </div>
                    </div>
                    <!-- end col -->
                    <!-- end col -->
                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                          Sign In
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </form>
              </div>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
    </section>
    <!-- ========== signin-section end ========== -->

    @include('admin.layout.templates.footer')
    @if(session('message'))
    <script>
      swal({
            title: "Logged Out",
            text: "{{ session('message') }}",
            icon: "info",
            button: "OK",
        });
    </script>
    @endif