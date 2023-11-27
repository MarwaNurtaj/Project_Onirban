@extends('layouts.admin')
@section('page')


<div class="row">
    <div class="col-md-12 ">
        <form method="POST" action="{{url('dashboard/user/update')}}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-3">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>User Edit
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{url('dashboard/user')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All
                                User</a>
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
                    <div class="row mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-form-label col_form_label">Name<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                        <input type="hidden" id="" name="id" value="{{ $data->id}}">
                        <input type="hidden" id="" name="slug" value="{{ $data->user_slug}}">
                            <input type="text" class="form-control form_control" id="" name="name"
                                value="{{ $data->name}}">
                            @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-form-label col_form_label">Last Name :</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form_control" id="" name="last_name"
                                value="{{ $data->last_name}}">
                            @if($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-form-label col_form_label">Email<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form_control" id="email" name="email"
                                value="{{ $data->email}}">
                            @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">User Status<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control form_control " id="user_status" min="0" max="1"
                                placeholder="Enter 0 for deactivate, 1 for active" name="user_status"
                                value="{{ $data->user_status}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">User Role<span
                                class="req_star">*</span>:</label>
                        <div class="col-sm-4">
                            @php
                            $all_role=App\Models\Role::where('role_status',1)->orderBy('role_name','ASC')->get();
                            @endphp
                            <select class="form-control form_control text-capitalize" id="" name="role">
                                <option value="">Select Role</option>

                                @foreach($all_role as $role)
                                <option value="{{ $role->role_id}}" @if ($role->role_id==$data->user_role)
                                    selected @endif class="text-capitalize">
                                    {{ $role->role_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pic'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('user_role') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3 {{ $errors->has('pic') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control form_control" id="" name="pic">
                            @if($errors->has('pic'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pic') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-2">
                            @if (!empty($data->photo))
                            <img src="{{ asset('contents/admin/uploads/' . $data->photo) }}"
                                style="height:100; " alt="Profile Picture">
                            @else
                            <img src="{{ asset('contents/admin/images/avatar.png') }}" 
                            style="height:100; " alt="Profile Picture">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-sm btn-dark">Update Info</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection