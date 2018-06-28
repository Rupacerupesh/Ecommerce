
<ul class="links">

    <li><a href="{{ route('home') }}"> @if(Session::has('customer'))
                                            <span>
                                                    {{Session::get('customer')}}
                                                </span>
                                            @endif
Go Back</a></li>
    @guest
    <li><a href="{{ route('register') }}">Sign Up</a></li>
    <li><a href="{{ route('login') }}">Login</a></li>
    @else
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>
    </li>
    <li>
        <a href="{{ route('wishlist.index') }}">
            Wishlist
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endguest
</ul>
