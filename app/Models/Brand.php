<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($brand) {
            $brand->slug = Str::slug($brand->name);
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('brand_image')->singleFile();
    }

    public function bikes()
    {
        return $this->hasMany(Bike::class);
    }
}
