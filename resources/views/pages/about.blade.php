@extends('layouts.app', ['title' => 'About'])

@section('content')
    <article>
   
        @component('components.hero-section')
        @endcomponent
    @component('components.about-section')
        @endcomponent
       <section class="section testi text-center has-bg-image"
            style="background-image: url('./assets/images/testimonial-bg.jpg')" aria-label="testimonials">
            <div class="container">

                <div class="quote">”</div>

                <p class="headline-2 testi-text">
                    I wanted to thank you for inviting me down for that amazing dinner the other night. The food was
                    extraordinary.
                </p>

                <div class="wrapper">
                    <div class="separator"></div>
                    <div class="separator"></div>
                    <div class="separator"></div>
                </div>

                <div class="profile">
                    <img src="./assets/images/testi-avatar.jpg" width="100" height="100" loading="lazy"
                        alt="Sam Jhonson" class="img">

                    <p class="label-2 profile-name">Sam Jhonson</p>
                </div>

            </div>
        </section>
        <!--
                - #FEATURES
              -->

        <section class="section features text-center" aria-label="features">
            <div class="container">

                <p class="section-subtitle label-2">Why Choose Us</p>

                <h2 class="headline-1 section-title">Our Strength</h2>

                <ul class="grid-list">
                @foreach ($featuresArray as $feature )
                     @component('components.why-choose-us-card', [
                  'title' => $feature['title'],
                  'description' =>  $feature['description'],
                  'icon' => $feature['icon'],
                  'alt' => 'feature icon',
              ])
                  
              @endcomponent
                @endforeach
             
                </ul>

                <img src="./assets/images/shape-7.png" width="208" height="178" loading="lazy" alt="shape"
                    class="shape shape-1">

                <img src="./assets/images/shape-8.png" width="120" height="115" loading="lazy" alt="shape"
                    class="shape shape-2">

            </div>
        </section>
@endsection