<div class="col-lg-3 col-12">
    <div class="myaccount-tab-menu nav" role="tablist">
        <a href="{{ route('my-account') }}" class="{{ $active == 'my-account' ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            Dashboard
        </a>
        <a href="{{ route('settings') }}" class="{{ $active == 'settings' ? 'active' : '' }}">
            <i class="fa fa-user"></i> Account Settings
        </a>
        <a href="{{route('watch-later')}}" class="{{ $active == 'watch-later' ? 'active' : '' }}">
            <i class="fa fa-clock"></i>
            Watch Later
        </a>
        <a href="{{route('favorites')}}" class="{{ $active == 'favorites' ? 'active' : '' }}">
            <i class="fa fa-thumbs-up"></i> Favorite List
        </a>
        <a href="#payment-method" class="{{ $active == 'payment-method' ? 'active' : '' }}">
            <i class="fa fa-credit-card"></i>
            Payment Method
        </a>
    </div>
</div>