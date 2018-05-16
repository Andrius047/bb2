{!! Form::open(['route' => 'user.store']) !!}

<div class="form-group">
    {!! Form::label('user', 'username') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('user', 'name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('user', 'email') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('user', 'password') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::Label('user', 'user level:') !!}
    <select class="form-control" name="level">
        @for ($i = 0; $i < 3; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}