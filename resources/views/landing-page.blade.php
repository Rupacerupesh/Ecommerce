<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <!--<![endif]-->
<html lang="en">
    
<head>
        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Funky Yak</title>

        <meta name="keywords" content="Responsive HTML Template">
        <meta name="description" content="Funky Yak">
        <meta name="author" content="Funky Yak">

        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        
        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link href="{{ asset('/img/favicon.ico')}}" rel="SHORTCUT ICON" />
        <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/font-material/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}">

        
        <!-- Template Custom CSS -->
      
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/theme-global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-product.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-product-list.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-blog.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme-responsive.css') }}">

        <!-- Template Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/nivo-slider/css/nivo-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/nivo-slider/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/nivo-slider/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/slider-range/css/jslider.css') }}">

    </head>
    <body class="index home-1">

@section('content')
<div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>

    @include('partials.nav')


            <div class="tiva-slideshow-wrapper">
                <div id="tiva-slideshow">
                @foreach($slides as $slide)
                    <a href="#" title="Slideshow image"><img class="img-responsive" src="{{ productImage($slide->image) }}" title="#caption1" alt="Slideshow image"></a>
                @endforeach
                </div>
                @foreach($slides as $slide)
                <div id="caption1" class="nivo-html-caption">
                    <div class="tiva-caption">
                        <div class="left-right hidden-xs normal very_large_60" >{{$slide->title}}</div>
                        <div class="left-right  hidden-md hidden-sm hidden-xs slow medium_16">{{$slide->description}}</div>
                    </div>
                </div>
                @endforeach
            </div>



            <div id="columns" class="columns-container">
                <div class="section section-banner">
                    <div class="container">

            @foreach($homebanners as $homebanner)
            @if($homebanner->id == 1)
                        <div class="tv-table block">
                            <div class="tv-tablecell">
                                <div class="block-html block">
                                    <h4>Gifts for</h4>
                                    <h3>{{$homebanner->title}}</h3>
                                    <p class="block-htmldes">{{$homebanner->description}}</p>
                                    <a class="button btn btn-primary" href="/shop?category=Finger-puppets" title="Shop now">Shop now</a>
                                </div><!--end block-html --> 
                            </div>
                            <div class="tv-tablecell box-image">
                                <div class="banner-item effectbanner">
                                    <a class="image-wrap" href="/shop"><img class="img-responsive" src="{{ productImage($homebanner->image) }}" alt=""></a>
                                </div><!--end banner-item-->
                            </div>
                        </div>
                @else
                        <div class="tv-table block">
                            <div class="tv-tablecell box-image">
                                <div class="banner-item effectbanner">
                                    <a class="image-wrap" href="/shop"><img class="img-responsive" src="{{ productImage($homebanner->image) }}" alt=""></a>
                                </div><!--end banner-item-->
                            </div>
                            <div class="tv-tablecell">
                                <div class="block-html block">
                                    <h4>Gifts for</h4>
                                    <h3>{{$homebanner->title}}</h3>
                                    <p class="block-htmldes">{{$homebanner->description}}</p>
                                    <a class="button btn btn-primary" href="/shop?category=Finger-puppets" title="Shop now">Shop now</a>
                                </div><!--end block-html --> 
                            </div>
                        </div>
                @endif
                    @endforeach
                    </div><!-- end container -->
                </div><!-- end section-banner -->
            </div>


                <div class="blockproductscategory block">
                            <div class="container"><!-- tabs-top -->
                        <div class="tabs-top block">
                            <div class="block-title">
                                <h4 class="title_block">Shop By Collection</h4>
                            </div><!--end title -->

                            <!-- Tab panes -->
                               <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active">
                                    <div class="block_content">
                                        <div class="row">

                                         @foreach ($products as $product)
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-sp-12">
                                                <div class="product-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container">
                                                            <a class="product_img_link" href="{{ route('shop.show', $product->slug) }}" >
                                                                <img src="{{ productImage($product->image) }}" alt="product" class="img-responsive" width="262.5" height="350">
                                                            </a>
                                                        </div>
                                                    <div class="box-buttons">

                                                            <form action="{{ route('cart.store') }}" method="POST">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                                <input type="hidden" name="name" value="{{ $product->name }}">

                                                                @if(Session::has('customer'))
                                                                    <input type="hidden" name="quantity" value="3">
                                                                    <input type="hidden" name="price" value="{{ $product->wholesaleprice }}">
                                                                @else
                                                                    <input type="hidden" name="quantity" value="1">
                                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                                @endif


                                                                <button type="submit" id="add_to_cart" type="submit" class="ajax_add_to_cart_button button btn"><i class="zmdi zmdi-shopping-cart"></i></button>
                                                            </form>
                                                        <a class="button btn quick-view" href="{{ route('shop.show', $product->slug) }}" title="Quick view">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </a>
                                                        
                                             <form action="{{ route('wishlist.store') }}" method="post">
                                                {{ csrf_field() }}
                                                  <input type="hidden" name="user_id" value="@if(Auth::guest()) @else{{Auth::user()->id}} @endif">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                <button type="submit" id="add_to_cart" type="submit" class="exclusive btn button btn-primary">
                                                                                            <i class="zmdi zmdi-favorite-outline"></i></button>
                                            </form>
                                                    </div>
                                                    </div><!--end left block -->
                                                    <div class="right-block">
                                                        <div class="product-box">
                                                            <h5 class="name">
                                                                <a class="product-name" href="{{ route('shop.show', $product->slug) }}">
                                                                    {{ $product->name }}

                                                                </a>
                                                            </h5>
                                                            <div class="content_price">
                                                                <span class="price product-price">{{$product->presentPrice()}}</span>
                                                            </div>
                                                        </div><!-- end product-box -->
                                                    </div><!--end right block -->
                                                </div><!-- end product-container-->
                                            </div>
                                         @endforeach
                                        </div><!-- end row -->
                                    </div><!-- end block_content -->
                                </div><!-- end section-tabsproduct -->
                            </div>
                        </div>
                    </div>
                </div>



    @include('partials.footer')



      <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/nivo-slider/js/jquery.nivo.slider.js') }}"></script>
        <script src="{{ asset('vendor/slider-range/js/tmpl.js') }}"></script>
        <script src="{{ asset('vendor/slider-range/js/jquery.dependClass-0.1.js') }}"></script>
        <script src="{{ asset('vendor/slider-range/js/draggable-0.1.js') }}"></script>
        <script src="{{ asset('vendor/slider-range/js/jquery.slider.js') }}"></script>

        
        <script src="{{ asset('vendor/jquery.elevatezoom/jquery.elevatezoom.js') }}"></script>
        
        <!-- Template Base, Components and Settings -->
        <script src="{{ asset('js/theme.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>





                    



