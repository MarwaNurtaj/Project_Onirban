@auth
@extends('website.home.welcome')
@section('contents')

<hr>
<hr>
<hr>
<section class="m-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>View User Information
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{url('/userdashboard')}}" class="btn btn-sm btn-dark">
                                <i class="fas fa-th"></i>Go Back to Dashboard
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
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped table-hover custom_view_table">
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
                                    <td>{{ $data->user_status}}</td>
                                </tr>
                                <tr>
                                    <td>User Role</td>
                                    <td>:</td>
                                    <td>{{ $data->user_role}}</td>
                                </tr>
                                <tr>
                                    <td>Create Date</td>
                                    <td>:</td>
                                    <td>{{ $data->created_at->format('d-m-Y | h:i:s A')}}</td>
                                </tr>
                                @if($data->email_verified_at!=NULL)
                                <tr>
                                    <td>Email Verified At</td>
                                    <td>:</td>
                                    <td>{{ $data->email_verified_at}}</td>
                                </tr>
                                @else
                                <tr>
                                    <td>Email Verified At</td>
                                    <td>:</td>
                                    <td class="danger">Not Verified</td>
                                </tr>
                                <tr>
                                    <td>Resend Verify Email</td>
                                    <td>:</td>
                                    <td>
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Resend Verification Email') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @if($data->updated_at!='')
                                <tr>
                                    <td>Edited At</td>
                                    <td>:</td>
                                    <td>{{ $data->updated_at->format('d-m-Y | h:i:s A')}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td>Photo</td>
                                    <td>:</td>
                                    <td>
                                        @if (!empty($data->photo))
                                        <img src="{{ asset('contents/admin/uploads/' . Auth::user()->photo) }}"
                                            alt="Profile Picture">
                                        @else
                                        <img src="{{ asset('contents/admin/images/avatar.png') }}" class="img200"
                                            alt="Profile Picture">
                                        @endif

                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="btn-group" role="group" aria-label="Button group">
                    <a href="{{url('website/home/profile/profile_pdf/'.$data->user_slug)}}" class="btn btn-sm btn-dark">PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@endauth