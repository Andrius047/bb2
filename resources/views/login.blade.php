<html>
<header class="row">
    @include('includes.head')
</header>

<body>
{{--<a href="{{ URL::to('logout') }}">Logout</a>--}}
<div class="content_custom">
{!! Form::open(array('url' => 'login')) !!}
<div class="title">Login</div>

<p>
    {!! $errors->first('email') !!}
    {!! $errors->first('password') !!}
</p>

<p>
    {!! Form::label('email', 'Email Address') !!}
    {!! Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) !!}
</p>

<p>
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password') !!}
</p>

<p class="log_in_button">{!! Form::submit('Submit!') !!}</p>
{!! Form::close() !!}

</div>

