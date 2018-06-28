
@extends('layout')

@section('title', 'About Us')

@section('extra-css')

@endsection

@section('body-class', 'index home-1')

@section('content')


			<div id="breadcrumb" class="clearfix">
				<div class="container">
					<div class="breadcrumb clearfix">
						<ul class="ul-breadcrumb">
							
                            <li><a href="{{route('landing-page')}}" title="Home">Home</a></li>
							<li><span>Contact us</span></li>
						</ul>
						<h2 class="bread-title">Contact us</h2>
					</div>
				</div>
			</div><!-- end breadcrumb -->

			<div id="columns" class="container" style="text-align: center;float: center;">
				<div class="container">
					<div class="contact-us">
						<div class="row">
							<div>
								<h2 class="title_block">Contact info</h2>
								<div class="contact-box" >
									<h3><p>Funky Yak Ltd </p></h3>

									<ul>
										<i class="zmdi zmdi-pin"></i>
										<li><span>25 Hamilton Crescent 
																				Harrow 
																				<br>
																				HA2 9JE, UK
																			</span></li>
																			<i class="zmdi zmdi-phone"></i>
										<li><span>07825990495 
											Nachong Gurung</span></li>
											<i class="zmdi zmdi-email"></i>
										<li><a href="#" title="">
										funkyyakltd@gmail.com</a></li>
									</ul>
								</div><!-- contact-box-->
							</div>
							
						</div>
					</div><!-- end contact-us -->
				</div><!-- end container -->
			</div><!--end columns-->

@endsection
