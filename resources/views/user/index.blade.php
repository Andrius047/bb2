<!DOCTYPE html>
<html>
@include('includes.head')
<header>
    @include('includes.header')
</header>
<body>
<div class="container">
    <div class="content">
        <div class="title">register</div>
    </div>
</div>
<div class="content_custom">
    <a href="/register" class="fancy">create user</a>
</div>
<div class="content_custom">
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>username</th>
                <th>user level</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($usr as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->level }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>