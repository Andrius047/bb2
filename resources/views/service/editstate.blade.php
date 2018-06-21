{!! Form::open(['route' => 'service.savestate']) !!}

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
{!! Form::hidden('invisibleID', $selectedService->id) !!}

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}
