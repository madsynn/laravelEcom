<hr />
<div class="row">
    <div class="form-group col-md-12">
        <!-- Status Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', [ 'online' => 'Online', 'offline' => 'Offline', 'removed' => 'Removed', 'archived' => 'Archived', 'discontinued' => 'Discontinued','comming' => 'Comming Soon'], null, ['class' => 'form-control']) !!}
        </div>
        <!-- Manufacturer Field -->
        <div class="form-group col-md-3">
            {!! Form::label('manufacturer', 'Manufacturer:') !!}
            {!! Form::select('manufacturer', ['The Grace Company' => 'The Grace Company','Grace Frames' => 'Grace Frames' ], null, ['class' => 'form-control']) !!}
        </div>
        <!-- Status Field -->
        <div class="form-group col-md-3">
            {!! Form::label('availability', 'Availability:') !!}
            {!! Form::select('status', ['Available' => 'Available', 'InStock' => 'InStock',  'OnHold' => 'OnHold', 'OnBackorder' => 'OnBackorder', 'PreOrders' => 'PreOrders', 'PromoActive' => 'PromoActive', 'SoldOut' => 'SoldOut', 'Discontinued' => 'Discontinued'], null, ['class' => 'form-control']) !!}
        </div>
        <!-- Office Status Field -->
        <div class="form-group col-md-3">
            {!! Form::label('office_status', 'InOffice Status:') !!}
            {!! Form::select('office_status', ['Draft' => 'Draft', 'Review' => 'Review', 'inDesign' => 'inDesign', 'inProof' => 'inProof', 'inProcess' => 'inProcess', 'Hidden' => 'Hidden', 'Deleted' => 'Deleted', 'Live' => 'Live', 'Offline' => 'Offline', 'Removed' => 'Removed'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-12">
        <!-- Is Published Field -->
        <div class="form-group col-sm-2">
            {!! Form::label('is_published', 'Is Published:') !!}
            <label class="checkbox ">
                {!! Form::checkbox('is_published', 1, null,['data-toggle' => 'toggle', 'data-on' => 'Published', 'data-off' => 'NotPublished','data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('is_published') ]) !!}
            </label>
        </div>
        <!-- Ispromo Field -->
        <div class="form-group col-sm-10">
            {!! Form::label('ispromo', 'Is On Promotion:') !!}
            <label class="checkbox">
                {!! Form::checkbox('ispromo', 0, null,['data-toggle' => 'toggle', 'data-on' => 'Enabled', 'data-off' => 'Disabled', 'data-onstyle' => 'success', 'data-offstyle' => 'danger', 'value'=>Input::old('ispromo') ]) !!}
            </label>
        </div>
        <!-- Name Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('name', 'Product Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>


        <!-- Subtitle Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('subtitle', 'Subtitle:') !!}
            {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Category Field -->
        <div class="form-group col-md-2">
            {!! Form::label('category', 'Category:') !!}
            <select class="form-control" name="categories[]" id="categories">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-4">



            <!-- / FEATURES_HEADING / Form Input -->
            <div class="form-group ">
                <h4> {!! Form::label('features', trans('product.features'), array('class' => 'control-label')) !!}</h4>
                <div class="input-group col-md-12"> {{-- <div class="input-group-addon"></div> --}}
                    {!! Form::text('features_heading', null, ['class' => 'form-control', 'id' => 'features-heading']) !!}

                </div>
                <span id="helpBlock" class="help-block"> This is the heading text shown above the bullet list. </span>
                <small class="text-danger">{{ $errors->first('features_heading') }}</small>
            </div>
            <hr>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <!-- Description Field -->
            <div class="form-group">
                {!! Form::label('details', 'Short Details:') !!}
                {{--{!! Form::textarea('details', null, ['class' => 'form-control summernote' ]) !!}--}}
                {!! Form::textarea('details', null, ['class' => 'form-control' ]) !!}
            </div>
        </div>
        <div class="col-md-4">

            @include('backend.ecom.products.partials.productfeatures')
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('description', 'Description:') !!}
            {{--{!! Form::textarea('description', null, ['class' => 'form-control summernote' ]) !!}--}}
            {!! Form::textarea('description', null, ['class' => 'form-control' ]) !!}
        </div>
        <!-- Video Url Field -->
        <div class="form-group col-md-8">
            {!! Form::label('video_url', 'Video Url:') !!}
            {!! Form::text('video_url', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Slug Field -->
        <div class="form-group col-md-4">
            {!! Form::label('slug', 'Slug:') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>