<div class="navbar">
    <div class="navbar-inner">
        {{--<a id="logo" href="/">Single Malt</a>--}}
        <div class="logo">
            <img src="{!! asset('img/logo.png') !!}" alt="Smiley face" height="42" width="42">
        </div>
        <ul class="nav">
            <li><a href="/userservice">Services</a></li>
            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
        </ul>
    </div>
</div>

