<?php

namespace App\Models;


//use Illuminate\Container\Container;
//use Illuminate\Support\Collection;
//use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;


//use App\Models\User;
//use App\Models\Category;
//use App\Models\AlbumPhoto;
//use App\Models\CategoryProduct;
//use App\Models\Option;
//use App\Models\OptionValue;
//use App\Models\OrderProduct;
//use App\Models\Price;
//use App\Models\Product;
//use App\Models\ProductVariant;
//use App\Models\ProductFeature;


use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


/**
 * @Bind("products")
 */
class Product extends Model implements SluggableInterface
{

    use SluggableTrait;

    /**
     * @var string
     */
    protected $table = 'products';
    protected $guarded = ['id'];





    /**
     * @var array
     */
    protected $fillable = ['id', 'slug', 'ispromo', 'is_published', 'name', 'subtitle', 'details',
        'description', 'status', 'thumbnail', 'thumbnail2', 'photo_album', 'pubished_at', 'video_url', 'lang',
        'manufacturer', 'category_id', 'meta_title', 'meta_description', 'facebook_title',
        'google_plus_title', 'twitter_title', 'office_status', 'availability', 'price_id'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    	'ispromo' => 'boolean',
	    'is_published' => 'boolean',
	    'availability' => 'string',
	    'manufacturer' => 'string',
	    'status' => 'string',
	    'office_status' => 'string',
	    'model' => 'string',
	    'sku' => 'string',
	    'upc' => 'string',
	    'name' => 'string',
	    'subtitle' => 'string',
	    'description' => 'string',
	    'category' => 'string',
	    'meta_title' => 'string',
	    'meta_description' => 'string',
	    'facebook_title' => 'string',
	    'google_plus_title' => 'string',
	    'twitter_title' => 'string',
	    'video_url' => 'string',
	    'tracking' => 'string',
	    'datalayer' => 'string'
    ];


	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [

		'name' => 'required',
		'slug' => 'required'
	];



	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['pubished_at', 'deleted_at'];

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug'
    ];

	/**
	 * Configure the Model
	 **/
	public function model()
	{
		return Product::class;
	}

// pubic function outputProducts()
//     {
//         $string = "<ul>";
//         foreach ($products as $i => $product) {
//             $string .= "<li>";
//             $string .= $product['name'];
//             if (count($product['children'])) {
//                 $string .= $this->output($product['children']);
//             }
//             $string .= "</li>";
//         }
//         $string .= "</ul>";
//         return $string;
//     }


    // public function setUrlAttribute($value)
    // {
    //     $this->attributes['url'] = $value;
    // }

    // public function getUrlAttribute()
    // {
    //     return 'shop/' . $this->attributes['slug'];
    // }


    /**
     * @var array
     */
//    protected $casts = [
//        'slug'              => 'string',
//        'ispromo'           => 'boolean',
//        'is_published'      => 'boolean',
//        'availability'      => 'string',
//        'manufacturer'      => 'string',
//        'status'            => 'string',
//        'office_status'     => 'string',
//
//        'name'              => 'string',
//        'subtitle'          => 'string',
//        'details'           => 'string',
//
//        'description'       => 'string',
//        'meta_title'        => 'string',
//        'meta_description'  => 'string',
//        'facebook_title'    => 'string',
//        'google_plus_title' => 'string',
//        'twitter_title'     => 'string',
//
//        'video_url'         => 'string',
//        'thumbnail'         => 'string',
//        'thumbnail2'        => 'string',
//        'photo_album'       => 'string'
//
//    ];


//    protected $visible = ['name', 'thumbnail', 'slug', 'ispromo', 'availability', 'status', 'office_status', 'subtitle', 'manufacturer', 'description', 'quantity'];

//TypeError: Argument 1 passed to Illuminate\Database\Eloquent\Relations\BelongsToMany::save() must be an instance of Illuminate\Database\Eloquent\Model, none given on line 1

	public function relatedProducts()
	{
		return $this->hasMany(RelatedProduct::class);
	}



    /**
     * @return mixed
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    /**
     * @return mixed
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * @return mixed
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    /**
     * @return mixed
     */
    public function photos()
    {
        return $this->hasMany(AlbumPhoto::class);
    }

    /**
     * @return mixed
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productPrice()
    {
      return $this->hasMany(Price::class);
    }

	public function prices()
	{
		return $this->hasMany(Price::class);
	}

	public function productPricing()
	{
		return $this->hasMany(Price::class);
	}

//    public function price()
//    {
//        return $this->belongsToMany(Price::class, 'price_product');
//    }


    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id', 'title');
    }



        /**
     * @return mixed
     */
    public function promos()
    {
        return $this->hasMany(Promo::class);
    }

    /**
     * @return mixed
     */
    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * @return mixed
     */
    public function productFeatures()
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }

	public function addPrices(Price $price)
	{
		return $this->prices()->save($price);
	}
}
