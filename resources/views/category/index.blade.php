<!DOCTYPE html>
<html>
    @include('includes.head')
<header>
    @include('includes.header')
</header>
<body>
<div class="container">
    <div class="content">
        <div class="title">category</div>
    </div>
</div>
<div class="content_custom">
    <a href="/category" class="fancy">create category</a>
</div>

<div class="content_custom">
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>deleted</th>
                <th>delete/undo</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cat as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category }}</td>
                    <td>{{ $category->deleted }}</td>
                    @if ($category->deleted  == 0)
                    <td>
                        {!! Form::open(['route' => 'category.delete']) !!}
                        {!! Form::hidden('invisible', $category->id) !!}

                        {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}
                    </td>
                    @elseif ($category->deleted  == 1)
                        <td>
                            {!! Form::open(['route' => 'category.undo']) !!}
                            {!! Form::hidden('invisible', $category->id) !!}

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
