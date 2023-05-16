<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('public/admin') }}/assets/"
  data-template="vertical-menu-template-no-customizer"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/admin') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Theme main CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/demo.css') }}" />
    <!-- Theme main CSS -->

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/node-waves/node-waves.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/select2/select2.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" /> --}}

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/pages/cards-advance.css') }}" />
    <!-- Helpers -->

    <link rel="stylesheet" href="{{asset('public/admin/assets/css/toastr.min.css')}}">

    <!-- custom css content -->
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/custom.css') }}" />
    <!-- custom css content -->

    <script src="{{ asset('public/admin/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/js/template-customizer.js') }}"></script>

    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('public/admin/assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        @include('admin.layouts.sidebar-menu');
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('admin.layouts.header')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            @include('admin.layouts.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('public/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/popper/popper.js') }}"></script> --}}
    <script src="{{ asset('public/admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/node-waves/node-waves.js') }}"></script> --}}

    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/hammer/hammer.js') }}"></script> --}}
    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/i18n/i18n.js') }}"></script> --}}
    <script src="{{ asset('public/admin/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

    <script src="{{ asset('public/admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <script src="{{ asset('public/admin/assets/vendor/libs/moment/moment.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('public/admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/swiper/swiper.js') }}"></script> --}}
    <script src="{{ asset('public/admin/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/libs/select2/select2.js') }}"></script>
    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/cleavejs/cleave.js') }}"></script> --}}
    {{-- <script src="{{ asset('public/admin/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script> --}}

    <!-- Main JS -->
    <script src="{{ asset('public/admin/assets/js/main.js') }}"></script>
    {{-- <script src="{{ asset('public/admin/assets/js/app-user-list.js') }}"></script> --}}

    <!-- Page JS -->
    <script src="{{asset('public/admin/assets/js/toastr.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/search.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <!-- custom js content -->
    @stack('js')
    <!-- custom js content -->
  </body>
</html>
