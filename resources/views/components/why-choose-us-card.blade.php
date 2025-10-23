
@php
    $title = $title ?? 'Menu Item';
    $description = $description ?? 'Delicious food item description goes here.';
    $icon = $icon ?? 'https://via.placeholder.com/100';
    $alt = $alt ?? $title;
@endphp


<li class="feature-item">
    <div class="feature-card">
        <div class="card-icon">
            <img src="{{ $icon }}" width="100" height="80" loading="lazy" alt="{{$alt}}">
        </div>

        <h3 class="title-2 card-title">{{ $title }}</h3>

        <p class="label-1 card-text">{{ $description }}</p>
    </div>
</li>