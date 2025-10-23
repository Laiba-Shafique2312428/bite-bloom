@extends('layouts.app', ['title' => 'Menu'])

@section('content')
    @component('components.hero-section-menu')
    @endcomponent
    <div style="display: flex">

@component('components.side-bar')
@endcomponent
       
        <div class="main-content">
            <div class="content-header">
                <h1 class="content-title">Discover Restaurants</h1>
                <p class="content-subtitle">Find your perfect dining experience</p>
            </div>

            <div class="restaurant-grid">
                <!-- Restaurant Card 1 -->
                @foreach ($menuArray as  $item)
                       @component('components.restursnt-card',
                       [
                            'title' => $item['title'],
                            'tags' => $item['tag'] ??['Tag1', 'Tag2', 'Tag3'],
                            'rating' => $item['rating'],
                            'image' => $item['image'],
                            'alt' => $item['alt'],
                            'price' => $item['price'],
                        ]

                       )

                
                @endcomponent
                @endforeach
             

                
            </div>
            </d>
        </div>
    </div>



        <script>
            function toggleSection(button) {
                const options = button.nextElementSibling;
                const chevron = button.querySelector('.chevron');

                options.classList.toggle('active');
                chevron.classList.toggle('rotated');
            }

            function updateFilterCount() {
                const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                const count = checkboxes.length;
                const clearBtn = document.querySelector('.clear-filters');

                if (count > 0) {
                    clearBtn.textContent = `Clear all (${count})`;
                    clearBtn.style.display = 'inline-block';
                } else {
                    clearBtn.style.display = 'none';
                }
                // update the visible cards whenever the filter count changes
                if (typeof applyFilters === 'function') applyFilters();
            }

            function clearAllFilters() {
                document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = false;
                });
                updateFilterCount();
            }

            // Apply filters: show/hide .restaurant-card elements based on selected filters
            function applyFilters() {
                const cuisineIds = ['italian','japanese','mexican','indian','thai','french','chinese','mediterranean','seasonal'];
                const priceIds = ['price1','price2','price3','price4'];
                const ratingIds = ['rating5','rating4','rating3'];
                const dietIds = ['vegetarian','vegan','glutenfree','halal','kosher'];

                const selectedCuisines = cuisineIds.filter(id => document.getElementById(id) && document.getElementById(id).checked);
                const selectedPrices = priceIds.filter(id => document.getElementById(id) && document.getElementById(id).checked).map(id => id.replace('price',''));
                const selectedRatings = ratingIds.filter(id => document.getElementById(id) && document.getElementById(id).checked).map(id => Number(id.replace('rating','')));
                const selectedDiets = dietIds.filter(id => document.getElementById(id) && document.getElementById(id).checked);

                const cards = document.querySelectorAll('.restaurant-card');
                cards.forEach(card => {
                    const tags = (card.dataset.tags || '').toLowerCase();
                    const rating = parseFloat(card.dataset.rating || '0');
                    const priceRange = card.dataset.priceRange || '';

                    // Cuisine: if any cuisine selected, card must match at least one
                    let cuisineMatch = true;
                    if (selectedCuisines.length > 0) {
                        cuisineMatch = selectedCuisines.some(c => tags.includes(c));
                    }

                    // Price range: if any selected, card's data-price-range must be in selectedPrices
                    let priceMatch = true;
                    if (selectedPrices.length > 0) {
                        priceMatch = selectedPrices.includes(priceRange);
                    }

                    // Rating: if any selected, card rating must satisfy at least one threshold (e.g., 4+ or 5+)
                    let ratingMatch = true;
                    if (selectedRatings.length > 0) {
                        ratingMatch = selectedRatings.some(th => rating >= th);
                    }

                    // Dietary: if any selected, card tags must include at least one of the diet filters
                    let dietMatch = true;
                    if (selectedDiets.length > 0) {
                        dietMatch = selectedDiets.some(d => tags.includes(d));
                    }

                    if (cuisineMatch && priceMatch && ratingMatch && dietMatch) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            // Wire up controls on page load
            document.addEventListener('DOMContentLoaded', function() {
                // wire checkboxes to update filter count and apply filters
                document.querySelectorAll('.sidebar input[type="checkbox"]').forEach(cb => {
                    cb.addEventListener('change', () => {
                        updateFilterCount();
                    });
                });

                // Apply button
                const applyBtn = document.querySelector('.apply-btn');
                if (applyBtn) applyBtn.addEventListener('click', applyFilters);

                // initial filter application
                applyFilters();
            });
        </script>
    @endsection
