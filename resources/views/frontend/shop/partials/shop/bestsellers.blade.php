<?php
/**
 * Created by PhpStorm.
 * User: Phillip
 * Date: 9/2/2016
 * Time: 3:34 PM
 */
?>
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
         <h4 class="section-name row">Best Sellers</h4>

            <!-- Shop Best Sellers ============================================= -->

            <div id="shop" class="shop grid-container clearfix" data-layout="fitRows">
@foreach($best_sellers as $product)
    {{-- @foreach($product->prices as $price) --}}
    <div class="product clearfix" style="position: absolute; left: 290px; top: 997px;">
        <div class="product-image">
            @if($product->thumbnail)
                <a href="{!! $product->thumbnail !!}" data-lightbox="image">
                    <img src="{!! $product->thumbnail !!}" alt="{!! $product->slug !!} image">
                </a>
                <a href="#" data-lightbox="image">
                    <img src="{!! $product->thumbnail2 !!}" alt="{!! $product->slug !!} image 2">
                </a>
            @else
                <a href="#" data-lightbox="image"><img src="http://www.placehold.it/270x360/EFEFEF/AAAAAA?text=no+image" alt="{!! $product->slug !!}"></a>
                <a href="#" data-lightbox="image"><img src="http://www.placehold.it/270x360/EFEFEF/AAAAAA?text=still+no+image" alt="{!! $product->slug !!}_alt"></a>
            @endif

            @if($product->promo)
                <div class="sale-flash">{!! $promo->price !!}</div>
            @endif
            <div class="product-overlay">
                <a href="{{ $product->options->count() ? url('/product/'.$product->id.'-'.Str::slug($product->name).'/show') : url('/cart/add/'.$product->id.'/?qty=1') }}" class="add-to-cart">
                    <i class="icon-shopping-cart"></i>
                    <span> Add to Cart</span>
                </a>
                {{-- <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a> --}}
            </div>
        </div>
        <div class="product-desc">
            <div class="product-title">
                <h3>
                    <a href="{!! url('/product/'. Str::slug($product->name).'/show') !!}">
                        {{ str_limit($product->name,30,' ...') }}
                    </a>
                </h3>
            </div>
            {{ str_limit(htmlspecialchars_decode(strip_tags($product->details)),45,' ...') }}
            @if($product->promo)
                @foreach($product->promos as $promo)
                    <div class="product-price"><del>${!! $product->price !!}</del> <ins>${!! $promo->price !!}</ins></div>
                @endforeach
            @else
                <div class="product-price"> $ {!! $price->price !!}</div>
            @endif

            @if($product->rating)
                <div class="product-rating">
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star-half-full"></i>
                </div>
            @endif
        </div>
    </div>

    {{-- @endforeach --}}
    @endforeach
    </div>

    </div>

    </div>

    </section><!-- #content end -->





