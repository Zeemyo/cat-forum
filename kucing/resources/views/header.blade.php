<ul>
  <li><a class="nav-link scrollto active" href="\kucingku\dashboard">Home</a></li>
  <li><a class="nav-link" href="#artikel">Artikel</a></li>
  <li><a class="nav-link" href="#forum">Forum</a></li>
  <!-- Authentication Links -->
  @guest
      <li><a href="{{ route('register') }}">Register</a></li>
      <li><a href="{{ route('login') }}">Login</a></li>
  @else
</ul>
@endguest
<i class="bi bi-list mobile-nav-toggle"></i>
