<?php

namespace Laraflux\Lens\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'action',
        'user_id',
        'changes',
    ];

    public function loggable()
    {
        return $this->morphTo();
    }

    protected static function booted()
    {
        static::creating(function ($log) {
            $log->user_id = auth()->id();
        });
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
