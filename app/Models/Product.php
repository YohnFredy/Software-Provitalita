<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'commission_income',
        'pts_base',
        'pts_bonus',
        'pts_dist',
        'maximum_discount',
        'specifications',
        'information',
        'is_physical',
        'stock',
        'allow_backorder',
        'category_id',
        'brand_id',
        'is_active',
    ];

    protected $casts = [
        'is_physical' => 'boolean',
        'allow_backorder' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'commission_income' => 'decimal:2',
        'pts_base' => 'decimal:2',
        'pts_bonus' => 'decimal:2',
        'pts_dist' => 'decimal:2',
        'maximum_discount' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Verificar si el producto está disponible
    public function isAvailable()
    {
        if (!$this->is_physical) {
            return true;
        }

        return $this->stock > 0 || $this->allow_backorder;
    }



    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = static::generateSlug($model->name);
        });
    }

    public static function generateSlug($name)
    {
        $slug = Str::slug($name);
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function latestImage(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')->latestOfMany();
    }

    public function oldestImage(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')->oldestOfMany();
    }
}
