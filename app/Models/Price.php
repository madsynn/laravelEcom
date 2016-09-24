<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Price
 * @package App\Models
 */
class Price extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id'];
    protected $touches = ['product'];
    /**
     * @var string
     */
   // protected $table = 'prices';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'price', 'model', 'sku', 'upc', 'quantity', 'alt_details', 'deleted_at'];

	protected $visable = ['product_id', 'price', 'model', 'sku', 'upc', 'quantity', 'alt_details', 'deleted_at'];

    protected $dates = ['pubished_at', 'deleted_at'];

    /**
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'price'      => 'string',
        'model'      => 'string',
        'sku'        => 'string',
        'upc'        => 'string',
        'quantity'   => 'string',
        'alt_details'   => 'text'
    ];



    public function getPriceAttribute($price)
    {
        return '$'. number_format($price, 2, '.', '');
    }





    public function product()
    {
	    return $this->belongsTo(Product::class);
    }



	/**
	 * Configure the Model
	 **/
	public function Price()
	{
		return Price::class;
	}
}

