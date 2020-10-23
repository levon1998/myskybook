<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    //
    protected $fillable = [
        'name',
        'short_name',
        'slug',
        'description',
        'short_description',
        'author_id',
        'filename'
    ];

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }

    public function chapters()
    {
        return $this->hasMany(BookChapter::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function like()
    {
        return $this->hasOne(UserLikeBook::class)->where('user_id', Auth::id());
    }

    public function watchLater()
    {
        return $this->hasOne(UserWatchLaterBook::class)->where('user_id', Auth::id());
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
