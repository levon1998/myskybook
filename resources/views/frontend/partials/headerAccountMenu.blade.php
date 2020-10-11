@if (Auth::check())
    <li class="menu-item has-children">
        <a href="#">My Account <i class="fas fa-angle-down"></i></a>
        <ul class="sub-menu">
            <li><a href="{{ route('my-account') }}">My Account</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
@endif