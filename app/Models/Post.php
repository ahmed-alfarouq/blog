<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    const IMAGE_IDS = [
        '0',
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '9',
        '26',
        '36',
        '48',
        '60',
        '96',
        '119',
        '160',
        '175',
        '180',
        '201',
        '252',
    ];

    protected $fillable = [
        'title',
        'img',
        'content',
        'user_id',
    ];

    protected $casts = [
        'tags'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
