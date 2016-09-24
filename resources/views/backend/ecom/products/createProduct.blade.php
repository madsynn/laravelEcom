@extends('backend/layout/clip')

@section('topscripts')
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link href="{!! asset('/clip/bower_components/select2/dist/css/select2.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/assets/plugin/bootstrap-timepicker.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/clip/bower_components/jquery.tagsinput/dist/jquery.tagsinput.min.css') !!}" rel="stylesheet" />
{{--    <link href="{!! asset('/clip/bower_components/summernote/dist/summernote.css') !!}" rel="stylesheet" />--}}
    <link href="{!! asset('/clip/bower_components/bootstrap-fileinput/css/fileinput.min.css') !!}" rel="stylesheet" />
    {{--<link rel="stylesheet" href="{!! asset('/clip/assets/data-tables/DT_bootstrap.css') !!}" />--}}
    {{--<link rel="stylesheet" href="{!! asset('/assets/css/bootstrap-table.css') !!}" />--}}
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
@endsection

@section('pagetitle')
    <div class="row">
    <div class="col-sm-12">
            <!-- start: PAGE TITLE & BREADCRUMB -->
            <ol class="breadcrumb">
            <li><a href="{!! url(getLang() . '/admin') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Products</li>
            </ol>
            <div class="page-header">
                     <h1 class="pull-left">Create New Product</h1>
            </div>
            <!-- end: PAGE TITLE & BREADCRUMB -->
        </div>
    </div>
@endsection

@section('content')
<div class="container-fluid add-product">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

        <form action="{!! action('ProductController@store') !!}" method="post" enctype="multipart/form-data">
{{--<form action="{!! route('product.store') !!}" method="post" enctype="multipart/form-data">--}}
<div class="col-lg-12">
    <!-- Submit Field -->
    <div class="form-group col-sm-12 pull_right">
        {!! Form::submit('Add Product', ['class' => 'btn btn-primary' ]) !!}
        <a href="{!! url(getLang().'/admin/products/') !!}" class="btn btn-default">Cancel</a>
    </div>


  <div class="tabbable">
  <h3>TAB SELECTION:</h3>
    <ul id="myTab4" class="nav nav-tabs tab-padding tab-space-3 tab-blue">
        <li class="active"> <a data-toggle="tab" href="#panel_tab_overview"><i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp; OVERVIEW </a> </li>
        <li class=""> <a data-toggle="tab" href="#panel_tab_image"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp; IMAGES &amp; FILES </a> </li>
        <li class=""> <a data-toggle="tab" href="#panel_tab_pricing"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; PRICING / TAX / SHIPPING </a> </li>
        <li class=""> <a data-toggle="tab" href="#panel_tab_meta"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp; META / SEO </a> </li>
        <li class=""> <a data-toggle="tab" href="#panel_tab_additional"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp; ADDITIONAL </a> </li>
        <li class=""> <a data-toggle="tab" href="#panel_tab_developer"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp; DEVELOPER </a> </li>
    </ul>
    <div class="tab-content">
        <div id="panel_tab_overview" class="tab-pane active">
        @include('backend.ecom.products.create-sections.overview-fields')


        <br style="clear:both" />
        </div>
        {{--@if($product->prices)--}}
        <div id="panel_tab_image" class="tab-pane">
        @include('backend.ecom.products.create-sections.image-fields')
         <br style="clear:both" />
        </div>
        {{--@endif--}}
        <div id="panel_tab_pricing" class="tab-pane">
        @include('backend.ecom.products.create-sections.pricing-fields')
         <br style="clear:both" />
        </div>
        <div id="panel_tab_meta" class="tab-pane">
        @include('backend.ecom.products.create-sections.meta-fields')
         <br style="clear:both" />
        </div>
        <div id="panel_tab_additional" class="tab-pane">
        @include('backend.ecom.products.create-sections.additional-fields')
         <br style="clear:both" />
        </div>
        <div id="panel_tab_developer" class="tab-pane">
        @include('backend.ecom.products.create-sections.developer-fields')
         <br style="clear:both" />
        </div>
         <br style="clear:both" />
    </div>
  </div>
<div class="line"></div>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
        {!! Form::close() !!}
        <div class="clearfix"></div>
</div>
@endsection

