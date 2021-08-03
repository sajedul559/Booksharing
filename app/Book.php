<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    public function author()
    {
        return $this->hasMany(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
