<?php
/**
 * Created by PhpStorm.
 * User: Phillip
 * Date: 8/30/2016
 * Time: 3:04 PM
 */?>
{{--@inject('product', 'App\Models\Product')--}}
@inject('price', 'App\Models\Price')
{{--@inject('promos', 'App\Models\Promo')--}}
{{--@foreach ($products as $product)--}}
{{--@foreach ($product->promos as $promos)--}}
    {{--@foreach ($product->prices as $price)--}}
{{--@foreach($products as $product)--}}
{{--@foreach($product->prices as $price)--}}
<div class="col_two_fifth product-desc">
{{--@if($product->prices)--}}
        <h1>product has pricing </h1>
    {{--@endif--}}
{{--@foreach($product->prices  as $price)--}}
        {{--<h1>cazy anoying</h1>--}}
    {{--{!! $product->prices->sku !!}--}}
        {{--{!! $price->price !!}--}}
        {{--{!! $price->model !!}--}}
    <!-- Product Single - Price ============================================= -->

{{--@endforeach--}}
    {{--@if($product->promos)--}}
        {{--<div class="product-price" itemprop="price">--}}
            {{--<del>$39.99</del>--}}
            {{--<ins>$24.99</ins>--}}
        {{--</div>--}}
    {{--@endif--}}


    <!-- Product Single - Price End -->
        <div class="product-price" itemprop="price">
            <ins> {!! $price->price !!} </ins>
        </div>

    {!! $price->model !!}
    {!! $price->sku !!}
    {!! $price->upc !!}
    {!! $product->slug !!}

    {{--@each('items.single', $items, 'item')--}}
    @if($product->rating)
    <!-- Product Single - Rating
							============================================= -->
        <div class="product-rating">
            <i class="icon-star3"></i>
            <i class="icon-star3"></i>
            <i class="icon-star3"></i>
            <i class="icon-star-half-full"></i>
            <i class="icon-star-empty"></i>
        </div>
        <!-- Product Single - Rating End -->
    @endif
    <div class="clear"></div>
    <div class="line"></div>
    <!-- Product Single - Quantity & Cart Button
        ============================================= -->
    <form action="/cart/add" class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
        <div class="quantity clearfix">
            <input type="button" value="-" class="minus">
            <input type="text" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="4"/>
            <input type="button" value="+" class="plus">
        </div>
        <input type="submit" class="add-to-cart button nomargin add-cart {{ $product->quantity ? '' : 'out-of-stock' }}" value="{{ $product->quantity ? 'ADD TO CART' : 'OUT OF STOCK' }}">
        {{--<button type="submit" class="add-to-cart button nomargin">Add to cart</button>--}}
    </form>
    </form><!-- Product Single - Quantity & Cart Button End -->
    <div class="clear"></div>
    <div class="line"></div>


    <!-- Product Single - Short Description ============================================= -->
{!! $product->feature_heading !!}

    @if($product->options)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul>
                    @foreach($product->options as $option)
                        <li>
                            {{ $option->name }} :
                            <select name="options[]" class="form-control">
                                @foreach($option->values as $value)
                                    <option value="{{ $value->id }}">{{ $value->value }}</option>
                                @endforeach
                            </select>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


    {!! $product->details !!}

    @if($product->details)

    @endif
<br/>
{{--<br/>--}}
 {{--{!! $product->features[0]->feature_name !!}--}}
{{--<ul class="iconlist ">--}}
{{--@if($product->features)--}}
{{--@foreach($product->features as $feature)--}}
{{--<li>--}}
{{--@if($feature->useicon == true)--}}
{{--<i class="{!! $feature->icon !!}"></i>--}}
{{--@endif--}}
{{--{!! $feature->feature_name !!}--}}
{{--</li>--}}
{{--@endforeach--}}
{{--@endif--}}
{{--</ul>--}}
{{--@endif--}}

<!-- Product Single - Meta ============================================= -->
{{--@include('frontend.shop.partials.single.meta)--}}
<!-- Product Single - Meta End -->
</div>
    {{--@endforeach--}}
{{--@endforeach--}}