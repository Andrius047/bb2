<!DOCTYPE html>
<html>
@include('includes.head')
<header>
    @include('includes.headeruser')
</header>
<body>
<div class="container">
    <div class="content">
        <div class="title">Service</div>
    </div>
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
            </tr>
            </thead>
            <tbody>
            @foreach ($service_list as $service)
                @if($service->userID == $userID)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->date }}</td>
                    <td>{{ $service->item_name }}</td>
                    <td><a href="/userserviceeditstate/{{ $service->id }}" class="fancy">{{ $service->type }}</a></td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
