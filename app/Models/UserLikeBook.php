<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLikeBook extends Model
{
    protected $table = "user_like_book";

    protected $fillable = [
        'user_id',
        'book_id'
    ];

    public function book()
    {
//        return $this->hasOne();
    }
}
