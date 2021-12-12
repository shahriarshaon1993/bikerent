<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Page extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = "pages";

    protected $fillable = [
        'title', 'slug', 'excerpt', 'body', 'meta_description', 'meta_keywords', 'status'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->where('status', true)->firstOrFail();
    }
}
