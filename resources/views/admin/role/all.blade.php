@extends('layouts.admin')
@section('page')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>All Role Information
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/role/add')}}" class="btn btn-sm btn-dark"><i
                                class="fas fa-plus-circle"></i>Add New Roles</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th>Role ID</th>
                            <th>Role Title</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $data)
                        <tr>
                            <td>{{$data->role_id}}</td>
                            <td class="text-capitalize">{{$data->role_name}}</td>
                            <td>
                                <div class="btn-group btn_group_manage" role="group">
                                    <button type="button" class="btn btn-sm btn-dark dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{url('dashboard/role/view/'.$data->role_id)}}">View</a></li>
                                        <li><a class="dropdown-item"
                                                href="{{url('dashboard/role/edit/'.$data->role_slug)}}">Edit</a></li>
                                        <!-- <li><a class="dropdown-item"
                                                href="{{url('dashboard/role/softdelete/'.$data->role_slug)}}">Delete</a>
                                        </li> -->
                                    </ul>
                                </div>
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