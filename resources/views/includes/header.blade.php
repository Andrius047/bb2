<div class="navbar">
    <div class="navbar-inner">
        {{--<a id="logo" href="/">Single Malt</a>--}}
        <div class="logo">
            <img src="{!! asset('img/logo.jpg') !!}" alt="Smiley face" height="42" width="42">
        </div>
        <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="/cat">category</a></li>
            <li><a href="/mod">models</a></li>
            <li><a href="/reg">Users</a></li>
            <li><a href="/item">Items</a></li>
            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
        </ul>
    </div>
</div>
