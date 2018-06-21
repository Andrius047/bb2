<!DOCTYPE html>
<html>
@include('includes.head')
<header>
    @include('includes.header')
</header>
<body>
<div class="container">
    <div class="content">
        <div class="title">Service</div>
    </div>
</div>
<div class="content_custom">
    <a href="/services" class="fancy">create service type</a>
</div>

<div class="content_custom">
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th>date</th>
                <th>item</th>
                <th>service type</th>
                <th>repeat</th>
                <th>edit</th>
                {{--<th>deleted</th>--}}
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($service_list as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->date }}</td>
                    <td>{{ $service->item_name }}</td>
                    <td><a href="/serviceeditstate/{{ $service->id }}" class="fancy">{{ $service->type }}</a></td>
                    <td>{{ $service->repeat }}</td>
                    {{--<td>{{ $stype->deleted }}</td>--}}
                    {{--@if ($stype->deleted  == 0)--}}
                    <td><a href="/serviceedit/{{ $service->id }}" class="fancyz">edit</a>
                    <td>
                        {!! Form::open(['route' => 'service.delete']) !!}
                        {!! Form::hidden('invisible', $service->id) !!}

                        {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
