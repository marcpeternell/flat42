<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'user_id', 'title', 'text', 'published'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
