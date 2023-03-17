<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Slider
 * @package App\Models
 */
class Slider extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name', 'image', 'link'];

    /**
     * @var string
     */
    protected $table = 'sliders';

    /**
     * @param $value
     * @return void
     */
    public function setImageAttribute($value): void
    {
        if ($value != null) {
            if (!is_string($value)) {
                if ($this->image != null) {
                    Storage::disk('public')->delete($this->image);
                }
                $value = Storage::disk('public')->putFile('slider/images', $value);
            }
        }
        $this->attributes['image'] = $value != null ? $value : $this->image;

    }
}
