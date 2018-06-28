@extends('layout')

@section('title', 'Shopping Cart')
@section('body-class', 'index home-1')


@section('content')

    <div id="breadcrumb" class="clearfix">
                <div class="container">
                    <div class="breadcrumb clearfix">
                        <ul class="ul-breadcrumb">
                            <li><a href="{{route('landing-page')}}" title="Home">Home</a></li>
                            <li><span>shopping cart</span></li>
                        </ul>
                        <h2 class="bread-title">Shopping cart</h2>
                    </div>
                </div>
            </div><!-- end breadcrumb -->

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

            @if (Cart::count() > 0)

            <h2>
            @if (Cart::count() == 1){{ Cart::count() }} item in Shopping Cart

            @else {{ Cart::count() }} items in Shopping Cart

            @endif
            </h2>




            <div id="columns" class="columns-container">
                <!-- container -->
                <div class="container">
                    <div id="order-detail-content" class="table_block table-responsive">
                        <table id="cart_summary" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="cart_delete last_item">Action</th>
                                    <th class="cart_product first_item">Product</th>
                                    <th class="cart_description item">Description</th>
                                    <th class="cart_unit item text-right">Unit price</th>
                                    <th class="cart_quantity item text-center">Qty</th>
                                    <th class="cart_total item text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                <tr>
                                    <td class="cart_delete text-center">

                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options"> <i class="fa fa-times"></i></button>
                            </form>


                            <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options">Save for Later</button>
                            </form>
                                    </td>
                                    <td class="cart_product">
                                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="item" class="cart-table-img" height="150" width="200"></a>
                                    </td>
                                    <td class="cart_description">
                                         <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a> 
                                          @if($item->color)
                                          ({{ $item->color }})
                                          @endif
                                      </div>
                            <div class="cart-table-description">{{ $item->model->details }}</div>
                                    </td>
                                    <td class="cart_unit text-right">
                                        <span class="amount">
                                            {{ $item->model->presentPrice() }}
                                        </span>
                                    </td>
                                    <td class="cart_quantity text-center">                                     
                                        <div>

                                        @if(Session::has('customer'))


                                        
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                @for ($i = 3; $i < 10 + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                                        
                                        @else
                                        

                            <select class="quantity" data-id="{{ $item->rowId }}">
                                @for ($i = 1; $i < 4 + 1 ; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>

                                        
                                        @endif
                        </div>
                                    </td>
                                    <td class="cart_total text-right">
                                        <span class="amount">{{ presentPrice($item->subtotal) }}</span>
                                    </td>
                                </tr>
                                @endforeach
                                 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td rowspan="3" colspan="3"></td>
                                    <td colspan="2" class="text-right">Total products</td>
                                    <td colspan="1" class="price text-right" id="total_product">{{ presentPrice(Cart::subtotal()) }} </td>
                                </tr>
                              
                                 <tr class="cart_total_price">
                                    <td colspan="2" class="total_price_container text-right">
                                        <span>Total</span>
                                        <div class="hookDisplayProductPriceBlock-price"></div>
                                    </td>
                                    <td colspan="1" class="price text-right" id="total_price_container">
                                        <span id="total_price">{{ presentPrice(Cart::total()) }} </span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- end order-detail-content -->
                    <div class="cart_navigation">
                        <a href="{{ route('checkout.index') }}" class="button btn btn-primary standard-checkout pull-right" title="Proceed to checkout">
                            <span>Proceed to checkout</span>
                            <i class="fa fa-angle-right ml-xs"></i>
                        </a>

                        <a href="{{ route('shop.index') }}" class="button btn btn-primary standard-checkout" title="Proceed to checkout">
                            <span>Continue shopping</span>
                            <i class="fa fa-angle-right ml-xs"></i>
                        </a>
                    </div><!-- end cart_navigation -->

                </div> <!-- end container -->
            </div><!--end columns -->


            @else

                <h3>No items in Cart!</h3>
                <div class="spacer"></div>
                <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                <div class="spacer"></div>

            @endif

            @if (Cart::instance('saveForLater')->count() > 0)

            <h2>{{ Cart::instance('saveForLater')->count() }} item(s) Saved For Later</h2>

            <div class="saved-for-later cart-table">
                @foreach (Cart::instance('saveForLater')->content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                            <div class="cart-table-description">{{ $item->model->details }}</div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="cart-options">Remove</button>
                            </form>

                            <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="cart-options">Move to Cart</button>
                            </form>
                        </div>

                        <div>{{ $item->model->presentPrice() }}</div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach

            </div> <!-- end saved-for-later -->

            @else

            <h3>You have no items Saved for Later.</h3>

            @endif

        </div>

    </div> <!-- end cart-section -->

 


@endsection

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>

    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
   
@endsection
