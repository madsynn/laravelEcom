<style>
    [class*=icheckbox_], [class*=iradio_], [class^=icheckbox_], [class^=iradio_] { margin: 0 5px 0 0!important; }
</style>

<div class="form-group">

        <table class="table">
            <thead>
            <tr>
                <th class="col-md-6">{{trans('product.feature_name')}}</th>
                <th class="col-md-1">{{trans('product.useicon')}}</th>
                <th class="col-md-4">{{trans('product.icon')}}</th>
                <th class="col-md-1">{{trans('product.options')}}</th>
            </tr>
            </thead>
            <tbody id="FeatureInputsWrapper">
            @if(isset($product) && $product->features->count()>0)
                @foreach($product->features as $features)
                    <tr>
                        <td class="col-md-6"><input type="text" class="form-control" value="{{$features->feature_name}}" name="{{$features->feature_name}}"></td>
                        <td class="col-md-1">{!! Form::checkbox('useicon', $features->useicon) !!}</td>
                        <td class="col-md-4">{!! Form::text('icon', $feature->icon, ['class' => 'form-control']) !!}</td>
                        <td class="col-md-1"><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)">
                                <i class="fa fa-fw fa-times text-danger"></i> </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="col-md-6"><input type="text" class="form-control" name="productFeatures[0][feature_name]"></td>
                    <td class="col-md-1">{!! Form::checkbox('productFeatures[0][useicon]', 1, true) !!}</td>
                    <td class="col-md-4">{!! Form::text('productFeatures[0][icon]', 'icon-caret-right', ['class' => 'form-control']) !!}</td>
                    <td class="col-md-1"><a data-target="#modal-basic" data-toggle="modal"class="delete removeclass" href="javascript:void(0)">
                            <i class="fa fa-fw fa-times text-danger fa-lg"></i> </a> </td>
                </tr>
            @endif
            </tbody>
        </table>
        <a id="AddMoreFeatureBox" href="#">
            <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus"></i> {{trans('product.add_item')}} </button>
        </a>

</div>
<br style="clear:both" />
