<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>

        <div class=" main-content-area">



            @if(Cart::instance('cart')->count() > 0)
                <div class="wrap-iten-in-cart">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success</strong> {{Session::get('success_message')}}
                        </div>
                    @endif
                    @if(Cart::instance('cart')->count() > 0)
                        <h3 class="box-title">Products Name</h3>
                        <ul class="products-cart">
                            @foreach (Cart::instance('cart')->content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ ('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
                                    <div class="quantity">
                                        <div class="quantity-input">
                                            <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                            <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                            <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                                        </div>
                                        <p class="text-center"><a href="#" wire:click.prevent="switchToSaveForLater('{{$item->rowId}}')">Save For Later</a></p>
                                    </div>
                                    <div class="price-field sub-total"><p class="price">${{$item->subtotal}}</p></div>

                                    <div class="delete">
                                        <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="btn btn-delete" title="">
                                            <span>Delete from your cart</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No item in cart</p>
                    @endif
                </div>

                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{Cart::instance('cart')->subtotal()}}</b></p>
                        @if(Session::has('coupon'))
                            <p class="summary-info"><span class="title">Discount ({{Session::get('coupon')['code']}}) <a href="#" wire:click.prevent= "removeCoupon"><i class="fa fa-times text-danger"></i></a></span></span><b class="index"> -${{number_format($discount,2)}}</b></p>
                            <p class="summary-info"><span class="title">Subtotal with Discount</span></span><b class="index">${{number_format($subtotalAfterDiscount,2)}}</b></p>
                            <p class="summary-info"><span class="title">Tax ({{config('cart.tax')}}%)</span></span><b class="index">${{number_format($taxAfterDiscount,2)}}</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{number_format($totalAfterDiscount,2)}}</b></p>
                        @else
                            <p class="summary-info"><span class="title">Tax</span><b class="index">${{Cart::instance('cart')->tax()}}</b></p>
                            <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{Cart::instance('cart')->total()}}</b></p>
                        @endif
                    </div>
{{--                    <div class="checkout-info">--}}
{{--                        @if(!Session::has('coupon'))--}}
{{--                            <label class="checkbox-field">--}}
{{--                                <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponCode"><span>I have coupon code</span>--}}
{{--                            </label>--}}
{{--                            @if($haveCouponCode == 1)--}}
{{--                                <div class="summary-item">--}}
{{--                                    <form wire:submit.prevent="applyCouponCode">--}}
{{--                                        <h4 class="title-box">Coupon Code</h4>--}}
{{--                                        @if(Session::has('coupon_message'))--}}
{{--                                            <div class="alert alert-danger" role="danger">{{Session::get('coupon_message')}}</div>--}}
{{--                                        @endif--}}
{{--                                        <p class="row-in-form">--}}
{{--                                            <label for="coupon-code">Enter your coupon code:</label>--}}
{{--                                            <input type="text" name="coupon-code" wire:model="couponCode" />--}}
{{--                                        </p>--}}
{{--                                        <button type="submit" class="btn btn-small">Apply</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        @endif--}}
{{--                        <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Check out</a>--}}
{{--                        <a class="link-to-shop" href="/shop">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>--}}
{{--                    </div>--}}
                    <div class="update-clear">
                        <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                        <a class="btn btn-update" href="#">Update Shopping Cart</a>
                    </div>
                </div>
            @else
                <div class="text-center" style="padding:30px 0;">
                    <h1>Your cart is empty!</h1>
                    <p>Add items to it now</p>
                    <a href="/shop" class="btn btn-success">Shop Now</a>
                </div>
            @endif


            <div class="wrap-iten-in-cart">
                <h3 class="title-box" style="border-bottom: 1px solid; padding-bottom:15px;">{{Cart::instance('saveForLater')->count()}} item(s) Saved For Later</h3>
                @if(Session::has('s_success_message'))
                    <div class="alert alert-success">
                        <strong>Success</strong> {{Session::get('s_success_message')}}
                    </div>
                @endif
                @if(Cart::instance('saveForLater')->count() > 0)
                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">
                        @foreach (Cart::instance('saveForLater')->content() as $item)
                            <li class="pr-cart-item">
                                <div class="product-image">
                                    <figure><img src="{{ ('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                </div>
                                <div class="product-name">
                                    <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                                </div>
                                <div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
                                <div class="quantity">
                                    <p class="text-center"><a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')">Move To Cart</a></p>
                                </div>
                                <div class="delete">
                                    <a href="#" wire:click.prevent="deleteFromSaveForLater('{{$item->rowId}}')" class="btn btn-delete" title="">
                                        <span>Delete from save for later</span>
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No item saved for later</p>
                @endif
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
<!--main area-->