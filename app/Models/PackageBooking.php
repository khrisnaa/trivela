<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PackageBooking extends Model
{
    use HasUuids;

    protected $fillable = [
        'proof',
        'user_id',
        'package_tour_id',
        'package_bank_id',
        'quantity',
        'total_amount',
        'insurance',
        'tax',
        'sub_total',
        'is_paid',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function customer() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tour() : BelongsTo
    {
        return $this->belongsTo(PackageTour::class);
    }

    public function bank() : BelongsTo
    {
        return $this->belongsTo(PackageBank::class);
    }
}
