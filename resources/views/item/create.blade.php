{!! Form::open(['route' => 'item.store']) !!}

<div class="form-group">
    {!! Form::label('item name', 'name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('mod', 'category parent:') !!}
    <select class="form-control" name="parent">
        @foreach($cat as $caty)
            <option value="{{$caty->id}}">{{$caty->category}} {{$caty->model}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('description', 'desc') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('mod', 'user:') !!}
    <select class="form-control" name="user">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->username}}</option>
        @endforeach
    </select>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}