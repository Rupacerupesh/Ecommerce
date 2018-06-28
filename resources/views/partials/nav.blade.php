<div id=all>
<header id="top-header">        
                <div class="header-topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-8">

                                <div class="block-callus pull-left hidden-xs">

                                            @if(Session::has('customer'))
                                            <span>
                                                    {{Session::get('customer')}}
                                                </span>
                                            @endif

                                </div><!-- end call us -->

                            </div>
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-4">
                                    <div class="header_user_info pull-right">
                                        <div data-toggle="dropdown" class="dropdown-title">
                                        <a href="#" title="My account"><i class="fa fa-user"></i></a>
                                    </div>

                                    @include('partials.menus.main-right')

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-5 col-xs-5">
                                <div class="logo">
                                    <a href="{{route('landing-page')}}" title="Tiva byHands">
                                        <img class="img-responsive" src="{{ asset('img/logo.png')}}" alt="">
                                    </a>
                                </div><!--end logo-->
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-7 col-xs-7">
                                <div class="topheader-navholder">

                                    <div class="topheader-navholder-lf">
                                        <div id="block-cart" class="block-cart dropdown-over pull-right">
                                            <div class="dropdown-title">
                                                <a href="{{ route('cart.index') }}"><span class="title-cart"><i class="zmdi zmdi-shopping-basket"></i></span>

                                                    @if (Cart::instance('default')->count() > 0) 
                                                        <div id="block-cart" class="block-cart dropdown-over pull-right">
                                                    <span class="ajax_cart_quantity">{{ Cart::instance('default')->count() }}</span>
                                                        </div>
                                                    @endif
                                                </a>


                                            </div>   
                                        </div><!-- end blockcart_top -->

                                    <div id="search_block_top" class="block-search dropdown-over pull-right">   
                                            <div data-toggle="dropdown" class="dropdown-title">
                                                <a href="#" title="Search"><i class="zmdi zmdi-search"></i></a>
                                            </div>
                                            <div class="dropdown-content">   
                                    <form action="{{ route('search') }}" id="searchbox" method="GET">
                                        <div class="input-group">
                                        <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="search_query form-control" id="search_query_top" placeholder="Search"   required>
                                        <div class="input-group-btn">
                                            <button type="submit" name="submit_search" class="btn button btn-primary">Search</button>
                                        </div>
                                    </div>
                                    </form>   
                                            </div>
                                    </div>
                                    </div><!-- end topheader-navholder-lf -->

                                    <div class="topheader-navholder-rg">
                                        <span id="btn-menu"><i class="zmdi zmdi-menu"></i></span>
                                        <nav id="main-nav">
                                             {{ menu('main', 'partials.menus.main') }}
                                        </nav><!-- end main-nav -->
                                    </div><!-- end topheader-navholder-rg -->
                                </div><!-- end topheader-navholder -->
                            </div>
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div>
            
             <!-- end hero -->
        </header>
    