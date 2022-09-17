
<div class="wrap-product-detail">


    <div class="detail-media">
        <div class="product-gallery" wire:ignore>
            <ul class="slides">
                <li data-thumb="{{ asset('assets/images/products' ) }}/{{$product->image}}">
                    <img src="{{ asset('assets/images/products') }}/{{$product->image}}" alt="{{$product->name}}" />
                </li>
                @php
                    $images = explode(",",$product->images);
                @endphp
                @foreach($images as $image)
                    @if($image)
                        <li data-thumb="{{ asset('assets/images/products' ) }}/{{$image}}">
                            <img src="{{ asset('assets/images/products') }}/{{$image}}" alt="{{$product->name}}" />
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="detail-info">

        <div class="product-rating">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <a href="#" class="count-review">(05 review)</a>
        </div>

        <h2 class="product-name">{{$product->name}}</h2>
        <div class="short-desc">
            {!! $product->short_description !!}
        </div>
        <div class="wrap-social">
            <a class="link-socail" href="#"><img src="{{ asset('assets/images/social-list.png') }}" alt=""></a>
        </div>
        @if($product->sale_price > 0  && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
            <div class="wrap-price">
                <span class="product-price">${{$product->sale_price}}</span>
                <del><span class="product-price regprice">${{$product->regular_price}}</span></del>
            </div>
        @else
            <div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>
        @endif
        <div class="stock-info in-stock">
            <p class="availability">Availability: <b>{{$product->stock_status}}</b></p>
        </div>


        <div class="quantity">
            <span>Quantity:</span>
            <div class="quantity-input">
                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" wire:model="qty" >
                <a class="btn btn-reduce" href="#" wire:click.prevent="decreseQuantity"></a>
                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity"></a>
            </div>
        </div>


        <div class="wrap-butons">
            @if($product->sale_price > 0  && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Add to Cart</a>
            @else
                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add to Cart</a>
            @endif

        </div>
    </div>
    <div class="advance-info">
        <div class="tab-control normal">
            <a href="#description" class="tab-control-item active">description</a>
            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
            <a href="#review" class="tab-control-item">Reviews</a>
        </div>
        <div class="tab-contents">
            <div class="tab-content-item active" id="description">
                {!! $product->description !!}
            </div>
            <div class="tab-content-item " id="add_infomation">
                <table class="shop_attributes">
                    <tbody>
                    <tr>
                        <th>Weight</th><td class="product_weight">1 kg</td>
                    </tr>
                    <tr>
                        <th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
                    </tr>
                    <tr>
                        <th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-content-item " id="review">

                <div class="wrap-review-form">
                    <style>
                        .width-0-percent{
                            width:0%;
                        }
                        .width-20-percent{
                            width:20%;
                        }
                        .width-40-percent{
                            width:40%;
                        }
                        .width-60-percent{
                            width:60%;
                        }
                        .width-80-percent{
                            width:80%;
                        }
                        .width-100-percent{
                            width:100%;
                        }
                    </style>

                </div>
            </div>
        </div>
    </div>
</div>

