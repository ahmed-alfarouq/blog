<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    protected $fillable = ['code', 'user_id', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generate($userId, $minutes)
    {
        return self::create([
            'user_id' => $userId,
            'code' => rand(100000, 999999),
            'expires_at' => Carbon::now()->addMinutes($minutes)
        ]);
    }

    public function isValid()
    {
        return $this->expires_at->isFuture();
    }
}
