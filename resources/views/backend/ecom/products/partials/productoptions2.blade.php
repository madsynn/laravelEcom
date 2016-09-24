

<script type='text/javascript'>
    $(window).load(function () {
        var options_counter = 0;
        var values_counter = 0;



        var options_counter = 0;

        $("#addNewOption").click(function () {
            options_counter++;

            var option = $("<div id='optionblock' class='col-md-3' op-index=" + options_counter + ">" +
                        "<div class='tg-wrap'><table id='productoptions' class='tg table col-md-12 table-striped table-hover table-bordered'>" +
                        "<thead>" +
                        "<tr><th class='tg-yw4l'><strong>Option Name</strong></th><th class='tg-yw4l'></th><th class='tg-yw4l'>Variations</th><th class='tg-yw4l'></th></tr>" +
                        "</thead>" +
                        "<tbody>" +
                        "<tr>" +
                        "<td class='tg-yw4l'><input type='text' name='options[" + options_counter + "][name]' /></td>" +
                        "<td class='tg-yw4l'><a href='javascript:void(0)'><span id='removeOptionValue'><i class='fa fa-fw fa-times text-danger fa-lg'></i></span></a></td>" +
                        "<td class='tg-yw4l'><input type='text' name='options[" + options_counter + "][values][]' />" +
                        "</td><td class='tg-yw4l'><a href='javascript:void(0)'><span id='addOptionValue'><i class='fa fa-plus-circle fa-lg' aria-hidden='true'></i></span></a></td>" +
                        "</tr>" +
                        "</tbody>" +
                        "<tfoot><tr>" +
                        "<td class='tg-yw4l'><span id='btn_new' class='btn btn-danger pull-right'><i id='ui-icon' class='fa-trash fa ' aria-hidden='true'></i>&nbsp Delete This Option</span>" +
                        "</td>" +
                        "<td class='tg-yw4l' colspan='3'><span  id='addNewOption' class='btn btn-success pull-right'>" +
                        "<i id='ui-icon' class='fa fa-plus-circle fa-lg' aria-hidden='true'></i>&nbsp Add New Option</span>" +
                        "</td>" +
                        "</tr>" +
                        "</tfoot>" +
                        "</table></div></div>");
            $("#optionsblocks").append(option);
        });


        $("#addOptionValue").click(function () {

            values_counter++;
            var row = $("<tr><td class='tg-yw4l'></td>" +
                        "<td class='tg-yw4l'><a href='javascript:void(0)'><span id='removeOptionValue'><i class='fa fa-fw fa-times text-danger fa-lg'></i></span></a></td>" +
                        "<td class='tg-yw4l'><input type='text' name='options[" + $(this).parent().attr('op-index') + "][values][" + values_counter + "]' /></td>" +
                        "<td class='tg-yw4l'><a href='javascript:void(0)'><span id='addOptionValue'><i class='fa fa-plus-circle fa-lg' aria-hidden='true'></i></span></a></td>" +
                        "</tr>");
            $("table#productoptions tbody").append(row);
        });






    });

</script>
<div class="row">
    <div class="col-md-12" id="optionsblocks" >
        <h3>Product Options</h3>
        <hr>
        {{--<div class="col-md-3" id="optionblock" op-index="0">--}}
        {{--<div class="tg-wrap">--}}
        {{--<table id="productoptions" class="tg table col-md-12 table-striped table-hover table-bordered">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th class="tg-yw4l"><strong>Option Name</strong></th>--}}
        {{--<th class="tg-yw4l"><span id="removeThisRow" class="btn btn-danger pull-right"> <i id="ui-icon" class="fa-trash fa " aria-hidden="true"></i></span></th>--}}
        {{--<th class="tg-yw4l">Variations</th>--}}
        {{--<th class="tg-yw4l"></th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--<tr>--}}
        {{--<td class="tg-yw4l"><input type="text" name="options[0][name]" /></td>--}}
        {{--<td class="tg-yw4l">--}}
        {{--<a href="javascript:void(0)"><span id="removeOptionValue"><i class="fa fa-fw fa-times text-danger fa-lg"></i></span></a>--}}
        {{--</td>--}}
        {{--<td class="tg-yw4l"><input type="text" name="options[0][values][0]" /></td>--}}
        {{--<td class="tg-yw4l">--}}
        {{--<a href="javascript:void(0)"><span id="addOptionValue"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></span></a>--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--</tbody>--}}
        {{--<tfoot>--}}
        {{--<tr>--}}
        {{--<td class="tg-yw4l">--}}
        {{--<span id="removeThisRow" class="btn btn-danger pull-right"> <i id="ui-icon" class="fa-trash fa " aria-hidden="true"></i>&nbsp Delete This Option</span>--}}
        {{--</td>--}}
        {{--<td class="tg-yw4l" colspan="4">--}}
        {{--<span id="addNewOption" class="btn btn-success pull-right"> <i id="ui-icon" class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp Add New Option</span>--}}
        {{--</td>--}}
        {{--</tr>--}}
        {{--</tfoot>--}}
        {{--</table>--}}
        {{--</div>--}}
        {{--</div>--}}





    </div>
</div>
<a id="addNewOption" href="#">
    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-plus"></i>
        {{--{{trans('product.add_item')}} --}} Add Option
    </button>
</a>


