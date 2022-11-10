<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimCard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'account_id',
        'iccid',
        'is_active',
        'imei',
        'notes',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
