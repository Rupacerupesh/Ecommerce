<div class="blockproductscategory block">
                        <h4 class="title_block">Related Products</h4>
                        <div class="block_content">
                            <div class="owl-row">
                                <div class="block_content">

            @foreach ($mightAlsoLike as $product)
                                    <div class="item">

                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-sp-12">
                                        <div class="product-container">

                                                <div class="left-block">
                                                    <div class="product-image-container">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product" class="img-responsive image-effect" width="480" height="640"></a>
                                                        <span class="label-new label">New</span>
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
                                    </div>
                                </div>
                            @endforeach        
                                </div>
                            </div>
                        </div>
                    </div>
