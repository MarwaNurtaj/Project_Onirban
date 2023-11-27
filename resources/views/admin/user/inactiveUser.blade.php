@extends('layouts.admin')
@section('page')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>All Inactive User Information
                    </div>
                    <div class="col-md-4 card_button_part">
                        <!-- <a href="{{url('dashboard/user/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add User</a> -->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th>User Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->last_name}}</td>
                            <td>{{$data->email}}</td>
                            <td><span class="badge bg-primary">
                                    @if ($data->user_status == 0)
                                    Inactive
                                    @endif
                                </span></td>

                            <td class="text-capitalize">{{$data->roleInfo->role_name}}</td>

                            <td>
                                @if ($data->user_status == 0)
                                <a href="{{url('dashboard/user/status', $data->id)}}" class="btn btn-danger btn-sm"
                                    type="button">Reactive</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
@endsection