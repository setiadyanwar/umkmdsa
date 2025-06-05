<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        rel="stylesheet" />

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Portal UMKM Binaan DSA - IPB</title>
</head>

<body class="font-lato text-white min-h-screen">

    {{-- @include('components.header') --}}


    @yield('content')


    @include('components.footer')




</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.getElementById('scrolling-track');
        const cards = track.querySelectorAll('.animate-scroll');

        // Pause animation on hover
        track.addEventListener('mouseenter', () => {
            cards.forEach(card => {
                card.style.animationPlayState = 'paused';
            });
        });

        // Resume animation when mouse leaves
        track.addEventListener('mouseleave', () => {
            cards.forEach(card => {
                card.style.animationPlayState = 'running';
            });
        });
    });
    // const animatedElements = document.querySelectorAll('[data-animate="fade-up"]');

    // const animateOnScroll = () => {
    //     animatedElements.forEach(el => {
    //         const rect = el.getBoundingClientRect();
    //         const isVisible = rect.top < window.innerHeight - 50; // 50px sebelum muncul

    //         if (isVisible) {
    //             el.classList.add('opacity-100', 'translate-y-0');
    //             el.classList.remove('opacity-0', 'translate-y-8');
    //         }
    //     });
    // };

    // window.addEventListener('scroll', animateOnScroll);
    // window.addEventListener('load', animateOnScroll);
    AOS.init();
    document.addEventListener("DOMContentLoaded", function() {
        const image = document.getElementById("fadeImage");

        const observer = new IntersectionObserver(
            entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        image.classList.remove("opacity-0", "scale-90");
                        image.classList.add("opacity-100", "scale-100");
                        observer.unobserve(image); // agar hanya animasi sekali
                    }
                });
            }, {
                threshold: 0.3
            } // hanya animasi jika 30% elemen terlihat
        );

        if (image) {
            observer.observe(image);
        }
    });
</script>

</html>
