<?php
/**
 * Created by PhpStorm.
 * User: Phillip
 * Date: 8/30/2016
 * Time: 3:06 PM
 */ ?>


<div class="col_two_fifth">
    <!-- Product Single - Gallery  ============================================= -->
    <div class="product-image">
        <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
            <div class="flexslider">
                <div class="slider-wrap" data-lightbox="gallery">
                    {{--@if(isset($product->thumbnail))--}}
                        @if($product->thumbnail)
                            <div class="slide" data-thumb="{!! $product->thumbnail !!}" style="width: 413px; float: left; display: block;">
                                <a href="{{ $product->thumbnail }}" title="{!! $product->name !!}" data-lightbox="gallery-item">
                                    <img class="img-responsive" src="{!! $product->thumbnail !!}" alt="{!! $product->slug !!} image" draggable="false">
                                </a>
                            </div>
                            @else
                            <div class="slide" data-thumb="http://placehold.it/413/2851CC/ffffff" aria-hidden="true" style="width: 413px; float: left; display: block;">
                                <a href="http://placehold.it/720x960/2851CC/ffffff?text=image+one" title="{!! $product->name !!}" data-lightbox="">
                                    <img src="http://placehold.it/720x960/2851CC/ffffff?text=image+one" alt="{!! $product->name !!} image" draggable="false">
                                </a>
                            </div>
                        @endif
                    {{--@endif--}}
                    {{--@if(isset($product->thumbnail2))--}}
                        @if($product->thumbnail2)
                            <div class="slide" data-thumb="{!! $product->thumbnail2 !!}" style="width: 413px; float: left; display: block;">
                                <a href="{!! $product->thumbnail2 !!}" title="{!! $product->name !!} - Front View" data-lightbox="gallery-item">
                                    <img class="img-responsive" src="{!! $product->thumbnail2 !!}" alt="{!! $product->slug !!} image" draggable="false">
                                </a>
                            </div>
                            @else
                                <div class="slide" data-thumb="http://placehold.it/413/AF2323/ffffff" aria-hidden="true" style="width: 413px; float: left; display: block;">
                                    <a href="http://placehold.it/720x960/AF2323/ffffff?text=image+two" title="{!! $product->name !!}" data-lightbox="">
                                        <img src="http://placehold.it/720x960/AF2323/ffffff?text=image+two" alt="{!! $product->name !!} image" draggable="false">
                                    </a>
                                </div>
                        @endif
                    {{--@endif--}}

                    {{--@if(isset($product->photos))--}}
                            @foreach($product->photos as $photo)
                                <div class="slide" data-thumb="{!! $product->thumbnail2 !!}" style="width: 413px; float: left; display: block;">
                                    <a href="{{ $photo->photo_src }}" title="" data-lightbox="gallery-item">
                                        <img class="img-responsive" src="{{ $photo->photo_src }}" alt="  image" draggable="false">
                                    </a>
                                </div>
                            @endforeach
                    {{--@endif--}}
                    {{--
                    <div class="slide" data-thumb="images/shop/thumbs/dress/3.jpg"><a href="images/shop/dress/3.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="images/shop/dress/3.jpg" alt="Pink Printed Dress"></a></div>
                    <div class="slide" data-thumb="images/shop/thumbs/dress/3-1.jpg"><a href="images/shop/dress/3-1.jpg" title="Pink Printed Dress - Side View" data-lightbox="gallery-item"><img src="images/shop/dress/3-1.jpg" alt="Pink Printed Dress"></a></div>
                    <div class="slide" data-thumb="images/shop/thumbs/dress/3-2.jpg"><a href="images/shop/dress/3-2.jpg" title="Pink Printed Dress - Back View" data-lightbox="gallery-item"><img src="images/shop/dress/3-2.jpg" alt="Pink Printed Dress"></a></div>
                    --}}
                </div>
            </div>
        </div>
        @if($product->ispromos)
            <div class="sale-flash">Sale!</div>
        @endif
    </div>
    <!-- Product Single - Gallery End -->
</div>
