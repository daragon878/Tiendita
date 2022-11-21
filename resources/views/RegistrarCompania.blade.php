<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    
  </div>
        
    @include('layouts.navigation')

    <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
              </a>
        </x-slot>

        <form method="POST" action="{{ route('registerCompany') }}">
            @csrf
            <!-- Conpañia-->
            <div>
                <x-input-label for="ruc" :value="__('ruc')" />

                <x-text-input id="ruc" class="block mt-1 w-full" type="text" name="ruc" :value="old('Ruc')" required autofocus />

                <x-input-error :messages="$errors->get('ruc')" class="mt-2" />
            </div>

            <!-- Razon social -->
            <div>
                <x-input-label for="Razzon_Social" :value="__('Razzon Social')" />

                <x-text-input id="Razzon_Social" class="block mt-1 w-full" type="text" name="Razzon_Social" :value="old('Razzon_Social')" required autofocus />

                <x-input-error :messages="$errors->get('Razzon_Social')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="Sucursal" :value="__('Sucursal')" />

                <x-text-input id="Sucursal" class="block mt-1 w-full" type="text" name="Sucursal" :value="old('Sucursal')" required />

                <x-input-error :messages="$errors->get('Sucursal')" class="mt-2" />
            </div>

          
            <!--Direccion -->
            <div class="mt-4">
                <x-input-label for="Direccion" :value="__('Direccion')" />

                <x-text-input id="Direccion" class="block mt-1 w-full" type="text" name="Direccion" :value="old('Direccion')" required />

                <x-input-error :messages="$errors->get('Direccion')" class="mt-2" />
            </div>


             
            <!--Telefono -->
            <div class="mt-4">
                <x-input-label for="Telefono" :value="__('Telefono')" />

                <x-text-input id="Telefono" class="block mt-1 w-full" type="text" name="Telefono" :value="old('Telefono')" required />

                <x-input-error :messages="$errors->get('Telefono')" class="mt-2" />
            </div>

              <!--Telefono -->
              <div class="mt-4">
                <x-input-label for="correo" :value="__('correo')" />

                <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo')" required />

                <x-input-error :messages="$errors->get('correo')" class="mt-2" />
            </div>


              <!--rugro -->
              <div class="mt-4">
                <x-input-label for="Rugro" :value="__('Rugro')" />

                <x-text-input id="Rugro" class="block mt-1 w-full" type="text" name="Rugro" :value="old('Rugro')" required />

                <x-input-error :messages="$errors->get('Rugro')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>



</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
