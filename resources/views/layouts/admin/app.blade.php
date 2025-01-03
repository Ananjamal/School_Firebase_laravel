<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assetsDash/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('assetsDash/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https:/fonts.gstatic.com" rel="preconnect">
  <link href="https:/fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assetsDash/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsDash/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsDash/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsDash/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsDash/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsDash/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assetsDash/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assetsDash/css/style.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https:/bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 7 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https:/bootstrapmade.com/license/
  ======================================================== -->
</head>

<body >

        @include('firebase.admin.includes.header')

        @include('firebase.admin.includes.sidebar')

            @yield( 'content' )



{{-- 
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https:/bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https:/bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https:/bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer --> --}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assetsDash/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assetsDash/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assetsDash/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('assetsDash/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('assetsDash/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('assetsDash/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assetsDash/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('assetsDash/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assetsDash/js/main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
