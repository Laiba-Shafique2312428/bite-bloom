<div class="topbar">
  <div class="container">

    <address class="topbar-item">
      <div class="icon">
        <ion-icon name="location-outline" aria-hidden="true"></ion-icon>
      </div>
      <span class="span">
        Opposite BBQ Tonight, Boat Basin Clifton, <br>
        Karachi, PK
      </span>
    </address>

    <div class="separator"></div>

    <div class="topbar-item item-2">
      <div class="icon">
        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
      </div>
      <span class="span">Daily : 9.00 am to 11.00 pm</span>
    </div>

    <a href="tel:+921234567890" class="topbar-item link">
      <div class="icon">
        <ion-icon name="call-outline" aria-hidden="true"></ion-icon>
      </div>
      <span class="span">+92 123 456 7890</span>
    </a>

    {{-- Cart Button --}}
    <button style="color: white" class="topbar-item link cart-button" type="button" onclick="toggleCart(true)">
      <div class="icon">
        <ion-icon name="cart-outline" aria-hidden="true"></ion-icon>
      </div>
    </button>

    {{-- Auth / Login --}}
    @if(Auth::check())
        {{-- Show Profile + Logout when authenticated --}}
        <a href="/login" class="topbar-item link icon">
          <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="topbar-item" style="display:inline;">
          @csrf
          <button type="submit" class="btn btn-outline">Logout</button>
        </form>
    @else
        {{-- Show Login when NOT authenticated --}}
        <a href="{{ route('login') }}" class="topbar-item link icon">
          <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
        </a>
    @endif

    <div class="separator"></div>

    <a href="mailto:booking@restaurant.com" class="topbar-item link">
      <div class="icon">
        <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>
      </div>
      <span class="span">booking@restaurant.com</span>
    </a>

  </div>
</div>
