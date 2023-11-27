@extends('layouts.admin')
@section('page')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>User Information
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="searchByEmail" placeholder="Insert Email To Find User">
                    </div>
                    <div class="col-md-5 ">
                        <input type="submit" class="btn btn-sm btn-primary mt-1" 
                        name="" id="" value="Search">
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
                            <th>Photo</th>
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
                                    @if ($data->user_status == 1)
                                    Active
                                    @endif
                                </span></td>
                            <td class="text-capitalize">{{$data->roleInfo->role_name}}</td>
                            <td>
                                @if (!empty($data->photo))
                                <img src="{{ asset('contents/admin/uploads/' . $data->photo) }}"
                                    style="height:50px; width:auto;" alt="Profile Picture">
                                @else
                                <img src="{{ asset('contents/admin/images/avatar.png') }}"
                                    style="height:50px; width:auto;" alt="Profile Picture">
                                @endif

                            </td>
                            <td>
                                <div class="btn-group btn_group_manage" role="group">
                                    <button type="button" class="btn btn-sm btn-dark dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{url('dashboard/user/view/'.$data->user_slug)}}">View</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{url('dashboard/user/edit/'.$data->user_slug)}}">Edit</a></li>
                                        <li> @if ($data->user_status == 1)
                                            <a href="{{url('dashboard/user/de_status', $data->id)}}"
                                                class="dropdown-item"> Deactivate User</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="btn-group" role="group" aria-label="Button group">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection