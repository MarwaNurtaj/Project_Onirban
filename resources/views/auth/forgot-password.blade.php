@extends('website.includesFolder.logNavbarFooter')
@section('logForms')
<div class="login-page bg-dark ">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h3 class="mb-3 text-light">Verify Now</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">

                                <div class="col-12">
                                    <p>{{ __('Thanks for signing up! Before getting started, could you verify your email 
                                                address by clicking on the link we just emailed to you? If you didn\'t receive the email,
                                                 we will gladly send you another.') }}</p>

                                    @if (session('status') == 'verification-link-sent')
                                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                        {{ __('A new verification link has been sent to the email address you provided 
                                                        during registration.') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="row g-4 mt-2">
                                    <div class="col-sm-12">

                                        <form method="POST" action="{{ route('password.email') }}" class="row g-4">
                                            @csrf
                                            <div class="col-12">
                                                <label>Email<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                                    <input id="email" class="block mt-1 w-full" type="email"
                                                        name="email" :value="old('email')" required autofocus>
                                                </div>
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                             <div class="flex items-center justify-center mt-4 col-12">
                                               <button type="submit "
                                                class="btn btn-primary px-4  ">{{ __('Email Password Reset Link') }}</button>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection