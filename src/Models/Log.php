<?php

namespace Laraflux\Lens\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Laraflux\Lens\Database\Factories\LogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'event',
        'user_id',
        'changes',
    ];

    protected static function newFactory()
    {
        return LogFactory::new();
    }

    public function loggable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function scopeCreator($query, User $user): void
    {
        $query->where('user_id', $user->id);
    }
}
