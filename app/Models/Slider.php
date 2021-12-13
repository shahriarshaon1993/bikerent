<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($slider) {
            $slider->slug = Str::slug($slider->title);
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('slider_image')->singleFile();
    }
}
