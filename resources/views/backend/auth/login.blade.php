@extends('backend.auth.layouts.master')
@section('main-content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="post" action="{{route('login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="email" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                            
                                            @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control form-control-user"
                                            id="password" placeholder="Password">
                                            @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit"  class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                    <a href="{{url('login/facebook')}}" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Facebook
                                    </a>
                                    <a href="{{url('login/google')}}" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('password.request')}}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('register')}}">Create an Account!</a>
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