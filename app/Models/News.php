<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Static_;

class News extends Model
{
    protected $fillable = [
        'title', 'user_id', 'flat_id'
    ];
    protected $with = ['user'];

    protected static function boot()
    {
        parent::boot();
    }

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function newsComments()
    {
        return $this->hasMany(NewsComments::class);
    }

    static function getLatestNews($flat_id)
    {
        return News::where('flat_id', '=', $flat_id)
            ->latest()
            ->with('user')
            ->get();
    }
}
