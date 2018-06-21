{!! Form::open(['route' => 'item.saveedit']) !!}

<div class="form-group">
    {!! Form::label('item name', 'name') !!}
    {!! Form::text('name', $selectedItem->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('mod', 'category parent:') !!}
    <select class="form-control" name="parent">
        @foreach($cat as $caty)
            @if($caty->id == $selectedItem->model_id)
                <option selected value="{{$caty->id}}">{{$caty->category}} {{$caty->model}}</option>
            @else
                <option value="{{$caty->id}}">{{$caty->category}} {{$caty->model}}</option>
            @endif
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('description', 'desc') !!}
    {!! Form::textarea('desc', $selectedItem->description, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::Label('mod', 'user:') !!}
    <select class="form-control" name="user">
        @foreach($users as $user)
            @if($user->id == $selectedItem->location_id)
                <option selected value="{{$user->id}}">{{$user->username}}</option>
            @else
                <option value="{{$user->id}}">{{$user->username}}</option>
            @endif
        @endforeach
    </select>
</div>
{!! Form::hidden('invisibleID', $selectedItem->id) !!}
{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}