<script>
    //$("#myTable > tbody").append("<tr><td>row content</td></tr>");

    //    $('#btn_new').click(function(){ $(this).find('#ui-icon').toggleClass('fa-plus-circle fa-trash'); };
    //
    //            $(function () {
    //                var options_counter = 0;
    //
    //                $('#add_product_option').click(function () {
    //                    options_counter++;
    //                   //                    $('.options-group').append('<div class="option col-md-3" op-index="' + options_counter + '">' +
    ////                            '<span class="fa fa-times fa-lg remove-option"></span>' +
    ////                            '<label for="options">Option Name:</label>' +
    ////                            '<strong><input type="text" name="options[' + options_counter + '][name]"></strong><br>' +
    ////                            '<div class="add_option_value">+ Add Value</div>' +
    ////                            '<ul class="values"><li>' +
    ////                            '<input type="text" name="options[' + options_counter + '][values][]"></li>' +
    ////                            '</ul>' +
    ////                            '</div>');
    //                });
    //                $(document).on("click", ".remove-option", function () {
    //                    $(this).parent().remove();
    //                });
    //                $(document).on("click", ".add_option_value", function () {
    //                    $(this).parent().find('.values').append('<li>' +
    //                            '<input type="text" name="options[' + $(this).parent().attr('op-index') + '][values][]">' +
    //                            '<i class="fa fa-minus remove-value"></i>' +
    //                            '</li>');
    //                });
    //                $(document).on("click", ".remove-value", function () {
    //                    $(this).parent().remove();
    //                });
    //
    //
    //            });

</script>


-------------------------------------------------------
<div class="row options">
    <div class="form-group col-md-12">
        <label for="options">{{trans('product.productoptions')}} : </label>
        <div id="add_product_option" class=" btn btn-sm btn-primary">+ Add Option</div>
        <div class="options-group row">
            <div class="option col-md-3" op-index="0">
                <label for="options">{{trans('product.product_option_name')}} :
                    <input type="text" name="options[0][name]"></label>

                <div class="indent-option">
                    <ul class="values">
                        <a class="btn btn-danger remove-option" aria-label="Delete">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>
                        <li>
                            <input type="text" name="options[0][values][]">
                        </li>
                    </ul>
                    <span class="add_option_value ">
                        <i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; Add Value
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<span id="btn_new" class="btn btn-danger">
     <i id="ui-icon" class="fa-trash fa " aria-hidden="true"></i> &nbsp; new
</span>


<script>

        $('#btn_new').click(function(){
                $(this).find('#ui-icon').toggleClass('fa-plus-circle fa-trash');
        };

            $(function () {
                var options_counter = 0;

                $('#add_product_option').click(function () {
                    options_counter++;
                    $('.options-group').append('' +
                            '<div class="option col-md-3" op-index="' + options_counter + '">' +
                            '<span class="fa fa-times fa-lg remove-option"></span>' +
                            '<label for="options">Option Name:</label>' +
                            '<strong><input type="text" name="options[' + options_counter + '][name]"></strong><br>' +
                            '<div class="add_option_value">+ Add Value</div>' +
                            '<ul class="values"><li>' +
                            '<input type="text" name="options[' + options_counter + '][values][]"></li>' +
                            '</ul>' +
                            '</div>');
                });
                $(document).on("click", ".remove-option", function () {
                    $(this).parent().remove();
                });
                $(document).on("click", ".add_option_value", function () {
                    $(this).parent().find('.values').append('<li>' +
                            '<input type="text" name="options[' + $(this).parent().attr('op-index') + '][values][]">' +
                            '<i class="fa fa-minus remove-value"></i>' +
                            '</li>');
                });
                $(document).on("click", ".remove-value", function () {
                    $(this).parent().remove();
                });


            });

</script>



<div class="col-md-3">
    <div class="form-group">
        {{--{!! Form::label('features', trans('product.features'), array('class' => 'control-label')) !!}--}}
        <h3>Product Options</h3>
        <div class="panel-content">

            <table class="table col-md-12 table-striped table-hover table-bordered">
                <thead>
                <tr>
                    {{--<th class="col-md-1"> </th>--}}
                    <th class="col-md-6">Option </th>
                    <th class="col-md-1"></th>
                    <th class="col-md-4"> </th>
                    <th class="col-md-1"> </th>
                </tr>
                </thead>
                <tbody id="FeatureInputsWrapper">
                @if(isset($product) && $product->features->count()>0)
                    {{--@foreach($product->features as $features)--}}
                    {{--<tr>--}}
                    {{--<td class="col-md-6"><input type="text" class="form-control" value="{{$features->feature_name}}" name="{{$features->feature_name}}"></td>--}}

                    {{--<td class="col-md-4">{!! Form::text('icon', $feature->icon, ['class' => 'form-control']) !!}</td>--}}
                    {{--<td class="col-md-1"><a data-target="#modal-basic" data-toggle="modal" class="delete removeclass" href="javascript:void(0)"> <i class="fa fa-fw fa-times text-danger"></i> </a> </td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                @else
                    <tr>
                        {{--<td tdclass="col-md-1"><i class="fa fa-plus fa-lg" aria-hidden="true"></i></td>--}}
                        <td class="col-md-6"><input type="text" class="form-control" name="options[0][name]"></td>
                        <td class="col-md-1></td>
                        <td class="col-md-6">{!! Form::text('icon', 'icon-caret-right', ['class' => 'form-control']) !!}</td>
                        <td class="col-md-1">
                        </td>
                    </tr>
                    <tr>
                        {{--<td tdclass="col-md-1"> </td>--}}
                        <td class="col-md-6"></td>
                        <td colspan=></td>
                        <td class="col-md-6"></td>
                        <td class="col-md-1"></td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
