<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 use Illuminate\Support\Facades\Storage;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'barcode',
        'quantity',
        'price',
        'long_description',
        'short_description',
        'price',
        'category_id',
        'brand_id',
        'image',
        'new_arrival',
        'most_view',
        'offer',

    ];

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

     /**
      * @param $value
      */
     public function setImageAttribute($value): void
     {
         if ($value != null) {
             if (!is_string($value)) {
                 if ($this->image != null) {
                     Storage::disk('public')->delete($this->image);
                 }
                 $value = Storage::disk('public')->putFile('products/images', $value);
             }
         }
         $this->attributes['image'] = $value != null ? $value : $this->image;

     }

}
