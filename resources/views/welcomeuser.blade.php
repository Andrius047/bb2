<!DOCTYPE html>
<html>
@include('includes.head')
<header>
    @include('includes.headeruser')
</header>
<body>
<div class="container">
    <div class="content">
        <div class="title">HELLO USER</div>
    </div>
</div>
{!! Form::hidden('invisibleID', $userId) !!}
</body>
</html>