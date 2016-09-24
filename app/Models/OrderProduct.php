<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProduct
 * @package App\Models
 */
class OrderProduct extends Model
{
	protected $table = "order_product";
	protected $fillable = ['product_id','order_id','amount','options'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
	{
		return $this->belongsTo(Order::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