@section('bottomscripts')

            <script src="{!! asset('/clip/bower_components/bootstrap-fileinput/js/fileinput.js') !!}"></script>
            {{--<script type="text/javascript" src="{!! asset('/clip/assets/js/form-elements.js') !!}"></script>--}}

            <script type="text/javascript" src="{!! asset('/assets/js/jquery-maskmoney/dist/jquery.maskMoney.js') !!}"></script>
            {{--<script type="text/javascript" src="{!! asset('/clip/assets/js/phillips-custom.js') !!}"></script>--}}
            {{--@include('backend.ecom.products.partials.jsProducts')--}}
       <script>

          // $(window).load(function() {
     $().ready(function() {
               var MaxInputs = 50;
               var FeatureInputsWrapper = $("#FeatureInputsWrapper");
               var AddFeatureButton = $("#AddMoreFeatureBox");
               var x = FeatureInputsWrapper.length;
               var FeatureFieldCount = 1;


         $(AddFeatureButton).click(function(e)
               {
                   if (x <= MaxInputs) //max input box allowed
                   {
                       FeatureFieldCount++; //text box added increment
                       $(FeatureInputsWrapper).append("<tr>" + "<td><input type='text' name='productFeatures[" + FeatureFieldCount + "][feature_name]' value='Feature " +  x + "' class='form-control'></td>" +
                                   "<td><input type='checkbox' name='productFeatures[" + FeatureFieldCount + "][useicon]' class='flat-orange' checked /></td>" +
                                   "<td><input type='text' name='productFeatures[" + FeatureFieldCount + "][icon]' value='icon-caret-right' class='form-control'></td>" +
                                   "<td><a href='javascript:void(0)' class='delete removeclass' data-toggle='modal' data-target='#modal-basic'>" +
                                   "<i class='fa fa-fw fa-times fa-lg text-danger'></i>" + "</a></td>" + "</tr>")

                       x++; //text box increment
                      // $('table input[name*="feature_name[]').val("Feature " +  x);
                   }
                   return false;
               });

            $("#FeatureInputsWrapper").on("click", ".removeclass", function(e) { //user click on remove text
                @if(!isset($product))
                if (x > 1) { $(this).parent().parent().remove(); x--; }
                @else
          $(this).parent().parent().remove();
                x--;
                @endif
                            return false;
            });




            var VariantInputsWrapper = $("#VariantsInputsWrapper"); //Input boxes wrapper ID
            var AddVariantButton = $("#AddMoreFileBox"); //Add button ID
            var v = VariantInputsWrapper.length; //initlal text box count
            var VariantFieldCount = 1; //to keep track of text box added

            $(AddVariantButton).click(function (e)  //on add input button click
            {
                if (v <= MaxInputs) //max input box allowed
                {
                    VariantFieldCount++; //text box added increment
                    //add input box
                    $(VariantInputsWrapper).append(
                                   '<tr><td><input type="text" name="attribute_name[' + VariantFieldCount + ']" value="" class="form-control"></td>' +
                                   '<td><input type="text" name="product_attribute_value[' + VariantFieldCount + ']" value="" class="form-control"></td>' +
                                   '<td><a href="javascript:void(0)" class="delete removeclass" data-toggle="modal" data-target="#modal-basic">' +
                                   '<i class="fa fa-fw fa-times text-danger"></i></a></td></tr>'
                       );
                    x++; //text box increment
                }
                return false;
            });

            $("#VariantsInputsWrapper").on("click", ".removeclass", function (e) { //user click on remove text
                @if(!isset($product))
                if (x > 1) {  $(this).parent().parent().remove();  x--; }
                @else
          $(this).parent().parent().remove();  x--;
                @endif
                            return false;
            })






               $(function() {
                   var options_counter = 0;
                   var photo_counter = 0;

                   $('.sidebar #products').addClass('active-section');

                   $('#add_album_image').click(function() {
                       photo_counter++;
                       var newcaption =  "caption-" + photo_counter;
                       var newalt =  "alt-text-" + photo_counter;
                       var imageinfo = "info about image here";
                       $("#additional-images").find('#image-block')
                                   .append("<hr /><div class='row index' p-index='" + photo_counter + "'>" +
                                               "<div class='col-md-5 image-cell'><div class='form-group'><div class='col-sm-12'><label>Additional Product Image</label>" +
                                               "<input type='file' id='input-preview' class='file'></div></div></div><div class='col-md-3'>" +
                                               "<div class='col-md-12'><h3>Image Details</h3></div>" +
                                               "<div class='form-group col-md-12'><input type='text' id='caption' name='photo[" + photo_counter +  "][caption]' value='" + newcaption + "' class='form-control' placeholder='caption'></div>" +
                                               "<div class='form-group col-md-12'><input type='text' id='alt' name='photo[" + photo_counter +  "][alt]'  value='" + newalt + "' class='form-control' placeholder='alt text'></div>" +
                                               "<div class='form-group col-md-12'><input type='text' id='info' name='photo[" + photo_counter +  "][photoinfo]'  value='" + imageinfo + "'  class='form-control' placeholder='image info'></div>" +
//                                               "<div class='form-group col-md-12'><input type='text' id='caption' name='photo[" + $(this).parent().attr('p-index') +  "][caption]' class='form-control' placeholder='caption'></div>" +
//                                               "<div class='form-group col-md-12'><input type='text' id='alt' name='photo[" + $(this).parent().attr('p-index') +  "][alt]' class='form-control' placeholder='alt text'></div>" +
//                                               "<div class='form-group col-md-12'><input type='text' id='info' name='photo[" + $(this).parent().attr('p-index') +  "][photoinfo]' class='form-control' placeholder='image info'></div>" +
                                               "</div><div class='col-md-3'><div class='col-md-12'><h3>Image Locations</h3></div><div class='form-group'><div class='col-sm-12'>" +
                                               "<div class='checkbox'><label><input type='checkbox' name='photo[" + photo_counter +  "][use_main]' value='1' class='m-t-10' checked><strong>Thumbnail Image</strong></label></div>" +
                                               "<div class='checkbox'><label><input type='checkbox' name='photo[" + photo_counter +  "][use_thumb]' value='1' class='m-t-10' checked><strong>Main Product Image</strong></label></div>" +
                                               "<div class='checkbox'><label><input type='checkbox' name='photo[" + photo_counter +  "][use_gallery]' value='1' class='m-t-10' checked><strong>Gallery Image</strong></label></div></div><small>if checked the location image is used</small></div></div>" +
                                               "<div class='col-md-1'><a href='#' class='delete-img btn btn-sm btn-default m-t-10'><i class='fa fa-times-circle'></i> &nbsp; Remove</a></div>" +
                                               "</div>" + photo_counter)
                                   .find("input[type*='file']")
                                   .fileinput();
                   });

//                   $('#add_album_image').click(function() {
//                       $("#additional-images").find('tbody').append('<tr><td style="width:40%"> <div class="form-group col-md-12 ">' + '<input type="file" id="album" name="album[]" class="file form-control input-preview"></div> </td> ' + '<td style="width:30%"> <div class="form-group col-md-12 "> <div class="input-group"> ' + '<input type="text" id="caption" name="caption[]" class="form-control"> ' + '<div class="input-group-addon">caption</div> </div> </div> <div class="form-group col-md-12 "> ' + '<div class="input-group"> <input type="text" id="alt" name="alt[]" class="form-control"> ' + '<div class="input-group-addon">alt</div> </div> </div> <div class="form-group col-md-12 "> ' + '<div class="input-group"> <div class="input-group-addon">info</div> <input type="text" id="photoinfo" name="photoinfo[]" class="form-control"> ' + '</div> </div> </td> <td > <input type="checkbox" name="use_main[]" value="1" class="m-t-10" checked> </td> <td> ' + '<input type="checkbox" name="use_thumb[]" value="1" class="m-t-10"> </td> <td> <input type="checkbox" name="use_gallery[]" value="1" class="m-t-10"> </td> ' + '<td class="text-center"> <a href="#" class="delete-img btn btn-sm btn-default m-t-10"><i class="fa fa-times-circle"></i> Remove</a> </td>');
//                       $(".input-preview").fileinput();
//                   });

                   $('#add_product_option').click(function() {
                       options_counter++;
                       $('.options-group').append('<div class="option col-md-3" op-index="' + options_counter + '">' +
                                   '<span class="fa fa-times fa-lg remove-option"></span>' + '<label for="options">Option Name:</label>' +
                                   '<strong><input type="text" name="options[' + options_counter + '][name]"></strong><br>' + '<div class="add_option_value">+ Add Value</div>' +
                                   '<ul class="values"><li>' + '<input type="text" name="options[' + options_counter + '][values][]"></li>' + '</ul>' + '</div>');
                   });
                   $(document).on("click", ".remove-option", function() {
                       $(this).parent().remove();
                   });
                   $(document).on("click", ".add_option_value", function() {
                       $(this).parent().find('.values').append('<li>' + '<input type="text" name="options[' + $(this).parent().attr('op-index') + '][values][]">' + '<i class="fa fa-minus remove-value"></i>' + '</li>');
                   });
                   $(document).on("click", ".remove-value", function() {
                       $(this).parent().remove();
                   });
               });
//               $("#addRow").click(function() {
//                   var row = $("<tr>" + "<td><input type='text' class='text-center form-control' name='model[]' /></td>" +
//                   "<td><input type='text' class='text-center form-control  currency' name='price[]' placeholder='$0.00' data-affixes-stay='false' data-prefix='$ ' data-thousands=',' data-decimal='.' /></td>" +
//                   "<td><input type='text' class='text-center form-control' name='quantity[]' /></td>" +
//                   "<td><input type='text' class='text-center form-control' name='sku[]' /></td>" +
//                   "<td><input type='text' class='text-center form-control' name='upc[]' value='636343' /></td>" +
//                   "</tr>" + "<tr class='alt'><td colspan='1' class='text-center labelTextarea'><label ><strong>Product Variation Details:</strong></label></td>" +
//                   "<td colspan='4'><textarea rows='3' class='form-control details-input' name='alt_details[]' placeholder='add the details or difference here:'></textarea></td>" +
//                   "</tr>");
//                   $("table#product-pricing-table tbody").append(row);
//                   $('table#product-pricing-table input.currency').maskMoney();
//               });
//               $(function() {
//                   $('table#product-pricing-table input.currency').maskMoney();
//               });

         var pricing_counter = 0;
         var number = Math.floor(Math.random() * 1E2);
        var price = Math.floor(Math.random() * 4E6);
         $('table input[name*="price"]').val(price);

        var quantity = Math.floor(Math.random() * 1E3);
        $('table input[name*="quantity"]').val(quantity);



         var model = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);
         var caption =  "caption";
         var alt =  "alt-text";
         var imageinformation = "info about image here";
         document.getElementById("name").value = "Product Name " + number;
         document.getElementById("subtitle").value = "subtitle goes here";
         document.getElementById("details").value = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.";
         document.getElementById("description").value = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. " +
                     "Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, " +
                     "pretium quis, sem. Nulla consequat massa quis enim.";
         document.getElementById("features-heading").value = "Feature Heading";
         document.getElementById("slug").value = "slug-" + number;
         var title = "Variable Price " + number;
         $('table input[name*="model"]').val(number + "-" + model);
         $('input[name*="caption').val(caption);
         $('input[name*="alt').val(alt);
         $('input[name*="photoinfo').val(imageinformation);
         $('table input[name*="feature_name[]').val("Feature ");
         $('table input[name*="title"]').val(title);

//        $('table input[name*="model"]').val(number + "-" + model);

        var sku = Math.floor(Math.random() * 1E6);
        $('table input[name*="sku"]').val(sku);

        var upc = Math.random().toString().slice(-6);
        $('table#product-pricing-table input[name*="upc"]').val("636343" + upc);

         var info = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit."
         $('table#product-pricing-table>tbody>tr>textarea').val(info);



        console.log( "MODEL: " + model, "PRICE: " + price, "QTY: " + quantity, "SKU: " + sku, "UPC: " + upc);


        $("#addRow").click(function (e) {
            pricing_counter++;
            var randomprice = Math.floor(Math.random() * 1E4);
            var randomquantity = Math.floor(Math.random() * 1E3);
            var randommodel = number + "-" + model + "-" + Math.floor(Math.random() * 1E2);
             var mix =  Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);
            var randomupc = Math.random().toString().slice(-6);
            var randomsku = Math.floor(Math.random() * 1E6);
           // var newtitle = title + "-" + pricing_counter;
            var newtitle = "Variable Price " + pricing_counter;
            var newinfo = "Lorem ipsum dolor sit amet consectetuer adipiscing elit";

            console.log("Insert Data For New Product Price");
            console.log("PRICE: " + randomprice, "QTY: " + randomquantity, "MODEL: " + randommodel, "SKU: " + randomsku, "UPC: " + randomupc);

            e.preventDefault();

            var row = $("<tr price-index='" + pricing_counter + "'>" +
                        "<td>" + pricing_counter + " <input type='text' class='form-control' name='prices[" + pricing_counter +  "][title]' value=" + newtitle + " /></td>" +
                "<td><input type='text' class='text-center form-control' name='prices[" + pricing_counter +  "][model]' value=" + randommodel + "></td>" +
                "<td><input type='text' class='text-center form-control currency' name='prices[" + pricing_counter +  "][price]' value=" + randomprice + "></td>" +
                "<td><input type='text' class='text-center form-control' name='prices[" + pricing_counter +  "][quantity]' value=" + randomquantity + "></td>" +
                "<td><input type='text' class='text-center form-control' name='prices[" + pricing_counter +  "][sku]' value=" + randomsku + "></td>" +
                "<td><input type='text' class='text-center form-control' name='prices[" + pricing_counter +  "][upc]' value='636343" + randomupc + "'></td>" +
                "</tr><tr class='alt'><td colspan='1' class='labelTextarea'><label ><strong>Product Variation Details:</strong></label></td>" +
                "<td colspan='5'><textarea rows='3' class='form-control details-input' name='prices[" + pricing_counter +  "][alt_details]' value=" + newinfo + "></textarea></td>" +
                "</tr>");
                $("table#product-pricing-table tbody").append(row)
                $('table#product-pricing-table input.currency').maskMoney();
        });

        $('table#product-pricing-table input.currency').maskMoney();




        });

          window.onload = function(){


          };



          //$('table input[name*="feature_name[]').val("Feature " + number);


       </script>


@endsection

@section('clipinline')
            {{--FormElements.init();--}}
            {{--EditableTable.init();--}}
@endsection
