@extends('website.includesFolder.logNavbarFooter')
@section('logForms')
<div class="login-page bg-dark ">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h3 class="mb-3 text-light">Login Now</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}

                                <form method="POST" action="{{ route('password.confirm') }}" class="row g-4">
                                    @csrf
                                    <div class="col-12">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                            <input id="password" type="password" name="password" required
                                                autocomplete="current-password" class="form-control"
                                                placeholder="Enter Password">
                                        </div>
                                    </div>

                                    <div class="col-6 ">
                                        <button type="submit"
                                            class="btn btn-primary px-4 float-end ">{{ __('Confirm') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                <i class="fas fa-user-shield"></i>
                                <h2 class="fs-1">Welcome Back!!!</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection