<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Onirban</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @foreach($all as $data)
    <h2 class="mt-5 text-center fs-4"> {{ $data->name}}'s Profile Details</h2>
    <h2 class="mb-5 text-center fs-6">Paltan, Dhaka</h2>
    <table class="table table-bordered table-striped">

        <tr>
            <td>First Name</td>
            <td>:</td>
            <td>{{ $data->name}}</td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>:</td>
            <td>{{ $data->last_name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $data->email}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td><span class="badge bg-primary">
                    @if ($data->user_status == 1)
                    Active
                    @endif
                </span>
            </td>
        </tr>
        <tr>
            <td>User Role</td>
            <td>:</td>

            <td class="text-capitalize">{{$data->roleInfo->role_name}}</td>
        </tr>
        <tr>
            <td>Create Date</td>
            <td>:</td>
            <td>{{ $data->created_at->format('d-m-Y | h:i:s A')}}</td>
        </tr>

        <!-- <tr>
            <td>Photo</td>
            <td>:</td>
            <td>
                @if (!empty($data->photo))
                <img src="{{ asset('contents/admin/uploads/' . Auth::user()->photo) }}" alt="Profile Picture">
                @else
                <img src="{{ asset('contents/admin/images/avatar.png') }}" class="img200" alt="Profile Picture">
                @endif
            </td>
        </tr> -->
        @endforeach

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>