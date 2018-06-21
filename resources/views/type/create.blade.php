{!! Form::open(['route' => 'type.store']) !!}

<div class="form-group">
    {!! Form::label('new type', 'type') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

{{--<div class="form-group">--}}
{{--{!! Form::Label('cat', 'category parent:') !!}--}}
{{--<select class="form-control" name="parent">--}}
{{--@foreach($cat as $caty)--}}
{{--<option value="{{$caty->id}}">{{$caty->category}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</div>--}}

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}