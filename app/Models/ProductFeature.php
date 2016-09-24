<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductFeature
 * @package App\Models
 */
class ProductFeature extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $touches = ['product'];

    /**
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * @var string
     */
    protected $table = 'product_features';

    /**
     * @var array
     */
    public $fillable = [
        'feature_name',
        'useicon',
        'icon',
        'created_at',
        'updated_at'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'feature_name' => 'string',
        'useicon'      => 'boolean',
        'icon'         => 'string'
    ];
}
