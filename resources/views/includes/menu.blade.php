<ul>
    <li><a href="{{ url('/') }}">Home</a></li>
@if (Auth::guest()) 
<!-- contrario sería Auth::check() -->
    <li><a href="{{ url('/login') }}">Login</a></li>
    <li><a href="{{ url('/register') }}">Register</a></li>
@else
    <li>{{ Auth::user()->name }}</li>
    <li><a href="{{ url('/logout') }}">Logout</a></li>
@endif
</ul>