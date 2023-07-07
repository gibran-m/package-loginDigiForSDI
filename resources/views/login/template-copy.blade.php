<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>{{ config('app.name', 'HRMIS') }}</title>
    <link rel="shortcut icon" href={{asset('local_assets\img\login\bjbs.png')}} type="image/x-icon">
    <link href="/assets/css/puk/bootstrap5.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/login/global.css" />
    <link rel="stylesheet" href="/assets/css/login/index.css" />
    <link rel="stylesheet" href="/assets/css/login/roboto.css"/>
    <link rel="stylesheet" href="/assets/css/puk/bootstrap-icon.css">

  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    @yield('login')
    <!-- page-wrapper end-->
    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    @yield('script')

  </body>
</html>