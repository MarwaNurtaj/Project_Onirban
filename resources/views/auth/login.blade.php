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
                                <form method="POST" action="{{ route('login') }}" class="row g-4">
                                    @csrf
                                    <div class="col-12">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                            <input type="email" name="email" :value="old('email')" required autofocus
                                                autocomplete="username" class="form-control"
                                                placeholder="Enter Email Address">
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    </div>

                                    <div class="col-12">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                            <input id="password" type="password" name="password" required
                                                autocomplete="current-password" class="form-control"
                                                placeholder="Enter Password">
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                    </div>



                                    <div class="col-sm-6">

                                        @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                        @endif

                                        <!-- <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                                <label class="form-check-label" for="inlineFormCheck">Remember me</label>
                                            </div> -->
                                    </div>
                                    <div class="col-6 ">
                                        <button type="submit" class="btn btn-primary px-4 float-end ">login</button>
                                    </div>

                                    <div class="col-sm-12">
                                        <span> Don't have any accounts? </span>
                                        <a href="{{ route('register') }}" class="text-primary"> Register Now</a>
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