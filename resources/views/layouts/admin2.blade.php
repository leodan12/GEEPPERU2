<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Ecommerce') }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
 
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}"> 
    
   
    @yield('page-info')
</head>
<body>
    
    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')

            <div class="main-panel">
                
                    @yield('content')
                 
            </div>

        </div>
    </div>

    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>

     
</body>
</html>