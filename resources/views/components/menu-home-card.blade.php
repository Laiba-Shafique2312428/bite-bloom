@php
    $title = $title ?? 'Menu Item';
    $tag = $tag ?? 'Seasonal';
    $description = $description ?? 'Delicious food item description goes here.';
    $image = $image ?? 'https://via.placeholder.com/100';
    $alt = $alt ?? $title;
    $price = $price ?? '0.00';
@endphp

<li>
    <div class="menu-card hover:card">

        <figure class="card-banner img-holder" style="--width: 100; --height: 100; width:17%">
            <img src="{{ $image }}" width="100" height="100" loading="lazy" alt="{{ $alt }}" class="img-cover">
        </figure>

        <div>
            <div class="title-wrapper">
                <h3 class="title-3">
                    <a href="#" class="card-title">{{ $title }}</a>
                </h3>

                <span class="badge label-1">{{ $tag }}</span> 

                <span class="span title-2">PKR {{ number_format($price, 2) }}</span>
            </div>

            <p class="card-text label-1">
                {{ $description }}
            </p>
        </div>

    </div>
</li>
