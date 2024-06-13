<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Secret extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name', 'value', 'user_id', 'expired_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function expiredAtHumanized(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->expired_at, 'UTC')->diffForHumans();
    }
}
