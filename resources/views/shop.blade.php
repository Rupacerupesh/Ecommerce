@extends('layout')

@section('title', 'Products')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
@endsection

@section('body-class', 'index home-1')

@section('content')
        
            <div id="breadcrumb" class="clearfix">
                <div class="container">
                    <div class="breadcrumb clearfix">
                        <ul class="ul-breadcrumb">
                            
                            <li><a href="{{route('landing-page')}}" title="Home">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                        <h2 class="bread-title">Products List</h2>
                    </div>
                </div>
            </div><!-- end breadcrumb -->


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

<div id="columns" class="columns-container">
                <!-- container -->
                <div class="container">
                    <div class="row">
                        <div id="left_column" class="sidebar col-lg-3 col-md-3">
                            <div id="categories_block_left" class="block">
                                <h3 class="title_block">By Category 
                                    <i class="glyphicon glyphicon-chevron-down title_block" style="float: right; margin-top: 7px;"></i></h3>
                                

                                <div class="block_content">
            <ul class="list-block">
                @foreach ($categories as $category)
                    <li class="{{ setActiveCategory($category->slug) }}">
                        <a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div> <!-- end sidebar -->
    </div><!--categories-->

                            <div id="block_featured_product" class="block">
                                <h4 class="title_block">Best sellers</h4>
                                <div class="block_content">
                                    <ul class="product_list_block">
                                        <li>
                                            <div class="product-container media">
                                                <div class="product-image-container pull-left">
                                                    <a class="product_img_link" href="page-detail.html" title="Bouquet rose">
                                                        <img src="img/product/6.jpg" alt="Bouquet rose" class="img-responsive" width="86" height="115">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="product_comments clearfix">
                                                        <div class="product-rating">
                                                            <div class="star_content">
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end product_comments -->
                                                    <h5 class="name">
                                                        <a class="product-name" href="page-detail.html" title="Bouquet rose">
                                                            Bouquet rose
                                                        </a>
                                                    </h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$26.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-container media">
                                                <div class="product-image-container pull-left">
                                                    <a class="product_img_link" href="page-detail.html" title="Queen rose - pink">
                                                        <img src="img/product/5.jpg" alt="Queen rose - pink" class="img-responsive" width="86" height="115">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="product_comments clearfix">
                                                        <div class="product-rating">
                                                            <div class="star_content">
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end product_comments -->
                                                    <h5 class="name">
                                                        <a class="product-name" href="page-detail.html" title="Queen rose - pink">
                                                            Queen rose - pink
                                                        </a>
                                                    </h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$68.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-container media">
                                                <div class="product-image-container pull-left">
                                                    <a class="product_img_link" href="page-detail.html" title="Bouquet lavender">
                                                        <img src="img/product/7.jpg" alt="Bouquet lavender" class="img-responsive" width="86" height="115">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="product_comments clearfix">
                                                        <div class="product-rating">
                                                            <div class="star_content">
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end product_comments -->
                                                    <h5 class="name">
                                                        <a class="product-name" href="page-detail.html" title="Bouquet lavender">
                                                            Bouquet lavender
                                                        </a>
                                                    </h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$36.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-container media">
                                                <div class="product-image-container pull-left">
                                                    <a class="product_img_link" href="page-detail.html" title="Bouquet Hydrangea - white">
                                                        <img src="img/product/8.jpg" alt="Bouquet Hydrangea - white" class="img-responsive" width="86" height="115">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="product_comments clearfix">
                                                        <div class="product-rating">
                                                            <div class="star_content">
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                                <div class="star star_on"></div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end product_comments -->
                                                    <h5 class="name">
                                                        <a class="product-name" href="page-detail.html" title="Bouquet Hydrangea - white">
                                                            Bouquet Hydrangea - white
                                                        </a>
                                                    </h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$16.28</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- end block_featured_product -->
    </div>
    <div>
            <div class="products-header">
                <h1 class="stylish-heading">{{ $categoryName }}</h1>
                <div>
                    <strong>Price: </strong>
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                    <a href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>
                </div>
            </div>

            <div class="tab-content">
                                <div class="tab-pane fade active in" id="tiva-grid">
                                    <div class="row">

                @forelse ($products as $product)
                                        <div class="type_block_product col-sp-12 col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                            <div class="product-container">
                                                <div class="left-block">
                                                    <div class="product-image-container">
                                                    <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product" class="img-responsive image-effect" width="480" height="640"></a>
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
                                                <div class="right-block">
                                                    <div class="product-box">
                                                        <h5 class="name">

                                                            <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                                                        </h5>
                                                        <div class="content_price">
                                                            <span class="price product-price">
                                                                {{ $product->presentPrice() }}
                                                            </span>
                                                        </div>
                                                    </div><!--end right block -->
                                                </div>
                                            </div><!-- end product-container-->
                                        </div><!-- end type_block_product -->
                                        @empty
                                    <div style="text-align: left">No items found</div>
                @endforelse

                                <div class="spacer"></div>

                                    </div>
                                </div>

            <div style="text-align: center">
            {{ $products->appends(request()->input())->links() }}
                        </div>

                </div>
        </div>
   
</div>
</div>
</div>
            

@endsection

