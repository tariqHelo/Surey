@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">

                  <div class="row justify-content-center align-items-center pt-3">
                        <h1><strong>Login</strong></h1>
                    </div>
                @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group row justify-content-center px-3">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-6 px-0">
                                    <div class="custom-control custom-checkbox mb-3"> <input id="customCheck1" type="checkbox" class="custom-control-input checkbox-muted"> <label for="customCheck1" class="custom-control-label text-muted">Remember Me</label> </div>
                                </div> <!-- Forgot Password Link -->
                                <div class="col-6 px-0 text-right"> <span><a href="#" class="text-danger"><b>Forgot Password?</b></a></span> </div>
                            </div>
                        </div>
                    </div> <!-- Log in Button -->
                    <div class="form-group row justify-content-center">
                        <div class="col-3 px-3"> <input type="submit" value="Log in" class="btn btn-block btn-info"> </div>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- <div class="bg-info">
    <!-- Container containing all contents -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <!-- White Container -->
                <div class="container bg-white rounded mt-2 mb-2 px-0">
                    <!-- Main Heading -->
                    <div class="row justify-content-center align-items-center pt-3">
                        <h1><strong>Login</strong></h1>
                    </div>
                    <div class="pt-3 pb-3">
                        <form class="form-horizontal">
                            <!-- User Name Input -->
                            <div class="form-group row justify-content-center px-3">
                                <div class="col-9 px-0"> <input type="text" placeholder="&#xf007; &nbsp; User name" class="form-control border-info placeicon"> </div>
                            </div> <!-- Password Input -->
                            <div class="form-group row justify-content-center px-3">
                                <div class="col-9 px-0"> <input type="password" placeholder="&#xf084; &nbsp; &#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="form-control border-info placeicon"> </div>
                            </div> <!-- CheckBox Remember Me-->
                            <div class="form-group row justify-content-center px-3">
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-6 px-0">
                                            <div class="custom-control custom-checkbox mb-3"> <input id="customCheck1" type="checkbox" class="custom-control-input checkbox-muted"> <label for="customCheck1" class="custom-control-label text-muted">Remember Me</label> </div>
                                        </div> <!-- Forgot Password Link -->
                                        <div class="col-6 px-0 text-right"> <span><a href="#" class="text-danger"><b>Forgot Password?</b></a></span> </div>
                                    </div>
                                </div>
                            </div> <!-- Log in Button -->
                            <div class="form-group row justify-content-center">
                                <div class="col-3 px-3"> <input type="submit" value="Log in" class="btn btn-block btn-info"> </div>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection