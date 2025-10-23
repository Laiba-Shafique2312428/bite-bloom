  @php
     
      $title = $title ?? 'Menu Item';
      $link = $description ?? '/menu';
      $image = $image ?? 'https://via.placeholder.com/300x200';
      $alt = $alt ?? $title;
    
  @endphp

  <li>
              <div class="service-card">

                <a href="#" class="has-before hover:shine">
                  <figure class="card-banner img-holder" style="--width: 285; --height: 336;">
                    <img src="{{$image}}" width="285" height="336" loading="lazy" alt="{{$alt}}"
                      class="img-cover">
                  </figure>
                </a>

                <div class="card-content">

                  <h3 class="title-4 card-title">
                    <a href="#">{{$title}}</a>
                  </h3>

                  <a href="{{$link}}" class="btn-text hover-underline label-2">View Menu</a>

                </div>

              </div>
            </li>