<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CoinRate extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function coin_rate_history(): HasOne
    {
        return $this->hasOne(CoinRateHistory::class);
    }
}
