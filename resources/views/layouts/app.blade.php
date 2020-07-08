<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AgroQlik</title>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   <script
       src="https://code.jquery.com/jquery-3.4.1.min.js"
       integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
       crossorigin="anonymous" ></script>
   

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">

   <!-- Styles -->
  
   <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
   @yield('css')
</head>
<body>

    <div id="app">
        @include('layouts.header')

        <main class="py-4">
            <div class="container">
                @include('layouts.alerts')
                @yield('nav')
                @yield('content')
            </div>
        </main>
    </div>
    @yield('js')

</body>
</html>
