<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'icon',
        'slug'
    ];

    public function tours() : HasMany
    {
        return $this->hasMany(PackageTour::class);
    }
}
