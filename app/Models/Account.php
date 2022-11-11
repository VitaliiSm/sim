<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Account extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * @return HasMany
     */
    public function simCards(): HasMany
    {
        return $this->hasMany(SimCard::class);
    }

    public function activeSimCards(): HasMany
    {
        return $this->simCards()->where('is_active', 1);
    }
}
