{{-- <li>{{ $product['name'] }}</li>
	@if (count($product['children']) > 0)
	    <ul>
	    @foreach($product['children'] as $product)
	        @include('frontend.partials.product', $product)
	    @endforeach
	    </ul>
	@endif
 --}}

 @each('frontend.partials.product', $products, 'product', 'frontend.partials.products-none')
