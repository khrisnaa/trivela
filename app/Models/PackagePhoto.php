<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PackagePhoto extends Model
{
    use HasUuids;

    protected $fillable = [
        'photo',
        'package_tour_id'
    ];

    public function tour() : BelongsTo
    {
        return $this->belongsTo(PackageTour::class);
    }
}
