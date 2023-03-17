<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name', 'parent_id'];

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    /**
     * @return HasMany
     */
    public function sub(): hasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * @return
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
