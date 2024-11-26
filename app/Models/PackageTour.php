<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PackageTour extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'thumbnail',
        'slug',
        'about',
        'location',
        'price',
        'days',
        'category_id'
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function photos() : HasMany
    {
        return $this->hasMany(PackagePhoto::class);
    }

}
