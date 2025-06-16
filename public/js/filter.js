document.addEventListener('DOMContentLoaded', function() {
    // Store original products data
    const originalProducts = Array.from(document.querySelectorAll('.product-card')).map(card => ({
        element: card.cloneNode(true),
        name: card.getAttribute('data-name'),
        price: parseInt(card.getAttribute('data-price')),
        category: card.getAttribute('data-category'),
        date: new Date(card.getAttribute('data-date')),
        popularity: parseInt(card.getAttribute('data-popularity'))
    }));

    // Initialize accordion functionality
    const accordionButtons = document.querySelectorAll('.accordion-button');

    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.accordion-icon');

            // Toggle content visibility
            if (content.style.maxHeight && content.style.maxHeight !== '0px') {
                content.style.maxHeight = '0px';
                icon.style.transform = 'rotate(0deg)';
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            }
        });

        // Open accordions by default
        const content = button.nextElementSibling;
        const icon = button.querySelector('.accordion-icon');
        content.style.maxHeight = content.scrollHeight + 'px';
        icon.style.transform = 'rotate(180deg)';
    });

    // Mobile filter toggle
    const mobileFilterToggle = document.getElementById('mobile-filter-toggle');
    const filterSidebar = document.getElementById('filter-sidebar');
    const filterIcon = document.getElementById('filter-icon');

    mobileFilterToggle.addEventListener('click', function() {
        filterSidebar.classList.toggle('hidden');
        if (filterSidebar.classList.contains('hidden')) {
            filterIcon.style.transform = 'rotate(0deg)';
        } else {
            filterIcon.style.transform = 'rotate(180deg)';
        }
    });

    // Price range slider functionality
    const minPriceRange = document.getElementById('min-price-range');
    const maxPriceRange = document.getElementById('max-price-range');
    const minPriceHandle = document.getElementById('min-price-handle');
    const maxPriceHandle = document.getElementById('max-price-handle');
    const priceRangeProgress = document.getElementById('price-range-progress');
    const minPriceInput = document.getElementById('min-price-input');
    const maxPriceInput = document.getElementById('max-price-input');

    // Format number to currency
    function formatCurrency(value) {
        return new Intl.NumberFormat('id-ID').format(value);
    }

    // Parse currency string to number
    function parseCurrency(value) {
        return parseInt(value.replace(/\D/g, ''));
    }

    // Update slider positions and progress bar
    function updateSlider() {
        const minVal = parseInt(minPriceRange.value);
        const maxVal = parseInt(maxPriceRange.value);

        const percent1 = (minVal / parseInt(minPriceRange.max)) * 100;
        const percent2 = (maxVal / parseInt(maxPriceRange.max)) * 100;

        minPriceHandle.style.left = `${percent1}%`;
        maxPriceHandle.style.left = `${percent2}%`;
        priceRangeProgress.style.left = `${percent1}%`;
        priceRangeProgress.style.width = `${percent2 - percent1}%`;

        minPriceInput.value = formatCurrency(minVal);
        maxPriceInput.value = formatCurrency(maxVal);
    }

    // Initialize slider
    updateSlider();

    // Event listeners for range inputs
    minPriceRange.addEventListener('input', function() {
        const minVal = parseInt(minPriceRange.value);
        const maxVal = parseInt(maxPriceRange.value);

        if (minVal > maxVal - 50000) {
            minPriceRange.value = maxVal - 50000;
        }

        updateSlider();
    });

    maxPriceRange.addEventListener('input', function() {
        const minVal = parseInt(minPriceRange.value);
        const maxVal = parseInt(maxPriceRange.value);

        if (maxVal < minVal + 50000) {
            maxPriceRange.value = minVal + 50000;
        }

        updateSlider();
    });

    // Event listeners for text inputs
    minPriceInput.addEventListener('change', function() {
        let value = parseCurrency(this.value);
        const maxVal = parseInt(maxPriceRange.value);

        if (isNaN(value)) value = 0;
        if (value < 0) value = 0;
        if (value > parseInt(minPriceRange.max)) value = parseInt(minPriceRange.max);
        if (value > maxVal - 50000) value = maxVal - 50000;

        minPriceRange.value = value;
        updateSlider();
    });

    maxPriceInput.addEventListener('change', function() {
        let value = parseCurrency(this.value);
        const minVal = parseInt(minPriceRange.value);

        if (isNaN(value)) value = parseInt(maxPriceRange.max);
        if (value > parseInt(maxPriceRange.max)) value = parseInt(maxPriceRange.max);
        if (value < minVal + 50000) value = minVal + 50000;

        maxPriceRange.value = value;
        updateSlider();
    });

    // Custom radio buttons for sort options
    const sortOptions = document.querySelectorAll('.sort-option');
    sortOptions.forEach(option => {
        const radio = option.querySelector('input[type="radio"]');
        if (radio.checked) {
            option.classList.add('bg-blue-50');
        }

        option.addEventListener('click', function() {
            sortOptions.forEach(opt => opt.classList.remove('bg-blue-50'));
            this.classList.add('bg-blue-50');

            // Apply sorting
            applyFilters();
        });
    });

    // Reset filter functionality
    document.getElementById('reset-filter').addEventListener('click', function() {
        // Reset category filters
        document.querySelectorAll('input[name="category"]').forEach(radio => radio.checked = false);

        // Reset price range
        minPriceRange.value = 50000;
        maxPriceRange.value = 1500000;
        updateSlider();

        // Reset sort
        document.querySelectorAll('input[name="sort"]').forEach(radio => {
            radio.checked = radio.value === 'cheapest';
        });

        // Reset sort option styling
        sortOptions.forEach(opt => opt.classList.remove('bg-blue-50'));
        sortOptions[1].classList.add('bg-blue-50');

        // Reset search
        document.getElementById('search-input').value = '';

        // Apply reset filters
        applyFilters();
    });

    // Apply filter button
    document.getElementById('apply-filter').addEventListener('click', function() {
        applyFilters();
    });

    // Search functionality with debounce
    const searchInput = document.getElementById('search-input');
    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            applyFilters();
        }, 300);
    });

    // Category filter functionality
    document.querySelectorAll('input[name="category"]').forEach(radio => {
        radio.addEventListener('change', function() {
            applyFilters();
        });
    });

    // Pagination functionality
    const pageButtons = document.querySelectorAll('.page-btn');
    const prevButton = document.getElementById('prev-btn');
    const nextButton = document.getElementById('next-btn');

    pageButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            pageButtons.forEach(b => {
                b.classList.remove('bg-[#113EA1]', 'text-white', 'active');
                b.classList.add('border', 'border-gray-300', 'text-gray-700',
                    'hover:bg-gray-50');
            });
            this.classList.add('bg-[#113EA1]', 'text-white', 'active');
            this.classList.remove('border', 'border-gray-300', 'text-gray-700',
                'hover:bg-gray-50');
        });
    });

    prevButton.addEventListener('click', function() {
        const activePage = document.querySelector('.page-btn.active');
        const prevPage = activePage.previousElementSibling;
        if (prevPage && prevPage.classList.contains('page-btn')) {
            prevPage.click();
        }
    });

    nextButton.addEventListener('click', function() {
        const activePage = document.querySelector('.page-btn.active');
        const nextPage = activePage.nextElementSibling;
        if (nextPage && nextPage.classList.contains('page-btn')) {
            nextPage.click();
        }
    });

    // Filter and sort products
    function applyFilters() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedCategory = document.querySelector('input[name="category"]:checked')?.value || '';
        const minPrice = parseInt(minPriceRange.value);
        const maxPrice = parseInt(maxPriceRange.value);
        const sortBy = document.querySelector('input[name="sort"]:checked')?.value || 'cheapest';

        let filteredProducts = originalProducts.filter(product => {
            // Search filter
            if (searchTerm && !product.name.includes(searchTerm)) {
                return false;
            }

            // Category filter
            if (selectedCategory && product.category !== selectedCategory) {
                return false;
            }

            // Price range filter
            if (product.price < minPrice || product.price > maxPrice) {
                return false;
            }

            return true;
        });

        // Sort products
        filteredProducts.sort((a, b) => {
            switch (sortBy) {
                case 'cheapest':
                    return a.price - b.price;
                case 'expensive':
                    return b.price - a.price;
                case 'newest':
                    return b.date - a.date;
                case 'popular':
                    return b.popularity - a.popularity;
                default:
                    return a.price - b.price;
            }
        });

        // Update display
        const productsGrid = document.getElementById('products-grid');
        const resultsCount = document.getElementById('results-count');

        // Clear current products
        productsGrid.innerHTML = '';

        if (filteredProducts.length === 0) {
            const noResults = document.createElement('div');
            noResults.className = 'col-span-full text-center py-12';
            noResults.innerHTML = `
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-gray-500 text-lg mb-4">Tidak ada produk yang sesuai dengan pencarian Anda</p>
                <button id="clear-filters" class="text-blue-600 hover:text-blue-800 font-medium">Hapus semua filter</button>
            `;
            productsGrid.appendChild(noResults);

            // Update results count
            resultsCount.textContent = '0 hasil ditemukan';

            // Add event listener for clear filters button
            document.getElementById('clear-filters').addEventListener('click', function() {
                document.getElementById('reset-filter').click();
            });
        } else {
            // Add filtered products to grid
            filteredProducts.forEach(product => {
                const clonedElement = product.element.cloneNode(true);
                productsGrid.appendChild(clonedElement);
            });

            // Update results count
            resultsCount.textContent = `${filteredProducts.length} hasil ditemukan`;
        }
    }

    // Handle window resize for responsive sidebar
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) { // md breakpoint
            filterSidebar.classList.remove('hidden');
        } else if (!filterSidebar.classList.contains('hidden')) {
            filterSidebar.classList.add('hidden');
        }
    });

    // Initialize with default filters
    applyFilters();
});

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
