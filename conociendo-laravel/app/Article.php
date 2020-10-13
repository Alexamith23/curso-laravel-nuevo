<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tag;

class Article extends Model
{
    //
    protected $guarded = [];

    public function path(){
        return route('article.show', $this);
    }


    public function user()
    {
        # code...
        return $this->belongsTo(User::class);// user id
    }

    public function tags()
    {
        # code...
        return$this->belongsToMany(Tag::class)->withTimestamps();
    }       
}