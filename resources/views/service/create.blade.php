<script>
$( function() {
    $( ".datepicker" ).datepicker();
    } );
</script>
{!! Form::open(['route' => 'service.store']) !!}
<div class="form-group">
    {!! Form::label('item name', 'name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'desc') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('date n shit', 'date') !!}
    {!! Form::text('date', date('m/d/Y'), ['class' => 'form-control, datepicker'])!!}
</div>
{{--<div class="form-group">Date: <input type="text" id="datepicker"></div>--}}

<div class="form-group">
    {!! Form::Label('mod', 'item:') !!}
    <select class="form-control" name="item">
        @foreach($items as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::Label('mod', 'service:') !!}
    <select class="form-control" name="servicetype">
        @foreach($service_type as $type)
            <option value="{{$type->id}}">{{$type->type}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('repeat', 'repeat') !!}
    {!! Form::text('repeat', null, ['class' => 'form-control']) !!}
</div>
{{--<div class="form-group">
    {!! Form::Label('mod', 'category parent:') !!}
    <select class="form-control" name="parent">
        @foreach($cat as $caty)
            <option value="{{$caty->id}}">{{$caty->category}} {{$caty->model}}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
    {!! Form::Label('mod', 'user:') !!}
    <select class="form-control" name="user">
        @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->username}}</option>
        @endforeach
    </select>
</div>--}}

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}
