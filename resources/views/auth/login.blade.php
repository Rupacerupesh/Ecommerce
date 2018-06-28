@extends('layout')

@section('title', 'Login')




@section('body-class', 'index home-1')

@section('content')


            <div id="breadcrumb" class="clearfix">
                <div class="container">
                    <div class="breadcrumb clearfix">
                        <ul class="ul-breadcrumb">
                            
                            <li><a href="{{route('landing-page')}}" title="Home">Home</a></li>
                            <li><span>Login</span></li>
                        </ul>
                        <h2 class="bread-title">Login Page</h2>
                    </div>
                </div>
            </div><!-- end breadcrumb -->


            <div id="columns" class="columns-container">
                <!-- container -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="#" id="create-account-form" class="form-horizontal box panel panel-default">
                                <h3 class="panel-heading">Create an account</h3>
                                <div class="form_content panel-body clearfix">
                                    <p>Registration is quick and easy. It allows you to be able to order from our shop. To start shopping click register.</p>
                                    <a href="{{ route('register') }}" class="btn button btn-default" title="Create an account" rel="nofollow"><i class="fa fa-user left"></i> Create an account</a>
                                    <br>
                                    <br>


                                </div>


                            </form><!--end form -->
                        </div>
                        <div class="col-lg-6">
                            @if (session()->has('success_message'))
            <div class="alert alert-danger">
                {{ session()->get('success_message') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
                                

                            <form id="form-login" class="form-horizontal box panel panel-default action="{{ route('login.custom') }}" method="POST">
                {{ csrf_field() }}
                <h3 class="panel-heading">Already registered?</h3>
                                <div class="form_content panel-body clearfix">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label for="email">Email address</label>
                                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"  required autofocus>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label for="passwd">Password</label>

                <input type="password" class="form-control" id="passwd" name="password" value="{{ old('password') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <a href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <button type="submit" class="btn button btn-default"><i class="fa fa-lock left"></i> Login</button>
                                        </div>
                                        <div class="col-xs-6 col-lg-push-2">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                                        </div>

                                    </div>

                                </div>


                            </form><!--end form -->
                        </div>
                    </div>
                </div> <!-- end container -->
            </div><!--end columns -->

@endsection
