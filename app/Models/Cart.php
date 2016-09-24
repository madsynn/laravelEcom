<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * @package App\Models
 */
class Cart extends Model
{
	protected $table = "cart";
	protected $fillable = ['product_id','amount'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
	{
		return $this->belongsTo(User::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
