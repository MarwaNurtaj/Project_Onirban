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
                                    <div class="col-sm-6">
                                        <!-- <p>Didn't get an email?</p> -->
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Resend Verification Email') }}
                                            </button>
                                        </form>
                                    </div>

                                    <div class="col-sm-6">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-danger float-end">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                <i class="fas fa-user-shield"></i>
                                <h2 class="fs-1"> Verify Now</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection