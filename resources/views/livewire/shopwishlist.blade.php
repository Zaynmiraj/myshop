@foreach(Cart::instance('wishlist')->content() as $product)
<div class="col-lg-4 col-md-4 col-6 col-sm-6">
    <div class="product-cart-wrap mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                <a href="product-details.html">
                    <img class="default-img" src="{{asset('assets/imgs/shop/product-')}}{{$product->id}}-1.jpg" alt="">
                    <img class="hover-img" src="{{asset('assets/imgs/shop/product-')}}{{$product->id}}-2.jpg" alt="">
                </a>
            </div>
            <div class="product-action-1">
                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="quickViewModal">
                    <i class="fi-rs-search"></i></a>
                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
            </div>
            <div class="product-badges product-badges-position product-badges-mrg">
                <span class="hot">Hot</span>
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category">
                <a href="shop.html">Music</a>
            </div>
            <h2><a href="">{{$product->name}}</a></h2>
            <div class="rating-result" title="90%">
                <span>
                    <span>90%</span>
                </span>
            </div>
            <div class="product-price">
                <span> {{$product->sale_price}} </span>
                <span class="old-price"> {{$product->regular_price}} </span>
            </div>
            <div class="product-action-1 show">
                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="wishlist({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i class="fi-rs-heart"></i></a>
            </div>
        </div>
    </div>
</div>
@endforeach