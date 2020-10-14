<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTag extends Model
{
    protected $table = "book_tag";

    //
    protected $fillable = [
        'book_id',
        'tag_id'
    ];

//    public function book()
//    {
//        return $this->belongsTo(Book::class);
//    }
//
//    public function tag()
//    {
//        return $this->belongsTo(Tag::class);
//    }
}
