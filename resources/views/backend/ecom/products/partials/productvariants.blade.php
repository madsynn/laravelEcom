
<div class="form-group">
    {!! Form::label('variants', trans('product.variants'), array('class' => 'control-label')) !!}
    <div class="panel-content">

        <table class="table">
            <thead>
            <tr>
                <th>{{trans('product.attribute_name')}}</th>
                <th>{{trans('product.product_attribute_value')}}</th>
                <th>{{trans('product.options')}}</th>
            </tr>
            </thead>
            <tbody id="VariantsInputsWrapper">
            @if(isset($product) && $product->variants->count()>0)
                @foreach($product->variants as $variants)
                    <tr>
                        <td><input type="text" class="form-control" value="{{$variants->attribute_name}}" name="attribute_name[]"></td>
                        <td><input type="text" class="form-control" value="{{$variants->product_attribute_value}}" name="product_attribute_value[]"></td>
                        <td><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)"> <i class="fa fa-fw fa-times text-danger"></i> </a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td><input type="text" class="form-control" value="" name="attribute_name[]"></td>
                    <td><input type="text" class="form-control" value="" name="product_attribute_value[]"></td>
                    <td><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)"><i class="fa fa-fw fa-times text-danger"></i></a></td>
                </tr>
            @endif
            </tbody>
        </table>
        <a id="AddMoreFileBox" href="#">
            <button class="btn btn-sm btn-primary" type="button"><i
                        class="fa fa-plus"></i> {{trans('product.add_item')}}
            </button>
        </a>
    </div>
</div>

