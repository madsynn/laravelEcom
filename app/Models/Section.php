<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @Bind("sections")
 */
class Section extends Model
{
    protected $table = "sections";
    protected $fillable = ['name', 'slug', 'lang'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
