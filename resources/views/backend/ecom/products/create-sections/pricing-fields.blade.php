<div class="row">
    <div class="col-md-12">
        <div class="adv-table editable-table ">
            <div class="clearfix">
                <div class="space15"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="product-pricing-table">
                        <thead>
                            <tr>
                                <th>Title:</th>
                                <th>Model:</th>
                                <th>Price:</th>
                                <th>Quantity:</th>
                                <th>SKU:</th>
                                <th>UPC:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($product) && $product->prices->count()<0)
                                @foreach($product->prices as $price)
                                    <tr class="alt">
                                        <td><input type="text" class="form-control" name="prices[0][title]" value="{!! $price->model !!}" /></td>
                                        <td><input type="text" class="text-center form-control" name="prices[0][model]" value="{!! $price->model !!}" /></td>
                                        <td><input type="text" class="text-center form-control currency" name="prices[0][price]" value="{!! $price->price !!}" data-affixes-stay="false" data-prefix="$ " data-thousands="," data-decimal="." /> </td>
                                        <td><input type="text" class="text-center form-control" name="prices[0][quantity]" maxlength="4" value="{!! $price->quantity !!}" /></td>
                                        <td><input type="text" class="text-center form-control" name="prices[0][sku]" value="{!! $price->sku !!}" /></td>
                                        <td><input type="text" class="text-center form-control" name="prices[0][upc]" maxlength="12" value="{!! $price->upc !!}" /></td>
                                    </tr>
                                    <tr class="alt">
                                        <td colspan="1" class="labelTextarea"><label>  <strong>Product Variation Details:</strong></label></td>
                                        <td colspan="5"> <textarea rows="3" class="form-control details-input" name="prices[0][alt_details]" value="{!! $price->alt_details !!}"></textarea></td>
                                    </tr>
                                    <tr class="spacer invis"><td colspan="5"></td></tr>
                                @endforeach
                            @else


                                    <tr class="alt">
                                        <td>{!! Form::text('prices[0][title]', Input::old('prices.title'), ['class'=>'form-control text-center']) !!}</td>
                                        <td>{!! Form::text('prices[0][model]', Input::old('prices.model'), ['class'=>'form-control text-center']) !!} </td>
                                        <td>{!! Form::text('prices[0][price]', Input::old('prices.price'),
                                                    [
                                                    'class'=>'form-control text-center form-control currency',
                                                    'data-affixes-stay' => 'false',
                                                    'data-prefix' => '$',
                                                    'data-thousands'=> ',',
                                                    'data-decimal' => '.'
                                                    ]) !!}

                                        <td>{!! Form::text('prices[0][quantity]', Input::old('prices.quantity'), ['class'=>'form-control text-center', 'maxlength' => '4']) !!}</td>
                                        <td>{!! Form::text('prices[0][sku]', Input::old('prices.sku'), ['class'=>'form-control text-center']) !!} </td>
                                        <td>{!! Form::text('prices[0][upc]', Input::old('prices.upc'), ['class'=>'form-control text-center']) !!} </td>
                                    </tr>
                                    <tr class="alt">
                                        <td colspan="1" class="labelTextarea"><label><strong>Product Variation Details:</strong></label></td>
                                        <td colspan="5"> {!! Form::text('prices[0][alt_details]', Input::old('prices.alt_details'), ['class'=>'form-control text-center', 'rows'=> '3']) !!} </td>
                                    </tr>
                                    <tr class="spacer invis"><td colspan="5"></td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <button type="button" id="addRow" class="btn default">
                    Add New <i class="icon-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>

