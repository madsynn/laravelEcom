<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Option
 * @package App\Models
 */
class Option extends Model
{
	protected $table = "options";
	protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
	{
		return $this->belongsTo(Product::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
	{
		return $this->hasMany(OptionValue::class);
	}

}
