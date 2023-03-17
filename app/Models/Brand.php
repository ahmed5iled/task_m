<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * Class Category
 * @package App\Models
 */
class Brand extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name', 'image'];

    /**
     * @var string
     */
    protected $table = 'brands';

    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function setImageAttribute($value): void
    {
        if ($value != null) {
            if (!is_string($value)) {
                if ($this->image != null) {
                    Storage::disk('public')->delete($this->image);
                }
                $value = Storage::disk('public')->putFile('brands/images', $value);
            }
        }
        $this->attributes['image'] = $value != null ? $value : $this->image;

    }
}
