@extends('layout')

@section('title', 'Page not found')
@section('body-class', 'index home-1')


@section('extra-css')


@section('body-class', 'index home-1')



@endsection

@section('content')

<div id="breadcrumb" class="clearfix">
				<div class="container">
					<div class="breadcrumb clearfix">
						<ul class="ul-breadcrumb">

                            <li><a href="{{route('landing-page')}}" title="Home">Home</a></li>
							<li><span>Pages</span></li>
						</ul>
						<h2 class="bread-title">Page 404</h2>
					</div>
				</div>
			</div><!-- end breadcrumb -->

			<div id="columns" class="columns-container">
				<!-- container -->
				<div class="container">
					<div class="row">
						<div id="center_column" class="col-lg-12 col-md-12">
							<div class="page-not-found text-center">
								<img src="{{asset('img/default/not.png')}}" alt="" class="img-responsive">
								<h4 class="title_block">Oops! That page can’t be found</h4>
								<p class="page-not-des">It looks like nothing was found at this location. Maybe try to use a search?</p>
								<a href="{{route('landing-page')}}" class="btn button btn-primary">Back to homepage</a>
							</div><!-- end page-not-found -->
						</div><!-- end center_column -->
					</div>
				</div> <!-- end container -->
			</div><!--end columns -->




@endsection

@section('extra-js')

@endsection