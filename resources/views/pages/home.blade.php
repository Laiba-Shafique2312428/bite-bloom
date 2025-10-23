@extends('layouts.app', ['title' => 'Home'])

@section('content')
    <article>
        <!--
                - #HERO
              -->
        @component('components.hero-section')
        @endcomponent
        <!--
                - #SERVICE
              -->
        <section class="section service bg-black-10 text-center" aria-label="service">
            <div class="container">

                <p class="section-subtitle label-2">Flavors For Royalty</p>

                <h2 class="headline-1 section-title">We Offer Top Notch</h2>

                <p class="section-text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been the
                    industrys
                    standard dummy text ever.
                </p>

                <ul class="grid-list">
                    @foreach ($ServiceArray as $item)
                        @component('components.menu-card', [
                            'title' => $item['title'],
                            'link' => $item['link'] ?? '#',
                            'image' => $item['image'],
                            'alt' => $item['alt'],
                        ])
                        @endcomponent
                    @endforeach
                </ul>

                <img src="./assets/images/shape-1.png" width="246" height="412" loading="lazy" alt="shape"
                    class="shape shape-1 move-anim">
                <img src="./assets/images/shape-2.png" width="343" height="345" loading="lazy" alt="shape"
                    class="shape shape-2 move-anim">

            </div>
        </section>
        <!--
                - #ABOUT
              -->
        @component('components.about-section')
        @endcomponent
        <!--
                - #SPECIAL DISH
              -->
        <section class="special-dish text-center" aria-labelledby="dish-label">

            <div class="special-dish-banner">
                <img src="./assets/images/special-dish-banner.jpg" width="940" height="900" loading="lazy"
                    alt="special dish" class="img-cover">
            </div>

            <div class="special-dish-content bg-black-10">
                <div class="container">

                    <img src="./assets/images/badge-1.png" width="28" height="41" loading="lazy" alt="badge"
                        class="abs-img">

                    <p class="section-subtitle label-2">Special Dish</p>

                    <h2 class="headline-1 section-title">Lobster Tortellini</h2>

                    <p class="section-text">
                        Lorem Ipsum is simply dummy text of the printingand typesetting industry lorem Ipsum has been the
                        industrys standard dummy text ever since the when an unknown printer took a galley of type.
                    </p>

                    <div class="wrapper">
                        <del class="del body-3">$40.00</del>

                        <span class="span body-1">$20.00</span>
                    </div>

                    <a href="#" class="btn btn-primary">
                        <span class="text text-1">View All Menu</span>

                        <span class="text text-2" aria-hidden="true">View All Menu</span>
                    </a>

                </div>
            </div>

            <img src="./assets/images/shape-4.png" width="179" height="359" loading="lazy" alt=""
                class="shape shape-1">

            <img src="./assets/images/shape-9.png" width="351" height="462" loading="lazy" alt=""
                class="shape shape-2">

        </section>
        <!--
                - #MENU
              -->
        <section class="section menu" aria-label="menu-label" id="menu">
            <div class="container">

                <p class="section-subtitle text-center label-2">Special Selection</p>

                <h2 class="headline-1 section-title text-center">Delicious Menu</h2>

                <ul class="grid-list">
                    @foreach ($menuArray as $item)
                        @component('components.menu-home-card', [
                            'title' => $item['title'],
                            'tag' => $item['tag'] ?? null,
                            'description' => $item['description'],
                            'image' => $item['image'],
                            'alt' => $item['alt'],
                            'price' => $item['price'],
                        ])
                        @endcomponent
                    @endforeach
                </ul>

                <p class="menu-text text-center">
                    During winter daily from <span class="span">7:00 pm</span> to <span class="span">9:00 pm</span>
                </p>

                <a href="/menu" class="btn btn-primary">
                    <span class="text text-1">View All Menu</span>

                    <span class="text text-2" aria-hidden="true">View All Menu</span>
                </a>

                <img src="./assets/images/shape-5.png" width="921" height="1036" loading="lazy" alt="shape"
                    class="shape shape-2 move-anim">
                <img src="./assets/images/shape-6.png" width="343" height="345" loading="lazy" alt="shape"
                    class="shape shape-3 move-anim">

            </div>
        </section>
        <!--
                - #TESTIMONIALS
              -->

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
      

    </article>
