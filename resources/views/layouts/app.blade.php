<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="current-route" content="{{ Route::currentRouteName() }}">

    <!-- CSS Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Custom CSS and JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Portal UMKM Binaan DSA - IPB</title>

    <style>
        /* Header background transitions */
        #main-header {
            transition: background-color 0.3s ease, backdrop-filter 0.3s ease;
        }
    </style>
</head>

<body class="font-lato min-h-screen">

    @include('components.header')

    @yield('content')

    @include('components.footer')

    <!-- JS Libraries -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Optional: local script, only if applicable -->
    <script src="./node_modules/preline/dist/preline.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>
