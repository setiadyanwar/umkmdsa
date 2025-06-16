document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('main-header');
    const logo = document.getElementById('nav-logo');
    const navLinks = document.querySelectorAll('.nav-link');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const navIndicators = document.querySelectorAll('.nav-indicator');
    const currentPage = header.getAttribute('data-page');

    function updateHeaderStyling() {
        const isHomepage = currentPage === 'homepage';

        if (isHomepage) {
            // Homepage styling - white theme
            header.classList.add('bg-transparent', 'backdrop-blur-sm');
            header.classList.remove('bg-white', 'shadow-sm');

            // White logo
            logo.src = logo.getAttribute('data-default-logo');

            // White nav links
            navLinks.forEach(link => {
                link.classList.remove('text-gray-900', 'text-blue-700');
                link.classList.add('text-white');

                // Active state for homepage
                if (link.getAttribute('data-route') === currentPage) {
                    link.classList.add('text-blue-500');
                    link.classList.remove('text-white');
                }
            });

            // White mobile nav links
            mobileNavLinks.forEach(link => {
                link.classList.remove('text-gray-900', 'text-blue-700', 'border-blue-700');
                link.classList.add('text-white');

                // Active state for homepage mobile
                if (link.getAttribute('data-route') === currentPage) {
                    link.classList.add('text-blue-500', 'border-blue-500');
                    link.classList.remove('text-white');
                }
            });

            // White mobile menu button
            mobileMenuButton.classList.remove('text-gray-900', 'hover:text-blue-600');
            mobileMenuButton.classList.add('text-white', 'hover:text-blue-500');

            // Blue indicators
            navIndicators.forEach(indicator => {
                indicator.classList.remove('bg-blue-700');
                indicator.classList.add('bg-blue-500');
            });

        } else {
            // Other pages styling - dark theme
            header.classList.remove('bg-transparent', 'backdrop-blur-sm');
            header.classList.add('bg-white');

            // Blue/dark logo
            logo.src = logo.getAttribute('data-dark-logo');

            // Dark nav links
            navLinks.forEach(link => {
                link.classList.remove('text-white', 'text-blue-500');
                link.classList.add('text-gray-900');

                // Active state for other pages
                if (link.getAttribute('data-route') === currentPage) {
                    link.classList.add('text-blue-700');
                    link.classList.remove('text-gray-900');
                }
            });

            // Dark mobile nav links
            mobileNavLinks.forEach(link => {
                link.classList.remove('text-white', 'text-blue-500', 'border-blue-500');
                link.classList.add('text-gray-900');

                // Active state for other pages mobile
                if (link.getAttribute('data-route') === currentPage) {
                    link.classList.add('text-blue-700', 'border-blue-700');
                    link.classList.remove('text-gray-900');
                }
            });

            // Dark mobile menu button
            mobileMenuButton.classList.remove('text-white', 'hover:text-blue-500');
            mobileMenuButton.classList.add('text-gray-900', 'hover:text-blue-600');

            // Blue indicators
            navIndicators.forEach(indicator => {
                indicator.classList.remove('bg-blue-500');
                indicator.classList.add('bg-blue-700');
            });
        }
    }

    // Apply styling on page load
    updateHeaderStyling();

    // Handle scroll effects for homepage
    if (currentPage === 'homepage') {
        window.addEventListener('scroll', function() {
            const scrolled = window.scrollY > 50;

            if (scrolled) {
                header.classList.remove('bg-transparent');
                header.classList.add('bg-white/90', 'backdrop-blur-md');

                // Switch to dark theme when scrolled
                logo.src = logo.getAttribute('data-dark-logo');

                navLinks.forEach(link => {
                    link.classList.remove('text-white', 'text-blue-500');
                    link.classList.add('text-gray-900');

                    if (link.getAttribute('data-route') === currentPage) {
                        link.classList.add('text-blue-700');
                        link.classList.remove('text-gray-900');
                    }
                });

                mobileMenuButton.classList.remove('text-white', 'hover:text-blue-500');
                mobileMenuButton.classList.add('text-gray-900', 'hover:text-blue-600');

            } else {
                header.classList.add('bg-transparent');
                header.classList.remove('bg-white/90', 'backdrop-blur-md');

                // Switch back to white theme
                updateHeaderStyling();
            }
        });
    }

    // Mobile menu toggle
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });
});
