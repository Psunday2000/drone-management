<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Drone Disaster Management') }}</title>

    @vite(['resources/css/app.css', 'resources/css/main.css', 'resources/js/app.js'])
    <script src="{{asset('assets/js/ab5bc2fd91.js')}}" crossorigin="anonymous"></script>
    <!-- Select2 CSS -->
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS (if not included via Vite) -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

</head>
<body>
    <div id="app">
        @include('layouts.navigation')

        <main class="py-4">
            @yield('content')
        </main>
    </div>    
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}" crossorigin="anonymous"></script>
    <!-- Select2 JS -->
    <script src="{{ asset('assets/js/select2.min.js') }}" crossorigin="anonymous"></script>
    <!-- Bootstrap JS (if not included via Vite) -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('#receiver_email').select2({
                placeholder: "Select a user",
                allowClear: true
            });

            // Auto dismiss alert after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>
</body>
</html>