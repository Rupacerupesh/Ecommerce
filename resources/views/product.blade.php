@extends('layout')

@section('title', $product->name)

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
                            <li><a href="{{route('shop.index')}}" title="Categories">Shop</a></li>
                            <li><span>{{ $product->name }}</span></li>
                        </ul>
                        <h2 class="bread-title">Products Detail</h2>
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
                <div class="pb-left-column col-xs-12 col-sm-12 col-md-5">
                    <div id="image-block" class="clearfix">
                        <div id="view_full_size">
                            <img src="{{ productImage($product->image) }}" class="img-responsive" width="470" height="627">
                        </div>
                    </div><!-- end #image-block -->

                    <div id="views_block" class="clearfix">
                        <div id="thumbs_list">
                            <ul id="thumbs_list_frame" class="list-inline">
                                <li class="first">
                                    <img src="{{ productImage($product->image) }}" alt="product" class="img-responsive" width="102" height="136">
                                </li>
                                @if ($product->images)
                                    @foreach (json_decode($product->images, true) as $image)
                                    <li>
                                        <img src="{{ productImage($image) }}" alt="product" class="img-responsive" width="102" height="136">
                                    </li>
                                    @endforeach
                                @endif
            
                            </ul>
                        </div>
                    </div><!-- end views_block -->
                </div><!-- end pb-left-column -->
                        <div class="pb-center-column col-xs-12 col-sm-12 col-md-7">
                            <div class="pb-centercolumn">
                                <h1>{{ $product->name }}</h1>
                                <div class="price clearfix">
                                    <p class="our_price_display">
                                        {{ $product->presentPrice() }}
                                    </p>
                                </div><!-- end price -->
                                <div class="product-boxinfo">
                                    <p id="product_reference">
                                        <label>Reference: </label>
                                        <span class="editable">{{ $product->id}}</span>
                                    </p>
                                    <p id="availability_statut">
                                        <label>Available: </label>
                                        @if ($product->available == 1)
                                        <span id="availability_value" class="label label-success">In stock</span>
                                        @else
                                        <span id="availability_value" class="label label-default">Out of stock</span>
                                        @endif
                                    </p>
                                </div><!-- end product-boxinfo -->
                                <div id="short_description_block">
                                    <p>{{ $product->details }}</p>

                                </div><!-- end short_description_block -->
                               

                                <div class="box-cart-bottom clearfix">


            <form action="{{ route('cart.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="name" value="{{ $product->name }}">

                                    <div id="quantity_wanted_p">
                                        <label>Quantity</label>
                                    <div class="group-quantity">
                                        @if(Session::has('customer'))
                                            <input type="number" name="quantity" value="3" min="3">
                                            <input type="hidden" name="price" value="{{ $product->wholesaleprice }}">
                                        @else
                                            <input type="number" name="quantity" value="1" min="1">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                    
                                    @endif
                                    </div>
                                </div>
                                <br>


                             @if($colorsForProduct->count()>0)   
                                    <div id="attributes">
                                        <div class="attribute_fieldset clearfix">
                                            <label class="attribute_label">Color</label>
                                            <div class="attribute_list">
                                                <select class="form-control" name="color" type="input" required>

                                                    <option value="">Please choose one:</option>
                                @foreach ($allColors as $color)
                                    @if( $colorsForProduct->contains($color))
                                        <option value="{{$color->name}}">{{$color->name}}</option>
                                    @endif
                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                <button type="submit" id="add_to_cart" type="submit" class="exclusive btn button btn-primary">Add to Cart</button>
            </form>

             <form action="{{ route('wishlist.store') }}" method="post">
                {{ csrf_field() }}
                  <input type="hidden" name="user_id" value="@if(Auth::guest()) @else {{Auth::user()->id}} @endif">
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <button type="submit" id="add_to_cart" type="submit" class="exclusive btn button btn-primary">Add to Wishlist</button>
            </form>

                                </div><!-- end box-cart-bottom -->
                            </div><!-- end pb-centercolumn -->
                        </div><!-- end pb-center-column -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="tabs-top accordion-info">
                                <ul id="myTabs" class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                                   
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <div class="panel-body">

                {!! $product->description !!}



                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="additional-info">
                                        <div class="panel-body">
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="reviews">
                                        <div class="panel-body">
                                                            </div>
                                            </div>
                                </div><!-- end tab-content -->
                            </div><!-- end  accordion-info-->
                        </div>
                    </div><!-- end row -->

    @include('partials.might-like')
    
                </div>
            </div>


@endsection

@section('extra-js')
      

      

        
      

@endsection
