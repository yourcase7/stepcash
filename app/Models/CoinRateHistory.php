<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoinRateHistory extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function coin_rate(): BelongsTo
    {
        return $this->belongsTo(CoinRate::class);
    }
}
