<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookChapter extends Model
{
    protected $table = "book_chapters";

    //
    protected $fillable = [
        'book_id',
        'header',
        'body'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
