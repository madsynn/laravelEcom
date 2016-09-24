@extends('frontend/layout/shop')


@section('header_styles')
<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{!! asset('/frontend/include/rs-plugin/css/settings.css') !!}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{!! asset('/frontend/include/rs-plugin/css/layers.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('/frontend/include/rs-plugin/css/navigation.css') !!}">

    <style>
.revo-slider-emphasis-text{font-size:58px;font-weight:700;letter-spacing:1px;font-family:'Raleway',sans-serif;padding:15px 20px;border-top:2px solid #FFF;border-bottom:2px solid #FFF;}
.revo-slider-desc-text{font-size:20px;font-family:'Lato',sans-serif;width:650px;text-align:center;line-height:1.5;}
.revo-slider-caps-text{font-size:16px;font-weight:400;letter-spacing:3px;font-family:'Raleway',sans-serif;}
.tp-video-play-button{display:none!important;}
.tp-caption{white-space:nowrap;}
    </style>

@endsection

@section('scripts')@endsection

@section('ppscripts')@endsection

@section('submenu')@endsection

@section('slider')
	@include('frontend.shop.partials.layout.slider')
@endsection


@section('intro')@endsection



@section('page-title-off')
<!-- Page Title ============================================= -->
		<section id="page-title">
			<div class="container clearfix">
				<h1>Shop</h1>
				<span>Start Buying your Favourite Theme</span>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Shop</li>
				</ol>
			</div>
		</section><!-- #page-title end -->
@endsection


@section('sidebar')@endsection

@section('content')
<div class="section">
    <div class="section-name row">New Products</div>
    <div class="row">
        <div class="items">
            @foreach($new_products as $product)
            <div class="item col-md-3 col-sm-3 col-xs-6 clickable" data-href="{{ url('/product/'.$product->id.'-'.Str::slug($product->name).'/show') }}">
                <div class="photo"><img src="{{ $product->thumbnail }}">{!! $product->created_at >= Carbon\Carbon::now()->subweek() ? '<span class="new-product">NEW</span>' : '' !!}</div>
                <div class="name">{{ str_limit($product->name,30,' ...') }}</div>
                <div class="description">
                    {{ str_limit(htmlspecialchars_decode(strip_tags($product->details)),45,' ...') }}
                </div>
                <div class="price-buy">
                    <div class="price">${{ $product->price }}</div><a class="buy fa fa-cart-plus fa-2x" href="{{ $product->options->count() ? url('/product/'.$product->id.'-'.Str::slug($product->name).'/show') : url('/cart/add/'.$product->id.'/?qty=1') }}"></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="section">
    <div class="section-name row">BEST SELLERS</div>
    <div class="row">
        <div class="items">
            @foreach($best_sellers as $product)
            <div class="item col-md-3 col-sm-3 col-xs-6 clickable" data-href="{{ url('/product/'.$product->id.'-'.Str::slug($product->name).'/show') }}">
                <div class="photo"><img src="{{ $product->thumbnail }}">{!! $product->created_at >= Carbon\Carbon::now()->subweek() ? '<span class="new-product">NEW</span>' : '' !!}</div>
                <div class="name">{{ $product->name }}</div>
                <div class="description">
                    {{ str_limit(htmlspecialchars_decode(strip_tags($product->details)),45,' ...') }}
                </div>
                <div class="price-buy">
                    <div class="price">${{ $product->price }}</div><a class="buy fa fa-cart-plus fa-2x" href="{{ $product->options->count() ? url('/product/'.$product->id.'-'.Str::slug($product->name).'/show') : url('/cart/add/'.$product->id.'/?qty=1') }}"></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('content-off')

        <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent nobottommargin">


{{-- @include('frontend.shop.partials.layout.promo') --}}
{{-- @include('frontend.shop.partials.layout.4colrow') --}}
                        <div id="shop" class="shop product-3 product_box clearfix">
                        @foreach($new_products as $product)
                        <div class="item col-md-3 col-sm-3 col-xs-6 clickable" data-href="{{ url('/product/'.$product->id.'-'.Str::slug($product->name).'/show') }}">
                            <div class="photo"><img src="{{ $product->thumbnail }}">{!! $product->created_at >= Carbon\Carbon::now()->subweek() ? '<span class="new-product">NEW</span>' : '' !!}</div>
                            <div class="name">{{ str_limit($product->name,30,' ...') }}</div>
                            <div class="description">
                                {{ str_limit(htmlspecialchars_decode(strip_tags($product->details)),45,' ...') }}
                            </div>
                            <div class="price-buy">
                                <div class="price">${{ $product->price }}</div><a class="buy fa fa-cart-plus fa-2x" href="{{ $product->options->count() ? url('/product/'.$product->id.'-'.Str::slug($product->name).'/show') : url('/cart/add/'.$product->id.'/?qty=1') }}"></a>
                            </div>
                        </div>
                        @endforeach
                            </div>

                        <!-- Shop
                        ============================================= -->
                        <div id="shop" class="shop product-3 product_box clearfix">
                            @foreach($new_products as $product)
                            <div class="product clearfix" data-product-id="product-{{$product->id}}">
                                <div class="product-image">




                                @if($product->sale_price)
                                <div class="sale-flash">50% Off*</div>
                                @endif
                                    <div class="product-overlay">
                                        <a href="/shop/addProduct/{{$product->id}}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                {{--         <a href="{!! asset('/frontend/include/ajax/shop-item.php') !!}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a> --}}
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title">
                                        <h3 itemprop="name" >
                                            <a href="{!! action('ShopController@product', ['slug'=>$product->slug]) !!}">
                                                {!! $product->name !!}
                                            </a>
                                        </h3>
                                    </div>
                                  @if($product->sale_price)  <div class="product-price"><del>${!! $product->price !!}</del> <ins>${!! $product->sale_price !!}</ins></div>@endif
                                  <div class="product-price"> ${!! $product->price !!} </div>
                              {{--       <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-half-full"></i>
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach

                        </div><!-- #shop end -->

                    </div><!-- .postcontent end -->

                       {{-- @include('frontend.shop.partials.layout.full') --}}

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar nobottommargin col_last">
                        <div class="sidebar-widgets-wrap">

                            <div class="widget widget_links clearfix">

                                <h4>Shop Categories</h4>
                                <ul>
                                    <li><a href="#">Hand Quilting</a></li>
                                    <li><a href="#">Machine Quilting</a></li>
                                    <li><a href="#">Automated Quilting</a></li>
                                    <li><a href="#">Qnique Quilter</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Grace's Favorites</a></li>

                                </ul>

                            </div>



                            <div class="widget clearfix">
                                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FTheGraceCompany&amp;width=240&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:290px;" allowTransparency="true"></iframe>
                            </div>

                            <div class="widget subscribe-widget clearfix">

                                <h4>Subscribe For Latest Offers</h4>
                                <h5>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                                <form action="#" role="form" class="notopmargin nobottommargin">
                                    <div class="input-group divcenter">
                                        <input type="text" class="form-control" placeholder="Enter your Email" required="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="submit"><i class="icon-email2"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div><!-- .sidebar end -->

                </div>

            </div>

        </section><!-- #content end -->
@endsection

@section('footer_scripts')@endsection
@section('pp_footer_scripts')


      <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/jquery.themepunch.tools.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}"></script>

    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/extensions/revolution.extension.video.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/extensions/revolution.extension.actions.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/extensions/revolution.extension.migration.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/frontend/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js') !!}"></script>

    <script type="text/javascript">

        var tpj=jQuery;
        tpj.noConflict();

        tpj(document).ready(function() {

            var apiRevoSlider = tpj('.tp-banner').show().revolution(
            {
                sliderType:"standard",
                jsFileLocation:"{!! asset('/frontend/include/rs-plugin/js/') !!}",
                sliderLayout:"fullwidth",
                dottedOverlay:"none",
                delay:9000,
                navigation: {},
                responsiveLevels:[1200,992,768,480,320],
                gridwidth:1140,
                gridheight:500,
                lazyType:"none",
                shadow:0,
                spinner:"off",
                autoHeight:"off",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    disableFocusListener:false,
                },
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "ares",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        tmp: '<div class="tp-title-wrap">   <span class="tp-arr-titleholder"> </span> </div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    }
                }
            });

            apiRevoSlider.bind("revolution.slide.onloaded",function (e) {
                SEMICOLON.slider.sliderParallaxDimensions();
            });

        }); //ready



    </script>

@endsection