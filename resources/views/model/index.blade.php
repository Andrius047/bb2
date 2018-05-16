<!DOCTYPE html>
<html>
@include('includes.head')
<header>
    @include('includes.header')
</header>
<body>
<div class="container">
    <div class="content">
        <div class="title">model</div>
    </div>
</div>
<div class="content_custom">
    <a href="/model" class="fancy">create model</a>
</div>
<div class="content_custom">
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>parent category</th>
                <th>delete/undo</th>
                <th>delete/undo</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($mod as $model)
                <tr>
                    <td>{{ $model->id }}</td>
                    <td>{{ $model->model }}</td>
                    <td>{{ $model->category }}</td>
                    <td>{{ $model->deleted }}</td>
                    @if ($model->deleted  == 0)
                        <td>
                            {!! Form::open(['route' => 'model.delete']) !!}
                            {!! Form::hidden('invisible', $model->id) !!}

                            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                            {!! Form::close() !!}
                        </td>
                    @elseif ($model->deleted  == 1)
                        <td>
                            {!! Form::open(['route' => 'model.undo']) !!}
                            {!! Form::hidden('invisible', $model->id) !!}

                            {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>