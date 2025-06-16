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
        .price-range-filter {
            margin-bottom: 1.5rem;
        }

        .filter-title {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.75rem;
        }

        .range-input-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .price-label {
            font-size: 0.875rem;
            color: #4b5563;
        }

        .min-price,
        .max-price {
            width: 5rem;
            padding: 0.25rem 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }

        .separator {
            color: #6b7280;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen font-lato text-black">

    @include('components.header')

    <div class="flex-grow">
        @yield('content')
    </div>

    @include('components.footer')

    <!-- JS Libraries -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Optional: local script, only if applicable -->
    <script src="./node_modules/preline/dist/preline.js"></script>
    

    <!-- Custom Script -->
    <script>
        window.addEventListener('load', () => {
            (function() {
                const range = document.querySelector('#hs-pass-values-to-html-elements');
                if (!range) return;
                const rangeInstance = new HSRangeSlider(range);
                const min = document.querySelector('#hs-pass-values-to-html-elements-min-target');
                const max = document.querySelector('#hs-pass-values-to-html-elements-max-target');

                range.noUiSlider.on('update', (values) => {
                    min.innerText = rangeInstance.formattedValue[0];
                    max.innerText = rangeInstance.formattedValue[1];
                });
            })();
        });

        document.querySelectorAll('.min-price, .max-price').forEach(input => {
            input.addEventListener('change', function() {
                if (parseInt(this.value) < 0) this.value = 0;

                const minInput = document.querySelector('.min-price');
                const maxInput = document.querySelector('.max-price');

                if (this.classList.contains('min-price') && parseInt(this.value) > parseInt(maxInput
                    .value)) {
                    this.value = maxInput.value;
                }

                if (this.classList.contains('max-price') && parseInt(this.value) < parseInt(minInput
                    .value)) {
                    this.value = minInput.value;
                }
            });
        });
    </script>

</body>

</html>
