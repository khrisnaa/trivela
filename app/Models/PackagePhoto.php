<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackagePhoto extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'photo',
        'package_tour_id'
    ];

    public function tour() : BelongsTo
    {
        return $this->belongsTo(PackageTour::class);
    }
}
