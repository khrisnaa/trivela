<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PackageBank extends Model
{
    use HasUuids;
    protected $fillable = [
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'logo'
    ];
}
