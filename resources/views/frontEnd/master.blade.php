<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title','') | Southern Automobiles Ltd</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link title="Southern Ltd" href="{{ asset('img/favicon.png') }}" rel="icon">
  <link title="Southern Ltd" href="{{ asset('frontEnd/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontEnd/assets/vendor/aos/aos.css" rel="stylesheet') }}">
  <link href="{{ asset('frontEnd/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontEnd/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontEnd/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontEnd/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontEnd/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontEnd/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  @include('frontEnd.include.topheader')

  <!-- ======= Header ======= -->

    @include('frontEnd.include.header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->

  <!-- End Hero -->

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    @include('frontEnd.include.footer')
  <!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontEnd/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('frontEnd/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontEnd/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontEnd/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontEnd/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontEnd/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontEnd/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('frontEnd/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontEnd/assets/js/main.js') }}"></script>

</body>

</html>
