<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="{{ asset('/img/logo-putih.png') }}" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
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


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">