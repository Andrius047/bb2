<!DOCTYPE html>
<html>
@include('includes.head')
<header>
    @include('includes.header')
</header>
<body>
<div class="container">
    <div class="content">
        <div class="title">Item</div>
    </div>
</div>
<div class="content_custom">
    <a href="/items" class="fancy">create item</a>
</div>
<div class="content_custom">
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th>category</th>
                <th>model</th>
                <th>user</th>
                <th>edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($item_list as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->model }}</td>
                    <td>{{ $item->username }}</td>
                    <td><a href="edit">edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
