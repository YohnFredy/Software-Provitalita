<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'parent_id', 'is_final', 'is_active'
    ];

    protected $casts = [
        'is_final' => 'boolean',
        'is_active' => 'boolean',
    ];
    
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

  

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('is_active', 1);
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
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

        /*  return $count ? "{$slug}-{$count}" : $slug; */
        return $count ? "{$slug}" : $slug;
    }
}
