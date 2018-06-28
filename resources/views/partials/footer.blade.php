<footer id="footer">
				<div class="footer-center">
					<div class="container">
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-sp-12">
								<div class="social_block">
									<ul class="links">
										 {{ menu('footer', 'partials.menus.footer') }}
										
									</ul>
								</div><!-- end social_block -->
							</div>
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 col-sp-12">
								<div class="footer-block block">
									<h4 class="title_block">Pages</h4>
									<ul class="toggle-footer list-group bullet">
										<li><a href="{{route('shop.about')}}" title="About Us">About Us</a></li>
										<li><a href="{{route('shop.contact')}}" title="Contact">Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 col-sp-12">
								<div class="footer-block block">
									<h4 class="title_block">Account</h4>
									<ul class="toggle-footer list-group bullet">
									    <li><a href="{{ route('home') }}">Go Back</a></li>
									    @guest
									    <li><a href="{{ route('register') }}">Sign Up</a></li>
									    <li><a href="{{ route('login') }}">Login</a></li>
									    @else
									    <li>
									        <a href="{{ route('logout') }}"
									            onclick="event.preventDefault();
									                     document.getElementById('logout-form').submit();">
									            Logout
									        </a>
									    </li>
									    <li>
									        <a href="{{ route('wishlist.index') }}">
									            Wishlist
									        </a>
									    </li>

									    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									        {{ csrf_field() }}
									    </form>
									    @endguest
									</ul>
								</div>
							</div>
						</div><!-- end row -->
					</div>
				</div><!-- end footer-center -->

				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12 col-sp-12">
								Copyright © 2018 - All rights reserved.
							</div>
						</div>
					</div>
				</div><!-- end footer-copyright -->
			</footer><!-- end footer -->
						
			<div class="go-up">
				<a href="#"><i class="fa fa-chevron-up"></i></a>    
			</div><!-- end go-up -->
			<div><!--end all-->





