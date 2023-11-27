<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Onirban</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h2 class="mt-5 text-center fs-4">All User Details List</h2>
    <h2 class="mb-5 text-center fs-6">Paltan, Dhaka</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="table-dark">
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>

            @foreach($all as $data)
            <tr>
                <td>{{$data->name}} {{$data->last_name}}</td>
                <td>{{$data->email}}</td>
                <td><span class="badge bg-primary">
                        @if ($data->user_status == 1)
                        Active
                        @endif
                    </span>
                </td>
                <td class="text-capitalize">{{$data->roleInfo->role_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>