<div class="navbar">
    <div class="navbar-inner">
        {{--<a id="logo" href="/">Single Malt</a>--}}
        <div class="logo">
            <a href="/"><img src="{!! asset('img/logo.png') !!}" alt="Smiley face" height="42" width="42"></a>
        </div>
        <ul class="nav">
            <li><a href="/cat">category</a></li>
            <li><a href="/mod">models</a></li>
            <li><a href="/reg">Users</a></li>
            <li><a href="/item">Items</a></li>
            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
        </ul>
    </div>
</div>
