<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEcommerceTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('status')->nullable();
            $table->string('office_status')->nullable();
            $table->string('availability')->default('Available');
            $table->string('slug')->nullable();
            $table->boolean('ispromo')->default(0);
            $table->boolean('is_published')->default(1);
            $table->string('name')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('manufacturer')->default('The Grace Company');
            $table->longText('details');
            $table->longText('description');
	        $table->string('price_heading')->nullable();
	        $table->string('features_heading')->nullable();
	        $table->string('additional_heading')->nullable();
	        $table->string('reviews_heading')->nullable();


            $table->string('thumbnail')->nullable();
            $table->string('thumbnail2')->nullable();
            $table->string('photo_album')->nullable();
            $table->dateTime('pubished_at')->index();
            $table->string('video_url')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
	        $table->string('meta_keywords')->nullable();


            $table->string('facebook_title')->nullable();
            $table->string('google_plus_title')->nullable();
            $table->string('twitter_title')->nullable();

            $table->string('lang', 255);
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('categories', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
             $table->unsignedInteger('section_id');

            $table->text('meta_description')->nullable();
            $table->string('slug')->nullable();
            $table->string('lang', 20)->nullable();

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('product_variants', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index();
            $table->string('attribute_name');
            $table->text('product_attribute_value');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });

        Schema::create('prices', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index();
	        $table->string('title')->nullable();
            $table->decimal('price', 11, 2)->nullable();
            $table->string('model', 12)->nullable();
            $table->string('sku', 12)->nullable();
            $table->string('upc', 13)->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->string('alt_details');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');

        });


        Schema::create('product_features', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index();
            $table->string('feature_name');
            $table->boolean('useicon')->default(1);
            $table->string('icon')->default('icon-caret-right');

            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('options', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->string('name');
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('option_values', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('option_id');
            $table->string('value');
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('option_id')->references('id')->on('options')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('product_album', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('product_id')->unsigned()->index();
            $table->string('photo_src');
            $table->string('alt')->nullable();
            $table->string('caption',60)->nullable();
            $table->string('photoinfo',160)->nullable();
            $table->string('linkto')->nullable();
            $table->boolean('use_main')->default(1);
            $table->boolean('use_thumb')->default(1);
            $table->boolean('use_gallery')->default(1);
            $table->timestamps();
            $table->engine = 'InnoDB';

            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('product_variants');
        Schema::drop('product_features');
        Schema::drop('option_values');
        Schema::drop('options');
        Schema::drop('sections');
        Schema::drop('categories');
        Schema::drop('product_album');
        $table = 'products';
        Storage::disk('local')->put($table.'_'.date('Y-m-d_H-i-s').'.bak', json_encode(DB::table($table)->get()));
        Schema::drop('products');
    }
}
