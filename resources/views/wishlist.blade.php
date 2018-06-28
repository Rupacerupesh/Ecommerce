
@extends('layout')

@section('title', 'Wishlist')

@section('body-class', 'index home-1')

@section('content')
			<div id="breadcrumb" class="clearfix">
				<div class="container">
					<div class="breadcrumb clearfix">
						<ul class="ul-breadcrumb">
                            <li><a href="{{route('landing-page')}}" title="Home">Home</a></li>
							<li><span>Wishlist</span></li>
						</ul>
						<h2 class="bread-title">Wishlist</h2>
					</div>
				</div>
			</div>

<div class="cart-section container">
        <div>
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

            @if (Auth::user()->wishlist->count() > 0)

            <h2>
            @if (Auth::user()->wishlist->count()  == 1){{Auth::user()->wishlist->count()  }} item in Wishlist

            @else {{ Auth::user()->wishlist->count()  }} items in Wishlist
            @endif
            </h2>
        
<div id="columns" class="columns-container">
                <!-- container -->
                <div class="container">
                    <div id="order-detail-content" class="table_block table-responsive">
                        <table id="cart_summary" class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Details</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishlists as $wishlist)
                    <tr>
                        <td class="cart_product"><a href="{{ route('shop.show', $wishlist->product->slug) }}">{{ $wishlist->product->name }}</a>
                              <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options"> <i class="fa fa-times"></i> remove</button>
                            </form>

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $wishlist->product->id }}">
                                <input type="hidden" name="name" value="{{ $wishlist->product->name }}">

                            @if(Session::has('customer'))
                                <input type="hidden" name="price" value="{{ $wishlist->product->wholesaleprice }}">
                                <input type="hidden" name="quantity" value="2">
                            @else

                                <input type="hidden" name="price" value="{{ $wishlist->product->price }}">
                                <input type="hidden" name="quantity" value="1">
                            @endif

                            
                <button type="submit" id="add_to_cart" type="submit" class="exclusive btn button btn-primary">Add to Cart</button>


                        </form>
                                                        

                        </td>

                                    <td class="cart_product">
                                        <a href="{{ route('shop.show', $wishlist->product->slug) }}"><img src="{{ productImage($wishlist->product->image) }}" alt="item" class="cart-table-img" height="150" width="200"></a>
                                    </td>
                        <td>{{ $wishlist->product->details }}</td>
                        <td>{!! str_limit($wishlist->product->description, 80) !!}</td>
                        <td>{{ $wishlist->product->presentPrice() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

          @else

                <h3>No items in Wishlist!</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <div class="spacer"></div>

            @endif
</div>
</div>
</div>
</div>
</div>


              

@endsection
