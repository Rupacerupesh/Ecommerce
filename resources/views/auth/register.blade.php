@extends('layout')

@section('title', 'Sign Up for an Account')

@section('body-class', 'index home-1')

@section('content')


            <div id="breadcrumb" class="clearfix">
                <div class="container">
                    <div class="breadcrumb clearfix">
                        <ul class="ul-breadcrumb">
                            
                            <li><a href="{{route('landing-page')}}" title="Home">Home</a></li>
                            <li><span>Pages</span></li>
                        </ul>
                        <h2 class="bread-title">Register</h2>
                    </div>
                </div>
            </div><!-- end breadcrumb -->
<div class="container">
    <div class="auth-pages">
        <div>
            @if (session()->has('success_message'))
            <div class="alert alert-success">
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

            <div id="columns" class="columns-container">
                <!-- container -->
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

            <form method="POST" action="{{ route('register') }}" id="form-account-creation" class="form-horizontal box panel panel-default">
                {{ csrf_field() }}
                                <h3 class="panel-heading">Create an account</h3>
                                <div class="form_content panel-body clearfix">
                                    <div class="form-group required">
                                        <div class="col-lg-12">

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name*" required autofocus>

                <input id="role_id" type="hidden" class="form-control" name="role_id" value="4" >
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-lg-12">

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email*" required>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-lg-12">

                <input id="password" type="password" class="form-control" name="password" placeholder="Password" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <div class="col-lg-12">

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                    required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn button btn-default">Register</button>
                                            <p class="pull-right required"><span><sup>*</sup>Required field</span></p>
                                        </div>



                    <div class="already-have-container col-lg-12">
                        <p><strong>Already have an account?</strong></p>
                        <a href="{{ route('login') }}" class="btn button btn-default">Login</a>
                    </div>
                                    </div>
                                </div>
                            </form><!--end form -->
                        </div>
                    </div>
                </div> <!-- end container -->
            </div><!--end columns -->



    </div> <!-- end auth-pages -->
</div>
</div>
@endsection

