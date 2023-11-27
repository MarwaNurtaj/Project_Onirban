@extends('layouts.admin')
@section('page')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>View Role Information
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/role/')}}" class="btn btn-sm btn-dark"><i
                                class="fas fa-th"></i>All Role Information</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        @if(Session::has('success'))
                        <div class="alert alert-success alert_success" role="alert">
                            <strong>Success!</strong> {{Session::get('success')}}
                        </div>
                        @endif
                        @if(Session::has('error'))
                        <div class="alert alert-danger alert_error" role="alert">
                            <strong>Opps!</strong> {{Session::get('error')}}
                        </div>
                        @endif
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped table-hover custom_view_table">
                            <tr>
                                <td>Role Id</td>
                                <td>:</td>
                                <td>{{ $data->role_id}}</td>
                            </tr>
                            <tr>
                                <td>Role Name</td>
                                <td>:</td>
                                <td>{{ $data->role_name}}</td>
                            </tr>
                            <tr>
                                <td>Creator</td>
                                <td>:</td>
                                <td>{{ $data->creatorInfo->name}}</td>
                            </tr>
                            <tr>
                                <td>Create Date</td>
                                <td>:</td>
                                <td>{{ $data->creatorInfo->created_at->format('d-m-Y | h:i:s A')}}</td>
                            </tr>
                            @if($data->incate_editor!='')
                            <tr>
                                <td>Editor</td>
                                <td>:</td>
                                <td>{{ $data->editorInfo->name}}</td>
                            </tr>
                            @endif
                            @if($data->updated_at!='')
                            <tr>
                                <td>Edited At</td>
                                <td>:</td>
                                <td>{{ $data->editorInfo->updated_at->format('d-m-Y | h:i:s A')}}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer">
                
            </div>
        </div>
    </div>
</div>
@endsection