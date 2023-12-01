<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use MoonShine\Models\MoonshineUser;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'slug',
        'seo_title',
        'seo_description',
        'author_id',
        'rating',
        'link',
        'age_from',
        'age_to',
        'active',
        'color',
        'files',
        'data',
        'code'
    ];

    protected $casts = [
        'files' => 'collection',
        'data' => 'collection',
        'active' => 'bool'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(MoonshineUser::class);
    }

//    public function comments(): HasMany
//    {
//        return $this->hasMany(Comment::class);
//    }
//
//    public function comment(): HasOne
//    {
//        return $this->hasOne(Comment::class)->latestOfMany();
//    }
}
