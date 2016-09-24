<div class="row">
    <div class="col-sm-12">
        <!-- Meta Title Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('meta_title', 'Meta Title:') !!}
            {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Meta Keywords Field -->
        <div class="form-group col-sm-12 ">
            {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
            {!! Form::text('meta_keywords', null, ['class' => 'form-control tags']) !!}

        </div>

        <!-- Meta Description Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('meta_description', 'Meta Description:') !!}
            {!! Form::textarea('meta_description', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Facebook Title Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('facebook_title', 'Facebook Title:') !!}
            <div class="input-group">
            {!! Form::text('facebook_title', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon">on FaceBook</div>
            </div>
        </div>
        <!-- Google Plus Title Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('google_plus_title', 'Google Plus Title:') !!}
            <div class="input-group">
            {!! Form::text('google_plus_title', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon">on GooglePlus</div>
            </div>
        </div>
        <!-- Twitter Title Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('twitter_title', 'Twitter Title:') !!}
            <div class="input-group">
            {!! Form::text('twitter_title', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon">on Twitter</div>
            </div>
        </div>
    </div>
</div>

<script>
    $().ready(function() {
        //$('input#meta_keywords.form-control').tagsInput();
        $('input#meta_keywords.form-control').tagsInput({

            'height':'100px',
            'width':'auto',
            'interactive':true,
            'defaultText':'add a Keyword',
//            'onAddTag':callback_function,
//            'onRemoveTag':callback_function,
//            'onChange' : callback_function,
            //  'delimiter': [',',';'],   // Or a string with a single delimiter. Ex: ';'
            'removeWithBackspace' : true,
            'minChars' : 0,
            'maxChars' : 0, // if not provided there is no limit
            'placeholderColor' : '#666666'
        });
    });
</script>