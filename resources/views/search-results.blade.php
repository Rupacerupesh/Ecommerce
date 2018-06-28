
@extends('layout')

@section('title', 'Search Results')

@section('body-class', 'index home-1')


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

<div id="breadcrumb" class="clearfix">
                <div class="container">
                    <div class="breadcrumb clearfix">
                        <ul class="ul-breadcrumb">
                            
                            <li><a href="{{route('landing-page')}}" title="Home">Home</a></li>
                            <li><a href="{{route('shop.index')}}" title="Categories">Shop</a></li>
                        </ul>
                        <h2 class="bread-title">Search results for '{{ request()->input('query') }}'</h2>

                        
                    </div>
                </div>

            </div><!-- end breadcrumb -->



        <div class="tab-contentsearch">

        @if ($products->total() > 0)

                                <div class="tab-pane fade active in" id="tiva-list">
                                    <div class="row">

                @foreach ($products as $product)
                <p>
                                        <div class="type_block_product col-sp-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="product-container">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="left-block">
                                                            <div class="product-image-container">
                                                                <a class="product_img_link" href="{{ route('shop.show', $product->slug) }}" title="{{ $product->name }}">
                                                                    <img src="{{ productImage($product->image) }}" alt="{{ $product->name }}" class="img-responsive image-no-effect" width="480" height="640">
                                                                </a>
                                                            </div>

                                                    <div class="box-buttons">

                                                        <form action="{{ route('cart.store') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            <input type="hidden" name="name" value="{{ $product->name }}">

                                                        @if(Session::has('customer'))
                                                            <input type="hidden" name="price" value="{{ $product->wholesaleprice }}">
                                                            <input type="hidden" name="quantity" value="3">
                                                        @else

                                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                                            <input type="hidden" name="quantity" value="1">
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
                                                    </div>
                                                    <div class="col-lg-8 col-md-8">
                                                        <div class="right-block">
                                                            <div class="product-box">
                                                                <h5 class="name">

                                                                    <a class="product-name" href="{{ route('shop.show', $product->slug) }}" title="Queen rose - yellow">
                                                                       {{ $product->name }}
                                                                    </a>
                                                                </h5>
                                                                <div class="product-des">

                                                                    {!! $product->details !!}
                                                                </div>

                                                                <div class="product-des">

                                                                    {!! $product->description !!}
                                                                </div>

                                                                <div class="content_price">
                                                                    <span class="price product-price">
                                                                        {{ $product->presentPrice() }}
                                                                    </span>
                                                                </div>
                                                            </div><!--end product-box -->
                                                        </div><!-- end right block -->
                                                    </div>
                                                </div>
                                            </div><!-- end product-container-->
                                        </div><!-- end type_block_product -->
                                    </p>
                                        @endforeach
                                    </div><!-- end row -->
                                </div><!-- end tiva-list -->

                    <div style="text-align: center">

                                         {{ $products->appends(request()->input())->links() }}
                                         </div>

                    @else
                    <div style="text-align: left"><h1>No items found</h1></div>

        @endif
        </div>




@endsection
@section('extra-js')
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

        <!-- Template Custom -->
        <script src="{{ asset('js/custom.js') }}"></script>

@endsection
