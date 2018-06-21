<!DOCTYPE html>
<html>
@include('includes.head')
<header>
    @include('includes.header')
</header>
<body>
<div class="container">
    <div class="content">
        <div class="title">Service type</div>
    </div>
</div>
<div class="content_custom">
    <a href="/servicetype" class="fancy">create service type</a>
</div>

<div class="content_custom">
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                {{--<th>deleted</th>--}}
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($type as $stype)
                <tr>
                    <td>{{ $stype->id }}</td>
                    <td>{{ $stype->type }}</td>
                    {{--<td>{{ $stype->deleted }}</td>--}}
                    {{--@if ($stype->deleted  == 0)--}}
                        <td>
                            {!! Form::open(['route' => 'type.delete']) !!}
                            {!! Form::hidden('invisible', $stype->id) !!}

                            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                            {!! Form::close() !!}
                        </td>
                    {{--@elseif ($stype->deleted  == 1)--}}
                       {{-- <td>
                            {!! Form::open(['route' => 'type.undo']) !!}
                            {!! Form::hidden('invisible', $stype->id) !!}

                            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                            {!! Form::close() !!}
                        </td>--}}
                    {{--@endif--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
