
@include('includes.head')
<script>
$( function() {
    $( ".datepicker" ).datepicker();
    } );
</script>
{!! Form::open(['route' => 'service.saveedit']) !!}
<div class="form-group">
    {!! Form::label('item name', 'name') !!}
    {!! Form::text('name', $selectedService->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'desc') !!}
    {!! Form::textarea('desc', $selectedService->description, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('date n shit', 'date') !!}
    {!! Form::text('date', $selectedService->date, ['class' => 'form-control, datepicker'])!!}
</div>
{{--<div class="form-group">Date: <input type="text" id="datepicker"></div>--}}

<div class="form-group">
    {!! Form::Label('mod', 'item:') !!}
    <select class="form-control" name="item">
        @foreach($items as $item)
            @if($item->id == $selectedService->connection_id)
                <option selected value="{{$item->id}}">{{$item->name}}</option>
            @else
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::Label('mod', 'service:') !!}
    <select class="form-control" name="servicetype">
        @foreach($service_type as $type)
            @if($type->id == $selectedService->service_type)
                <option selected value="{{$type->id}}">{{$type->type}}</option>
            @else
                <option value="{{$type->id}}">{{$type->type}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('repeat', 'repeat') !!}
    {!! Form::text('repeat', $selectedService->repeat, ['class' => 'form-control']) !!}
</div>
{!! Form::hidden('invisibleID', $selectedService->id) !!}
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
