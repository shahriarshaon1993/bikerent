<div class="list-group my-3">
    <a href="{{ route('user.profile') }}" class="list-group-item list-group-item-action {{ Route::is('user.profile') ? 'active' : ''}}">
        Profile
    </a>
    <a href="{{ route('user.profile.password') }}" class="list-group-item list-group-item-action {{ Route::is('user.profile.password') ? 'active' : ''}}">
        Change password
    </a>
    <a href="{{ route('user.profile.edit') }}" class="list-group-item list-group-item-action {{ Route::is('user.profile.edit') ? 'active' : ''}}">
        Edit profile
    </a>
    <a href="{{ route('user.profile.my.order') }}" class="list-group-item list-group-item-action {{ Route::is('user.profile.my.order') ? 'active' : ''}}">
        My orders
    </a>
    @permission('app.access.vendor')
        <a href="{{ route('user.profile.bike') }}" class="list-group-item list-group-item-action {{ Route::is('user.profile.bike') ? 'active' : ''}}">
            Bikes
        </a>

        <a href="{{ route('user.profile.orders') }}" class="list-group-item list-group-item-action {{ Route::is('user.profile.orders') ? 'active' : ''}}">
            New Orders
        </a>

        <a href="{{ route('user.profile.orders.delivery') }}" class="list-group-item list-group-item-action {{ Route::is('user.profile.orders.delivery') ? 'active' : ''}}">
            Delivered Orders
        </a>
    @endpermission
</div>
