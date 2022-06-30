<?php

namespace Laraflux\Lens\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laraflux\Lens\Database\Factories\LogFactory;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'event',
        'user_id',
        'changes',
    ];

    protected static function newFactory(): LogFactory
    {
        return LogFactory::new();
    }

    public function loggable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function scopeCreator($query, User $user): void
    {
        $query->where('user_id', $user->id);
    }
}
