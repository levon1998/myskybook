<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'comment',
        'name',
        'email',
        'website',
        'star'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
