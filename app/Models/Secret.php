<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Secret extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'value', 'user_id', 'expired_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
