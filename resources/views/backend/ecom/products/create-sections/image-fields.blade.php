<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>Main Product Images Section</h3>
            <hr />
            <div class="row col-md-12" style="top-margin:10%;"></div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-8">
                        <h4>   {!! Form::label('thumbnail', trans('product.primary-photo')) !!} </h4>
                        <input id="thumbnail" name="thumbnail" type="file" class="file input-preview" value="{!! old('thumbnail') !!}">
                    </div>
                </div>
            </div>
            <div class="row">
                <br style="clear:both" />
                <div class="form-group">
                    <div class="col-md-8">
                        <h4>   {!! Form::label('thumbnail2', trans('product.secondary-photo')) !!} </h4>
                        <input id="thumbnail2" name="thumbnail2" type="file" class="file input-preview" value="{!! old('thumbnail2') !!}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="top-spacer" style="padding-top: 50px;"></div>
    <div class="row">
        <h3>Additional Product Images Section</h3>
        <hr />
        <div class="container-fluid">
            <div id="additional-images">




                <div id="image-block">



                    @if(isset($product) && $product->photo->count()>0)
                        @foreach($product->photos as $photo)

                           <tr class="alt"><td colspan="1" class="labelTextarea"><label >
                                        <strong>Product Variation Details:</strong></label></td><td colspan="4">
                                    <textarea rows="3" class="form-control details-input" name="alt_details[]" value="{!! $price->alt_details !!}"></textarea></td>
                            </tr>
                            <tr class="spacer invis"><td colspan="5"></td></tr>

                            <div class="row">
                                <div class="col-md-5 image-cell">
                                    <div class="form-group">
                                        <div class="col-sm-12"><label><h4>Additional Image</h4></label>
                                            <img src="{{ $photo->photo_src }}" height="200" width="200">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="col-md-12">
                                        <h4>Image Details</h4>
                                    </div>
                                    <div class="form-group col-md-12"><input type="text" id="caption" name="photo[0][caption]" class="form-control"  value="{!! $photo->caption !!}"></div>
                                    <div class="form-group col-md-12"><input type="text" id="alt" name="photo[0][alt]" class="form-control" value="{!! $photo->alt !!}"></div>
                                    <div class="form-group col-md-12"><input type="text" id="info" name="photo[0][photoinfo]" class="form-control" value="{!! $photo->photoinfo !!}"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="col-md-12">
                                        <h4>Image Locations</h4>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="photo[0][use_main]" value="{{ $photo->use_main }}" class="m-t-10"> <strong>Thumbnail Image</strong>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="photo[0][use_thumb]" value="{{ $photo->use_thumb }}" class="m-t-10"><strong>Main Product Image</strong>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="photo[0][use_gallery]" value="{{ $photo->use_gallery }}" class="m-t-10"><strong>Gallery Image</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <small>if checked the location image is used</small>
                                    </div>
                                </div>

                                <div class="col-md-1">

                                    <h4>Delete</h4>
                                    {{--<span class="fa fa-trash-o fa-lg remove-photo clickable" data-href="{{ url('/product/'.$product->id.'/photo/'.$photo->id.'/delete') }}"></span>--}}

                                    <a href="#" class="delete-img btn btn-sm btn-default m-t-10"><i class="fa fa-times-circle"></i> &nbsp; Remove</a>
                                </div>
                            </div>
                            <!-- /row end -->
                        @endforeach
                    @else
                    <div class="row">
                        <div class="col-md-5 image-cell">
                            <div class="form-group">
                                <div class="col-sm-12"><label><h4>Additional Image</h4></label>
                                    <input id="input-preview" type="file" class="file" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12">
                                <h4>Image Details</h4>
                            </div>
                            <div class="form-group col-md-12"><input type="text" id="caption" name="photo[0][caption]" class="form-control" placeholder="caption"></div>
                            <div class="form-group col-md-12"><input type="text" id="alt" name="photo[0][alt]" class="form-control" placeholder="alt text"></div>
                            <div class="form-group col-md-12"><input type="text" id="info" name="photo[0][photoinfo]" class="form-control" placeholder="image info"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-12">
                                <h4>Image Locations</h4>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="photo[0][use_main]" value="1" class="m-t-10" checked> <strong>Thumbnail Image</strong>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="photo[0][use_thumb]" value="1" class="m-t-10" checked><strong>Main Product Image</strong>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="photo[0][use_gallery]" value="1" class="m-t-10" checked><strong>Gallery Image</strong>
                                        </label>
                                    </div>
                                </div>
                                <small>if checked the location image is used</small>
                            </div>
                        </div>

                        <div class="col-md-1">

                                <h4>Delete</h4>

                            <a href="#" class="delete-img btn btn-sm btn-default m-t-10 remove-photo clickable"  data-href=" "><i class="fa fa-trash-o fa-lg "></i> &nbsp; Remove</a>


                        </div>
                    </div>
                    <!-- /row end -->
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br style="clear:both"/>
    <div class="row">
        <div class="col-md-12">
            <br/> <br/> <br/>
            <button id="add_album_image" class="btn btn-danger" type="button" onclick=""><i class="fa fa-plus"></i> Add Photo </button>
            <br/> <br/> <br/>
        </div>
    </div>
</div>
</div>

