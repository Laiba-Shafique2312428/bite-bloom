<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    {{-- Google & Bunny Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&family=Forum&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- Laravel Vite: Loads resources/css/app.css and resources/js/app.js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Preload hero images from public/assets/images --}}
    <link rel="preload" as="image" href="{{ asset('assets/images/hero-slider-1.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('assets/images/hero-slider-2.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('assets/images/hero-slider-3.jpg') }}">

    @isset($head)
        {!! $head !!}
    @endisset
</head>

<body id="top">
  <!-- 
    - #PRELOADER
  -->

  <div class="preload" data-preaload>
    <div class="circle"></div>
    <p class="text">Bite & Bloom</p>
  </div>

  <!-- 
    - #TOP BAR
  -->
@component('components.topbar')
    
@endcomponent





  <!-- 
    - #HEADER
  -->

 @component('components.nav-bar')
     
 @endcomponent


    {{-- Page Content --}}
    <main >
        @yield('content')
    </main>
@component('components.footer')
    
@endcomponent
<a href="#top" class="back-top-btn active" aria-label="back to top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>
  
  {{-- Cart drawer: included site-wide so cart functions exist on every page --}}
@component('components.cart-sidebar')
@endcomponent
<script>
  // Fallback wiring: ensure toggleCart exists and wire .cart-button clicks
  (function(){
    function ensureToggle() {
      if(typeof window.toggleCart !== 'function'){
        console.warn('toggleCart not found on window — providing fallback');
        window.toggleCart = function(open){
          var el = document.getElementById('cart-drawer');
          if(!el) return;
          if(open) el.classList.add('open'), el.setAttribute('aria-hidden','false'); else el.classList.remove('open'), el.setAttribute('aria-hidden','true');
        };
      }
    }
    ensureToggle();

    document.addEventListener('click', function(e){
      var btn = e.target.closest && e.target.closest('.cart-button');
      if(btn){
        e.preventDefault();
        try{ ensureToggle(); window.toggleCart(true); }catch(err){ console.error(err); }
      }
    });
  })();
</script>
    @isset($scripts)
        {!! $scripts !!}
    @endisset

    {{-- Ionicons --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
