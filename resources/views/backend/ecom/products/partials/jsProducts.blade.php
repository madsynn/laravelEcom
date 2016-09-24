<script>
$(window).load(function() {
    var MaxInputs = 50; //maximum input boxes allowed
    var FeatureInputsWrapper = $("#FeatureInputsWrapper"); //Input boxes wrapper ID
    var AddButton = $("#AddMoreFeatureBox"); //Add button ID
    var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
    var AddButton = $("#AddMoreFileBox"); //Add button ID
    var x = FeatureInputsWrapper.length; //initlal text box count
    var FieldCount = 1; //to keep track of text box added
    $(AddButton).click(function(e) //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                $(FeatureInputsWrapper).append('<tr>' + "<td><input type='text' name='feature_name[]' value=' class='form-control'></td>" + "<td><input type='checkbox' name='useicon' class='flat-orange' checked /></td>" + "<td><input type='text' name='icon[]' value='icon-caret-right' class='form-control'></td>" + "<td><a href='javascript:void(0)' class='delete removeclass' data-toggle='modal' data-target='#modal-basic'><i class='fa fa-fw fa-times fa-lg text-danger'></i>" + "</a></td>" + "</tr>");
                x++; //text box increment
            }
            return false;
        });
    $("#FeatureInputsWrapper").on("click", ".removeclass", function(e) { //user click on remove text
        @if(!isset($product))
        if (x > 1) {
            $(this).parent().parent().remove(); //remove text box
            x--; //decrement textbox
        }
        @else
        $(this).parent().parent().remove(); //remove text box
        x--; //decrement textbox
        @endif
        return false;
    });
    $(AddButton).click(function(e) //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                //add input box
                $(InputsWrapper).append('<tr>' + '<td><input type="text" name="attribute_name[]" value="" class="form-control"></td>' + '<td><input type="text" name="product_attribute_value[]" value="" class="form-control"></td>' + '<td><a href="javascript:void(0)" class="delete removeclass" data-toggle="modal" data-target="#modal-basic">' + '<i class="fa fa-fw fa-times text-danger"></i></a></td></tr>');
                x++; //text box increment
            }
            return false;
        });
    $("#InputsWrapper").on("click", ".removeclass", function(e) { //user click on remove text
        @if(!isset($product))
        if (x > 1) {
            $(this).parent().parent().remove();
            x--; //decrement textbox
        }
        @else
        $(this).parent().parent().remove(); //remove text box
        x--; //decrement textbox
        @endif
        return false;
    })
    $(function() {
        var options_counter = 0;
        $('.sidebar #products').addClass('active-section');
        $('#add_album_image').click(function() {
            $("#additional-images").find('tbody').append('<tr><td style="width:40%"> <div class="form-group col-md-12 ">' + '<input type="file" id="album" name="album[]" class="file form-control input-preview"></div> </td> ' + '<td style="width:30%"> <div class="form-group col-md-12 "> <div class="input-group"> ' + '<input type="text" id="caption" name="caption[]" class="form-control"> ' + '<div class="input-group-addon">caption</div> </div> </div> <div class="form-group col-md-12 "> ' + '<div class="input-group"> <input type="text" id="alt" name="alt[]" class="form-control"> ' + '<div class="input-group-addon">alt</div> </div> </div> <div class="form-group col-md-12 "> ' + '<div class="input-group"> <div class="input-group-addon">info</div> <input type="text" id="photoinfo" name="photoinfo[]" class="form-control"> ' + '</div> </div> </td> <td > <input type="checkbox" name="use_main[]" value="1" class="m-t-10" checked> </td> <td> ' + '<input type="checkbox" name="use_thumb[]" value="1" class="m-t-10"> </td> <td> <input type="checkbox" name="use_gallery[]" value="1" class="m-t-10"> </td> ' + '<td class="text-center"> <a href="#" class="delete-img btn btn-sm btn-default m-t-10"><i class="fa fa-times-circle"></i> Remove</a> </td>');
            $(".input-preview").fileinput();
        });
        $('#add_product_option').click(function() {
            options_counter++;
            $('.options-group').append('<div class="option col-md-3" op-index="' + options_counter + '">' + '<span class="fa fa-times fa-lg remove-option"></span>' + '<label for="options">Option Name:</label>' + '<strong><input type="text" name="options[' + options_counter + '][name]"></strong><br>' + '<div class="add_option_value">+ Add Value</div>' + '<ul class="values"><li>' + '<input type="text" name="options[' + options_counter + '][values][]"></li>' + '</ul>' + '</div>');
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
    $("#addRow").click(function() {
        var row = $("<tr>" + "<td><input type='text' class='text-center form-control' name='model[]' /></td>" + "<td><input type='text' class='text-center form-control  currency' name='price[]' placeholder='$0.00' data-affixes-stay='false' data-prefix='$ ' data-thousands=',' data-decimal='.' /></td>" + "<td><input type='text' class='text-center form-control' name='quantity[]' /></td>" + "<td><input type='text' class='text-center form-control' name='sku[]' /></td>" + "<td><input type='text' class='text-center form-control' name='upc[]' value='636343' /></td>" + "</tr>" + "<tr><td colspan='5'><input type='text' class='form-control' name='details[]' placeholder='Details:' /></td></tr>" + "<tr class='spacer invis'><td colspan='5'></td></tr>");
        $("table#product-pricing-table tbody").append(row);
        $('table#product-pricing-table input.currency').maskMoney();
    });
    $(function() {
        $('table#product-pricing-table input.currency').maskMoney();
    });
});
</script>
