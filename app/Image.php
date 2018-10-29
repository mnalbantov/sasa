<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name', 'type', 'extension', 'ad_id', 'user_id'
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
