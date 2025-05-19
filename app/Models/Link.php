<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'url_title',
        'slug',
        'original_url',
        'user_id',
        'clicks'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}