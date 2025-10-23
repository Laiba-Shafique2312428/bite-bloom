  @php
     
      $title = $title ?? 'Menu Item';
      
      $image = $image ?? 'https://via.placeholder.com/300x200';
      $alt = $alt ?? $title;
      $tags = $tags ?? ['Tag1', 'Tag2', 'Tag3'];
      $rating = $rating ?? '4.5';
        $price = $price ?? '20.00';
    
  @endphp


@php
  // Normalize tags to lower-case for filtering
  $normalizedTags = array_map(function($t){ return strtolower(trim($t)); }, $tags);
  // Determine price range bucket 1..4 based on numeric price
  $numericPrice = is_numeric($price) ? (float)$price : null;
  if ($numericPrice === null) {
    $priceRange = '';
  } elseif ($numericPrice < 10) {
    $priceRange = '1';
  } elseif ($numericPrice < 25) {
    $priceRange = '2';
  } elseif ($numericPrice < 50) {
    $priceRange = '3';
  } else {
    $priceRange = '4';
  }
  $dataTags = implode(',', $normalizedTags);
@endphp

<div class="restaurant-card" data-tags="{{ $dataTags }}" data-rating="{{ $rating }}" data-price-range="{{ $priceRange }}">
                <figure class="card-banner img-holder" style="--width: 300; --height: 200;">
                    <img src="{{$image}}" 
                        height="200" loading="lazy" alt="La Bella Italia" class="img-cover">
                </figure>
                    <h3 class="restaurant-name">{{$title}}</h3>
                    <div class="restaurant-info">
                      <span class="restaurant-rating">PKR {{$price}}</span>
                        <span class="restaurant-rating">★ {{$rating}}</span>
                         
                    </div>
                    <div class="restaurant-tags">
                        @foreach ($tags as $tag )
                             <span class="tag">{{$tag}}</span>
                        @endforeach

                    </div>

                    <div class="restaurant-actions" >
                      <button class="btn btn-primary hover:text-white! mt-5!" type="button" onclick='addToCart({
                        title: @json($title),
                        price: @json($price),
                        image: @json($image),
                        alt: @json($alt)
                      })'>Add to cart</button>
                    </div>
                </div>