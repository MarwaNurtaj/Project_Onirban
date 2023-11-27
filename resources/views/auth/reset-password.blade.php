@extends('website.includesFolder.logNavbarFooter')
@section('logForms')
<div class="login-page bg-dark ">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h3 class="mb-3 text-light">Reset Your Password Now</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                                <form method="POST" action="{{ route('password.store') }}" class="row g-4">
                                    @csrf
                                    <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    
                                    <div class="col-12">
                                        <label for="email">Username<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            <input type="email" name="email" :value="old('email')" required autofocus
                                                autocomplete="username" class="form-control"
                                                placeholder="Enter Email Address">
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="col-12">
                                        <label for="password">Password<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                            <input id="password" type="password" name="password" class="form-control"
                                                placeholder="Enter Password" required autocomplete="new-password">
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="col-12">
                                        <label for="password_confirmation" >Confirm Password<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                            <input id="password_confirmation" type="password"
                                                name="password_confirmation" required autocomplete="new-password"
                                                 class="form-control">
                                        </div>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="col-sm-6">
                                        <span> Don't have any accounts? </span><br>
                                        <a href="{{ route('register') }}" class="text-primary"> Register Now</a>
                                    </div>

                                    <div class="col-12">

                                        <button type="submit" class="btn btn-primary px-4 float-end mt-4">login</button>
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
