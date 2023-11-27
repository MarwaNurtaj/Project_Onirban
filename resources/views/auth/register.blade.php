@extends('website.includesFolder.logNavbarFooter')
@section('logForms')
    <div class="register-page p-3 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="mt-3 mb-3 text-light">Register Now</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form method="POST" action="{{ route('register') }}" class="row g-4" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control @error('name')
                                            is-invalid   @enderror" id="name" name="name" value="{{old('name')}}">
                                            @if($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="mb-3 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control @error('last_name')
                                            is-invalid @enderror" id="last_name" name="last_name" value="{{old('last_name')}}">
                                            @if($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control @error('email')
                                            is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                                            @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Passwod</label>
                                            <input type="password" class="form-control @error('password')
                                            is-invalid @enderror" id="" name="password" value="{{old('password')}}">
                                            @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="cpassword" class="form-label">Confirm Passwod</label>
                                            <input type="password" class="form-control @error('cpassword')
                                            is-invalid @enderror" id="" name="cpassword" value="{{old('cpassword')}}">
                                            @if($errors->has('cpassword'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cpassword') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Register</button>
                                        <hr>

                                        <div class="col-sm-6">
                                            <span> Already have any accounts? </span><br>
                                            <a href="{{ route('login') }}" class="text-primary"> Sign In Now</a>
                                        </div>
                                      
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                    <i class="fas fa-user-shield"></i>
                                    <h2 class="fs-1 mt-5">Join Now!!!</h2>
                                    <h3 class="m-3">Enter your information, edit, and download your data - all in one place.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
