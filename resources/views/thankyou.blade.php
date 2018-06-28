@extends('layout')

@section('title', 'Thank You')


@section('body-class', 'index home-1')

@section('content')


<div class=container style="text-align: center">
       <h1>Thank you for <br> Your Order!</h1>
       <p>A confirmation email was sent</p>
       <div class="spacer"></div>
       <div>
           <a href="{{route('landing-page')}}" title="Home">Home Page</a>
       </div>
</div>




@endsection
