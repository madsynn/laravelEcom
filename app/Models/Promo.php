<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Promo
 * @package App\Models
 */
class Promo extends Model
{


    /**
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * @var string
     */
    protected $table = 'promos';

    /**
     * @var array
     */
    public $fillable = [
        'product_id',
        'price',
        'model',
        'sku',
        'upc',
        'quantity',
        'start_on',
        'end_on',
        'created_at',
        'updated_at'
    ];


    protected $casts = [
        'product_id' => 'integer',
        'price'      => 'integer',
        'model'      => 'string',
        'sku'        => 'string',
        'upc'        => 'string',
        'quantity'   => 'integer',
        'start_on'   => 'date',
        'end_on'     => 'date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
